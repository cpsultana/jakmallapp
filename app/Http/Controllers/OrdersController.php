<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;

class OrdersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Order History';
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $orders = Order::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(20);
        
        $data = array(
            'title' => $title,
            'user' => $user,
            'orders' => $orders
        );

        return view('pages.order_history')->with($data);
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
    * Store a newly created product resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        if(!empty($request->input('mobile_number'))) {
            $this->validate($request, [
                'mobile_number' => 'required|regex:/(081)[0-9]{4,9}/',
                'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]);
            
            $title = 'Success!';
    
            // Create Order
            $order = new Order;
            $order->user_id = auth()->user()->id;
            $order->mobile_number = $request->input('mobile_number');
            $order->price = $request->input('price');
            $order->product_name = '';
            $order->shipping_address = '';
            $order->save();
            
            $data = array(
                'title' => 'Order History',
                'order' => $order
            );
        }
        else {
            $this->validate($request, [
                'product_name' => 'required|unique:orders|min:10|max:150',
                'shipping_address' => 'required|min:10|max:150',
                'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]);
            
            $title = 'Success!';

            // Create Order
            $order = new Order;
            $order->user_id = auth()->user()->id;
            $order->product_name = $request->input('product_name');
            $order->shipping_address = $request->input('shipping_address');
            $order->price = $request->input('price');
            $order->mobile_number = "";
            $order->save();
            
            $data = array(
                'title' => 'Order History',
                'order' => $order
            );
        } 

        return view('pages.success')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect('/order_history')->with('success', 'Successful Payment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
