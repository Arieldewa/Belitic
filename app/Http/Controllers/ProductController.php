<?php

namespace App\Http\Controllers;

use App\Product;
use App\HistoryStok;

use Illuminate\Http\Request;

use Carbon\Carbon;

class ProductController extends Controller
{
    protected  $product;
    protected  $historystok;

    function __construct()
    {
        $this->product = new Product();
        $this->historystok = new HistoryStok();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'name' => 'required',
            'harga' => 'required',
        ]);

        $this->product->create($request->all());

        return redirect()->route('product.index');
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
        $product = $this->product->find($id);

        return view('product.edit',compact('product'));
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
        $product = $this->product->find($id);
        //kirim stok yg dulu ke history stok
        $dataStok = array(
                'id_product' => $product->id,   
                'stok' => 20,   
                'date' => Carbon::now(),   
            );
        $this->historystok->create($dataStok);
        $product->update($request->all());

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->find($id)->delete();
        return 1;
    }
}
