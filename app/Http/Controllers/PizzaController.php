<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pizza;
use App\Models\Size;
use App\Models\Topping;
use App\Models\PizzaPrice;
use App\Models\ToppingPrice;

class PizzaController extends Controller
{
    public function showPizzaList()
    {
        $pizzas = Pizza::all()->pluck('type', 'id')->toArray();
        $sizes = Size::all()->pluck('name', 'id')->toArray();

        $cartData = $this->calculateCart();

        return view('pizza-list', compact('pizzas', 'sizes', 'cartData'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'pizzaType' => 'required',
            'pizzaSize' => 'required',
            'toppings' => 'sometimes|array',
        ], [
            'pizzaType.required' => 'Please select a pizza type.',
            'pizzaSize.required' => 'Please select a pizza size.',
        ]);

        $pizzaType = $request->input('pizzaType');
        $pizzaSize = $request->input('pizzaSize');
        $toppings = $request->input('toppings');

        $cartItem = [
            'pizzaType' => $pizzaType,
            'pizzaSize' => $pizzaSize,
            'toppings' => $toppings,
        ];

        Session::push('cart', $cartItem);

        return redirect()->back()->with('success', 'Pizza added to cart successfully!');
    }

    public function getToppings(Request $request)
    {
        $sizeId = $request->input('sizeId');

        $toppings = ToppingPrice::where('size_id', $sizeId)
            ->with('topping')
            ->get();

        return view('components.form.toppings-checkboxes', compact('toppings'));
    }

    public function calculateCart() {
        $cart = Session::get('cart', []);

        $totalPrice = 0;
        $items = [];

        foreach ($cart as $cartItem) {

            $pizza = Pizza::find($cartItem['pizzaType']);
            $size = Size::find($cartItem['pizzaSize']);

            $PizzaPrice = PizzaPrice::where('pizza_id', $pizza->id)
                ->where('size_id', $size->id)
                ->first();
            $toppingPrices = ToppingPrice::whereIn('id', $cartItem['toppings'] ?? [])
                ->get();

            $itemPrice = $PizzaPrice->price;
            foreach ($toppingPrices as $toppingPrice) {
                $itemPrice += $toppingPrice->price;
            }

            $items[] = [
                'pizzaType' => $pizza->type,
                'pizzaSize' => $size->name,
                'toppings' => $toppingPrices->pluck('topping.name')->toArray(),
                'itemPrice' => number_format($itemPrice, 2)
            ];

            $totalPrice += $itemPrice;
        }

        return [
            'totalPrice' => number_format($totalPrice, 2),
            'items' => $items,
        ];
    }

    public function clearCart()
{
        Session::forget('cart');

        return redirect()->back()->with('success', 'Cart has been cleared.');
    }
}
