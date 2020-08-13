<?php

namespace App\Http\Requests;

use Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateOrderRequest extends FormRequest
{
    /**
     * @var Order
     */
    private $order;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('update', $this->route('order'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array();

        $rules['status'] = 'nullable|numeric';
        $rules['shipping_address'] = 'required|string';
        $rules['phone'] = 'required|string';

        return $rules;
    }

    /**
     * Configure the validator instance.
     *
     * @param Validator $validator
     * @return void
     */
    public function withValidator(Validator $validator)
    {

        $this->order = $this->route('order');
        $request = $this;
        $products = array();

        $validator->after(function (Validator $validator) use ($request) {
            if (($request->has('status') && $request->get('status') == config('ordering.status.PENDING'))
                || $request->route()->getName() == ('order.update')) {
                $this->order->items()->each(function (OrderItem $item) use ($validator) {
                    $product = $item->product;
                    if ($product->stock - $item->quantity < 0) {
                        $validator->errors()->add(
                            $product->id,
                            'Le produit ' . $product->name . ' n\'est plus disponible en assez grande quantité'
                        );
                    }
                });
            }
        });
    }
}
