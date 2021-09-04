<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\cart;
use App\Models\order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function detail($id)
    {
        $single = products::find($id);
        return view('product',['single' => $single]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $req,$id)
    {
        if(session('user') && session('user') != '' && session('loggedin') == true) {
            $cart = cart::where('product_id',$id)->where('user_id',$req->session()->get('user')['id'])->first();
            if($cart){
                $oldcart = $cart['qty'];
                $cart['qty'] = $oldcart+$req->cartqty;
                $cart->save();
                $req->session()->flash('success','Cart is updated successfully');
                return back();
            }else{
                $newcart = new cart;
                $newcart->product_id = $id;
                $newcart->user_id = $req->session()->get('user')['id'];
                $newcart->qty = $req->cartqty;
                $newcart->save();
                $req->session()->flash('success','Item added successfully in cart');
                return back();
            }

        }else{
            return redirect('login');
        }
        //return 'cart page'. $id;

    }

    public function cartshow(){
        return view('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $req->validate([
            'name'=>'required',
            'price'=>'required|max:4',
            'mrp'=>'required|max:4',
            'stock'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        $store = new products;

        $store->name=$req->name;
        $store->price=$req->price;
        $store->mrp=$req->mrp;
        $store->qty=$req->stock;
        $store->description=$req->description;
        $store->status=1;

        if($req->hasfile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/product/',$filename);
            $store->image=$filename;

        }

        $store->save();
        $req->session()->flash('success','Product has been added successfully.');
        return redirect('addProduct');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
        $data = $products->orderBy('id','asc')->get();
        return view('home',['product'=>$data]);    

    }


    public static function cartitem(){
        $userid = Session::get('user')['id'];
        $count = cart::where('user_id',$userid)->count();

        return $count;
    }
    public static function cartside(){
        $userid = Session::get('user')['id'];
        $count = DB::table('carts')->join('products', 'carts.product_id','=', 'products.id')->where('carts.user_id',$userid)->select('products.*','carts.qty as quantity','carts.id as cart_id')->get();

        return $count;
    }
    public function cartremove($id){
        cart::find($id)->delete();
        return back();
    }

    public function order(){
        return view('order');
    }
    public function orderPlace(Request $req){
        $req->validate([
            'address'=>'required',
            'payment'=>'required'
        ]);
        $userId = Session::get('user')['id'];
        $allcart = cart::where('user_id',$userId)->get();
        if (count($allcart) == 0) {
            return redirect('/');
        }else{
            foreach($allcart as $cart){
                $order = new order;
                $order->product_id = $cart->product_id;
                $order->user_id = $cart->user_id;
                $order->payment_method = $req->payment;
                $order->address = $req->address;
                $order->payment_status = 'pending';
                $order->status = 'pending';
                $order->save();
                $cart->delete();
            }
        }
        
        return redirect('/');
    }
    public function myorder(){
        $userId = Session::get('user')['id'];
        $show = order::join('products','orders.product_id','=','products.id')->where('user_id',$userId)->select('products.*','orders.payment_method','orders.payment_status','orders.status as order_status','orders.address')->get();
        return view('myorder',['order'=>$show]);
        //return $show;
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products)
    {
        //
    }

}