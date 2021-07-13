<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Session;

class productController extends Controller
{
    public function getIndex ()
    {
        $products = Product :: all();
        return view('index', ['products' => $products]);
        // return response()->json(
        //     'index',
        //     [
        //         'products' => $products,    
        //     ]
        //     );
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find ($id);
        // $oldCart = Session:: has('cart') ? Session::get ('cart') : null;
        $cart = new Cart;
        $cart->add ($product, $product->id);

        $request->session()->put ('cart', $cart);
        // dd($request -> session ()->get('cart'));
        return redirect()->route ('index');
    }

    public function getCart (){
        if (!Session::has('cart')) {
            return view ('shoppingCart', ['products' => null]);
        }
        // $oldCart = Session:: get ('cart');
        //dd($oldCart->items);
        // yang ni aku tak sure object declaration untuk apa
        $cart = new Cart;
        // dd ($cart->item);
        // dd(session ::get('cart'));
        $cart = Session:: get ('cart');
        
        return view (
            'shoppingCart', 
            [
                //'guna di view' => 'object dari controller'
                'products' => $cart->items, 
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart -> totalQty
            ]
        );

    }
    public function getCheckout(){
        if (!Session::has('cart')) {
            return view ('shoppingCart');
        }

        $cart = Session:: get ('cart');
        $total = $cart->totalPrice;
        return view ('checkout', ['total' => $total]);
    }
 
}
