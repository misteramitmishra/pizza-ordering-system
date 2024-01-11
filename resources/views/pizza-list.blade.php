@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6 card card-body">
            <h4 class="mb-4">Pizza Order Form</h4>
            <hr>
            <form action="{{ route('addToCart') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <x-form.select label="Select Pizza Type" id="pizzaTypeSelect" name="pizzaType" :options="$pizzas" />
                    </div>
                    <div class="col-sm-12">
                        <x-form.select label="Select Pizza Size" id="pizzaSizeSelect" name="pizzaSize" :options="$sizes" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" id="toppingsContainer">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add To Cart</button>
            </form>
        </div>
        <div class="col-sm-6 card card-body">
            <h4 class="mb-4">Cart</h4>
            @if (session('cart'))
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pizza</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartData['items'] as $cartItem)
                            <tr>
                                <td>
                                    {{ $cartItem['pizzaType'] }} ({{ $cartItem['pizzaSize'] }})
                                    <br>
                                    <small>{{ $cartItem['toppings'] ? implode(', ', $cartItem['toppings']) : '' }}</small>
                                </td>
                                <td>${{ $cartItem['itemPrice'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total Amount</th>
                            <th>${{ $cartData['totalPrice'] }}</th>
                        </tr>
                    </tfoot>
                </table>
                <form action="{{ route('clearCart') }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-danger">Clear Cart</button>
                </form>
            @else
                <p>Your cart is empty.</p>
            @endif
            <hr>
        </div>
    </div>
@endsection
