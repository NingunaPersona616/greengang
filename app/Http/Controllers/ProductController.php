<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::with('category')->get();
        /*
        $products=DB::table('products')
                        ->select('id', 'product', 'unitprice', 'availableunits', 'status', 'category_id')
                        ->get();
        */
        return view('product.product-index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        return view('product.product-form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product'=>'required|string|min:4|max:150|unique:App\Models\Product,product',
            'description'=>'required|string|min:10|max:250',
            'unitprice'=>'required|regex:/^[\d]{1,5}(\.[\d]{1,2})?$/',
            'category_id'=>'required',
        ]);

        $producto=Product::create($request->all());
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.product-show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::where('id', '!=' , $product->category_id)->get();
        return view('product.product-form', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product' => ['required','string','min:4','max:150',Rule::unique('products')->ignore($product->id)],
            'description' => ['required','string','min:10','max:250'],
            'unitprice' => 'required|regex:/^[\d]{1,5}(\.[\d]{1,2})?$/',
            'category_id' => 'required',
        ]);

        Product::where('id', $product->id)->update($request->except('_token', '_method'));
        return redirect()->route('product.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
