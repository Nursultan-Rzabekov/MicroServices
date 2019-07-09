<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Product;
use App\Payment;
use App\OrderProduct;
use App\Http\Requests\StoreOrderRequests;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //$order = Order::create($request->validated());
        $order = new Order;
        $order->user_id = $request->user_id;
        $order->address = $request->address;
        $order->save();

        //$name = $request->input('productss');
        //$name = (array) Input::get('productsarr');
        //dd($name);
        //$array = $request->productss;

        $order->products()->sync($request->input('productsorder'));

        //$product = new Product;
        //$productcollect = collect([['1' => 'iphone 5'], ['2' => 'lg g5'], ['4' => 'huawei p8'], ['6' => 'samsung a5']]);
        //$product = new Product($productcollect);
        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return Order::get();
    }


    public function getById( $order)
    {
        return OrderProduct::where('order_id',$order)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function pay(Order $order,Request $request)
    {
        $order->pay()->save();
        $payment = new Payment();
        $payment->user_id = $request->user_id;
        $payment->type = $request->type;
        $payment->number = $request->number;
        $payment->save();

        return $payment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->address = $request->address;
        $order->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->cancel()->save();
    }
}
