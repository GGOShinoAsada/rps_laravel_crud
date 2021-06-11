<?php

namespace App\Http\Controllers;

use App\SupplerCompany;
use Illuminate\Http\Request;

class SupplerCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SupplerCompany::all();
        return view('supplercompanies.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplercompanies.create');
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
            'description'=>'required',
            'rating'=>'required',

        ]);
        $product = new SupplerCompany([
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'rating'=>$request->get('rating'),
        ]);
        $product->save();

        return redirect('/supplercompanies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sk = SupplerCompany::all()->find($id);
        return view('supplercompanies.details', compact('sk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $sk = $this->getAllSupplerCompanies()->find($id);
       return view('supplercompanies.edit',['supplercompany'=>$sk]);
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
        request()->validate([
            'name'=>'required',
            'description'=>'required',
            'rating'=>'required',

        ]);
        $sk = $this->getAllSupplerCompanies()->find($id);
        $sk->update($request->all());
        return redirect('/supplercompanies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sk = $this->getAllSupplerCompanies()->find($id);
        $sk->delete();
        return redirect('/supplercompanies');
    }
    public function getAllSupplerCompanies(){
        $sk = SupplerCompany::all();
        return $sk;
    }
}
