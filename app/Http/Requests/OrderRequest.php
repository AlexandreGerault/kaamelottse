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
     * @var array
     */
    private $products;

    public function __construct(array $query = [],
                                array $request = [],
                                array $attributes = [],
                                array $cookies = [],
                                array $files = [],
                                array $server = [],
                                $content = null)
    {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
        $this->products = [];
    }

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
        $rules = [];

        if($this->input('customer_email')) {
            $rules['customer_email'] = 'required|exists:email,users|string';
        }
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
                        $this->products[] = $product;
                        $totalPrice += $product->price * $quantity;
                    }
                } catch (ModelNotFoundException $e) {
                    $validator->errors()->add('not-available', 'Le produit d\'id ' . $productId . ' n\'est pas disponible !');
                }
            }
            if ($totalPrice > config('ordering.max_total_price')) {
                $validator->errors()->add('max-price', 'Le montant totale de cette commande excède la capicité maximale autorisée.');
            }
        });
    }

    public function products()
    {
        return $this->products;
    }
}
