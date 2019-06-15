<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('products.index', ['products' => Product::all()]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        return view('products.show', ['product' => Product::findOrFail($id)]);
    }

    public function create(){
        return view('products.create');
    }

    public function edit($id){
        return view('products.edit', ['product' => Product::findOrFail($id)]);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function store(Request $request){

        $product = new Product();

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->price_user = $request->price_user;
        $product->price_3_opt = $request->price_3_opt;
        $product->price_8_opt = $request->price_8_opt;
        $product->price_dealer = $request->price_dealer;
        $product->price_vip = $request->price_vip;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;

        $product->save();
        return redirect()->route('products.index');
    }


    public function update($id,Request $request){
        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->price_user = $request->price_user;
        $product->price_3_opt = $request->price_3_opt;
        $product->price_8_opt = $request->price_8_opt;
        $product->price_dealer = $request->price_dealer;
        $product->price_vip = $request->price_vip;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;

        $product->save();
        return redirect()->route('products.index');
    }


    public function destroy($id){
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index');
    }
}
