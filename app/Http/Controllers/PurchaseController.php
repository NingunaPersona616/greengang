<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases=Purchase::with('user:id,name', 'provider:id,provider')->get();
        return view('purchase.purchase-index', compact('purchases'));
    }

    /**
     * Show the form for creating a new Purchase.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers=Provider::get();
        return view('purchase.purchase-form', compact('providers'));
    }

    /**
     * Agregar un producto a la compra
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'product'=>'required|string|min:4|max:150|unique:App\Models\Product,product',
            'description'=>'required|string|min:10|max:250',
            'unitprice'=>'required|regex:/^[\d]{1,5}(\.[\d]{1,2})?$/',
            'category_id'=>'required',
        ]);*/
        //$request=merge(['user_id' => $request->user()->id]);
        //$purchase=Purchase::create($request->all());
        $purchase= new Purchase($request->except('created_at'));
        $user=Auth::user();
        $user->purchases()->save($purchase);

        $last_purchase = Purchase::latest('id')->first();
        $products=Product::get();
        return view('purchase.insertProducts-form', compact('last_purchase', 'products'));
    }

    public function insertProduct(Request $request, Purchase $purchase)
    {
        $purchase->products()->attach($request->product_id);
        return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return view('purchase.purchase-show', compact('purchase'));
    }
}
