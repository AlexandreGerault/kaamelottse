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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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
            foreach ($request->except(['_token', 'customer_email', 'shipping_address', 'phone']) as $productId => $quantity) {
                if ($quantity == 0) continue;
                try {
                    $product = Product::available()->findOrFail($productId);

                    if($product->stock < $quantity) { // TODO : Prendre en charge les opérations sur le stock
                        $validator->errors()
                            ->add(
                                'product-' . $product,
                                'Le stock de ' . $product->name . ' n\'est pas suffisant pour cette commande'
                            );
                    } else {
                        $totalPrice += $product->price * $quantity;
                    }
                } catch (ModelNotFoundException $e) {
                    $product = Product::find($productId);
                    $validator->errors()->add('not-available', 'Le produit d\'id ' . $productId . ' n\'est pas disponible !');
                }
            }
            if ($totalPrice > config('ordering.max_total_price')) {
                $validator->errors()->add('max-price', 'Le montant totale de cette commande excède la capicité maximale autorisée.');
            }
        });
    }
}
