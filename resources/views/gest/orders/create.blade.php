@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 bg-light p-4">
            <div class="panel panel-primary">
                <div class="panel-heading mb-5">
                    <h3 class="panel-title">Créer une commande manuellement</h3>
                    <a class="btn btn-primary" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Retour</a>
                </div>
                <form class="form-inline" id="pick-user">
                </form>

                <form method="post" action="{{ $action }}">
                    @csrf
                    @if(isset($method))
                        @method($method)
                    @endif

                    <div class="form-group">
                        <label for="status">Status de la commande</label>
                        <select class="form-control" name="status">
                            <option value="{{ config('ordering.status.NOT_COMPLETED') }}"
                            @if(isset($order) && $order->status == config('ordering.status.NOT_COMPLETED'))
                            selected="selected"
                            @endif>
                                {{ config('enums.order.status.' . config('ordering.status.NOT_COMPLETED')) }}
                            </option>
                            <option value="{{ config('ordering.status.PENDING') }}"
                            @if(isset($order) && $order->status == config('ordering.status.PENDING'))
                            selected="selected"
                            @endif>
                                {{ config('enums.order.status.' . config('ordering.status.PENDING')) }}
                            </option>
                            <option value="{{ config('ordering.status.IN_DELIVERY') }}"
                            @if(isset($order) && $order->status == config('ordering.status.IN_DELIVERY'))
                            selected="selected"
                            @endif>
                                {{ config('enums.order.status.' . config('ordering.status.IN_DELIVERY')) }}
                            </option>
                            <option value="{{ config('ordering.status.DELIVERED') }}"
                            @if(isset($order) && $order->status == config('ordering.status.DELIVERED'))
                            selected="selected"
                            @endif>
                                {{ config('enums.order.status.' . config('ordering.status.DELIVERED')) }}
                            </option>
                            <option value="{{ config('ordering.status.CANCELLED') }}"
                            @if(isset($order) && $order->status == config('ordering.status.CANCELLED'))
                            selected="selected"
                            @endif>
                                {{ config('enums.order.status.' . config('ordering.status.CANCELLED')) }}
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="autocomplete">Email du client</label>
                        <input id="autocomplete"
                               class="autocomplete form-control col mr-2"
                               name="customer_email"
                               type="email"
                               placeholder="Client (email)"
                               autocomplete="off"
                               required
                               value="@if(isset($order) && isset($order->customer)) {{ $order->customer->email }} @else {{ old('customer_email') }} @endif"
                        />
                    </div>

                    <div class="form-group">
                        <label for="shipping_address">Adresse de livraison</label>
                        <input id="shipping_address" class="form-control col mr-2" name="shipping_address"
                               type="text" placeholder="Adresse de livraison"
                               value="@if(isset($order) && $order->shipping_address != null) {{ $order->shipping_address }} @else {{ old('shipping_address') }} @endif"
                               required
                        />
                    </div>

                    <div class="form-group">
                        <label>N° de téléphone pour la livraison :</label>
                        <input id="customer_phone"
                               class="form-control col mr-2"
                               name="customer_phone"
                               type="tel"
                               placeholder="N° de téléphone pour la livraison"
                               value="@if(isset($order) && $order->phone != null) {{ $order->phone }} @else {{ old('customer_phone') }} @endif"
                               required />
                    </div>


                    <div class="card-deck d-flex flex-wrap">
                        @foreach (App\Models\Product::all() as $product)
                            <div class="card mr-2 @if(!$product->available) bg-light @endif my-3"
                                 style="min-width: 200px; max-width: 220px;">
                                <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">
                                        {{ $product->description }}
                                    </p>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button onclick="
                                                    document.getElementById('product-{{ $product->id }}').stepDown(1);
                                                    return false; "
                                                    class="btn border"
                                                    type="button"
                                                    id="button-addon1"
                                            >
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>

                                        <input class="form-control text-center no-spins-button"
                                               min="0"
                                               name="{{ $product->id }}"
                                               id="product-{{ $product->id }}"
                                               @if(isset($order) && $order->items()->byProduct($product)->first() !== null)
                                               value="{{ $order->items()->byProduct($product)->first()->quantity }}"
                                               @else
                                               value="{{ old($product->id, 0) }}"
                                                @endif"
                                        type="number">

                                        <div class="input-group-append">
                                            <button onclick="
                                                    document.getElementById('product-{{ $product->id }}').stepUp(1);
                                                    return false;
                                                    "
                                                    class="btn border"
                                                    type="button"
                                                    id="button-addon1">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <p class="card-text" style="text-align: right">
                                        <small class="text-muted">
                                            <span id="product-{{ $product->id }}-price">
                                                {{ $product->price }}
                                            </span> €
                                        </small>
                                        <span class="badge badge-warning ml-2">{{ $product->points }}
                                            @if ($product->points>1)
                                                points
                                            @else
                                                point
                                            @endif
                                    </span>
                                        @if(!$product->available or $product->stock)
                                            <span class="badge badge-danger">Non disponible</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <input class="btn btn-primary" type="submit" value="Valider la commande"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/no-pending-order-username-autocomplete.js') }}"></script>
@endsection