<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Product::get();

        return view('pages.product.index', compact(['data']));
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
        $validator = Validator::make($request->all(), [
            'product_sku'   => 'required',
            'product_name'  => 'required',
            'description'   => 'required',
            'qty'           => 'required|numeric',
            'price'         => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('error', 'Failed Added Data');
        }
        $data = $request->all();

        Product::create($data);

        return back()->with('success', 'Success Added Data');

        // dd($request->all());
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
        //
        $validator = Validator::make($request->all(), [
            'product_sku'   => 'required',
            'product_name'  => 'required',
            'description'   => 'required',
            'qty'           => 'required|numeric',
            'price'         => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('error', 'Failed Added Data');
        }

        $data = collect(request()->except('_token', '_method'))->filter()->all();

        Product::firstWhere('id', $id)->update($data);
        return back()->with('success', 'Success Change Data');
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
        Product::firstWhere('id', $id)->delete();
        return back()->with('success', 'Success Delete Data');
    }
}
