<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return  view('products.index',compact('products'));
       # return view('products.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'name'=>'required',
            'suppler_company'=>'required',
            'count'=>'required',
            'cost'=>'required',

        ]);
        $product = new Product([
            'name'=>$request->get('name'),
            'suppler_company'=>$request->get('suppler_company'),
            'count'=>$request->get('count'),
            'cost'=>$request->get('cost'),

        ]);
        $product->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->getAllProducts()->find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = $this-> getAllProducts()->find($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id ,Request $request)
    {
        request()->validate([
            'name'=>'required',
            'suppler_company'=>'required',
            'count'=>'required',
            'cost'=>'required',

        ]);
        $product = $this->getAllProducts()->find($id);
        $product->update($request->all());
        return redirect('/products');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->getAllProducts()->find($id);
        $product->delete();
        return redirect('/products');
    }
    public function getAllProducts(){
        $products = Product::all();
        return $products;
    }
}
