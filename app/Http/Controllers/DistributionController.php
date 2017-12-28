<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Distribution;
use App\Product;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    protected  $distribution;

    function __construct()
    {
        $this->distribution = new Distribution();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributions = $this->distribution->all();
        return view('distribution.index',compact('distributions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::pluck('name','id');
        $products = Product::pluck('name','id');
        return view('distribution.create',compact('agents','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'price' => 'required',
            'price' => 'required',
        ]);

        $this->distribution->create($request->all());

        return redirect()->route('distribution.index');
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
        $distribution = $this->distribution->find($id);

        return view('distribution.edit',compact('distribution'));
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
        $this->validate($request,[
            'name' => 'required',
            'harga' => 'required',
        ]);
        $distribution = $this->distribution->find($id);
        $distribution->update($request->all());

        return redirect()->route('distribution.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->distribution->find($id)->delete();
        return 1;
    }


    public function cost(Request $request)
    {
        $product_price =  Product::find($request->id)->harga;

        return $product_price*$request->qty;
    }
}
