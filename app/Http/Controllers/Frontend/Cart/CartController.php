<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Information;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carts = session('cart', []);

        $informations = Information::all()->first();
        $isBlog = Blog::where('visible', true)->exists();
        return view('frontend.home.cart.cart', compact('informations', 'isBlog', 'carts'));
    }

    public function create()
    {
        $carts = session('cart', []);
        $subTotal = session('subTotal');
        $total = session('total');
        $impuesto = session('impuesto');
        $type = session('type');

        $informations = Information::all()->first();
        $isBlog = Blog::where('visible', true)->exists();

        return view('frontend.home.cart.detalles', compact('informations', 'isBlog', 'carts', 'subTotal', 'total', 'type', 'impuesto'));
    }

    public function calculateSubTotal($carts)
    {
        $subTotal = 0;

        foreach ($carts as $item) {
            $subTotal = $subTotal + $item['quantity'] * round($item['price'] - ($item['discount'] / 100) * $item['price'], 2);
        }

        return $subTotal;
    }

    public function calculateDiscountSubTotal($carts)
    {
        $discount = 0;

        foreach ($carts as $item) {
            $discount = $discount + round(($item['discount'] / 100) * $item['price'], 2);
        }

        return $discount;
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'cellphone' => 'required|regex:/^[1-9]{9}$/',
                'payment_methods' => 'required',
                'name_cuenta' => 'required|string|min:3|max:30',
                'numero_cuenta' => 'required|regex:/^\d{16}$/',
                'fecha_cuenta' => 'required|date',
                'cvc_cuenta' => 'required|regex:/^\d{3,4}$/',
            ],
            [
                'name.required' => 'El nombre es obligatorio.',
                'name.string' => 'El nombre debe ser una cadena de texto.',
                'name.min' => 'El nombre debe tener al menos 3 caracteres.',
                'name.max' => 'El nombre no puede tener más de 30 caracteres.',

                'last.required' => 'El apellido es obligatorio.',
                'last.string' => 'El apellido debe ser una cadena de texto.',
                'last.min' => 'El apellido debe tener al menos 3 caracteres.',
                'last.max' => 'El apellido no puede tener más de 30 caracteres.',

                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'El correo electrónico debe ser válido.',
                'email.max' => 'El correo electrónico no puede tener más de 60 caracteres.',

                'cellphone.required' => 'El número de celular es obligatorio.',
                'cellphone.regex' => 'El número de celular debe tener 9 dígitos y comenzar con un número del 1 al 9.',

                'payment_methods.required' => 'Debes seleccionar un método de pago.',

                'name_cuenta.required' => 'El nombre de la cuenta es obligatorio.',
                'name_cuenta.string' => 'El nombre de la cuenta debe ser una cadena de texto.',
                'name_cuenta.min' => 'El nombre de la cuenta debe tener al menos 3 caracteres.',
                'name_cuenta.max' => 'El nombre de la cuenta no puede tener más de 30 caracteres.',

                'numero_cuenta.required' => 'El número de cuenta es obligatorio.',
                'numero_cuenta.regex' => 'El número de cuenta debe tener exactamente 16 dígitos.',

                'fecha_cuenta.required' => 'La fecha de la cuenta es obligatoria.',
                'fecha_cuenta.date' => 'La fecha de la cuenta debe ser una fecha válida.',

                'cvc_cuenta.required' => 'El CVC es obligatorio.',
                'cvc_cuenta.regex' => 'El CVC debe tener 3 o 4 dígitos.',
            ],
        );

        try {
            DB::beginTransaction();

            $carts = session('cart', []);
            $subTotal = session('subTotal');
            $total = session('total');
            $impuesto = session('impuesto');
            $type = session('type');

            $order = Order::create([
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'last' => auth()->user()->last,
                'email' => auth()->user()->email,
                'cellphone' => $request->cellphone,
                'payment_methods' => $request->payment_methods,
                'name_cuenta' => $request->name_cuenta,
                'numero_cuenta' => $request->numero_cuenta,
                'fecha_cuenta' => $request->fecha_cuenta,
                'cvc_cuenta' => $request->cvc_cuenta,
                'total_amount' => $total,
                'discount' => $impuesto,
            ]);

            foreach ($carts as $cart) {
                $orderItems = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart['id'],
                    'quantity' => $cart['quantity'],
                    'price_actual' => $cart['price'],
                    'percentage_discount' => $cart['discount'],
                    'price_discount' => ($cart['price'] * $cart['discount']) / 100,
                    'price_sale' => $cart['price'] - ($cart['price'] * $cart['discount']) / 100,
                    'color' => $cart['color'],
                    'igv' => 0.18, // Valor por defecto
                ]);
            }

            DB::commit();

            // Eliminamos la sesion
            session()->forget(['cart', 'subTotal', 'total', 'impuesto', 'type']);

            return redirect()->route('carrito.show');
        } catch (\Exception $e) {
            DB::rollBack();
            /* dd($e->getMessage()); */
        }
    }

    public function show()
    {
        /*  $order = Order::with(['orderItems.product'])->findOrFail(auth()->user()->id); */
        $order = Order::with(['orderItems.product'])
            ->where('user_id', auth()->user()->id)
            ->latest() // Ordenar por la fecha de creación en orden descendente
            ->first();
        $carts = $order->orderItems;

        $informations = Information::all()->first();
        $isBlog = Blog::where('visible', true)->exists();
        return view('frontend.home.cart.show', compact('informations', 'isBlog', 'carts'));
    }
}
