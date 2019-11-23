<?php

namespace App\Http\Requests;

use App\Models\Order;
use App\Models\Product;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('create', Order::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_email' => 'required|email|exists:users,email',
            'shipping_address' => 'nullable|string',
            'phone' => 'nullable|string'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param Validator $validator
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        $request = $this;
        $products = array();
        $validator->after(function (Validator $validator) use ($request) {
            $totalPrice = 0;
            foreach ($request->except(['customer_email', 'shipping_address', 'phone']) as $productId => $quantity) {
                try {
                    $product = Product::available()->findOrFail($productId);

                    if($product->stock < $quantity) { // TODO : Prendre en charge les opérations sur le stock
                        $validator->errors()
                            ->add(
                                'product-' . $product,
                                'Le stock de ' . $product->name . ' n\est pas suffisant pour cette commande'
                            );
                    } else {
                        $totalPrice += $product->price * $quantity;
                    }
                } catch (ModelNotFoundException $e) {
                    $validator->errors()->add('not-available', 'This product does not exist or  isn\'t available!');
                }
            }
            if ($totalPrice > config('ordering.max_total_price')) {
                $validator->errors()->add('max-price', 'Le montant totale de cette commande excède la capicité maximale autorisée.');
            }
            /*if ($this->somethingElseIsInvalid()) {

            }*/
        });
    }
}
