<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\typeOfGoods as jenis_barang;

use App\Warehouse as gudang;

use Session;

class WarehouseController extends Controller
{
    //

    public function index()
    {
        $pass=array(
            'warehouse'=>gudang::all()->whereIn('user_id', Session::get('user_id'))
        );
        return view('content.page_warehouse.index', $pass);
    }

    public function create()
    {
        $pass = array(
             'jenis_barang'=> $this->jenis_barang()
        );
        return view('content.page_warehouse.new', $pass);
    }

    public function store(Request $req)
    {
        $this->validate($req,[
            'goods_name'=> 'required',
            'typeofgoods'=> 'required',
            'unit'=>'required',
            'minimum_stock'=> 'required|numeric',
            'initial_stock'=> 'required|numeric',
            'standard_price'=>'required|numeric'
        ]);

        $goods_code = $req->goods_code;
        $goods_name = $req->goods_name;
        $typeOfgoods = $req->typeofgoods;
        $unit = $req->unit;
        $minimum_stock = $req->minimum_stock;
        $specs = $req->specs;
        $brand = $req->brand;
        $initial_stock = $req->initial_stock;
        $standard_price= $req->standard_price;

        $gudang = new gudang([
            'goods_code'=> $goods_code,
            'goods_name'=> $goods_name,
            'typeofgoods_id'=> $typeOfgoods,
            'unit' => $unit,
            'specs' => $specs,
            'brand' => $brand,
            'minimum_stock'=> $minimum_stock,
            'initial_stock'=> $initial_stock,
            'standard_price'=>$standard_price,
            'user_id'=> Session::get('user_id')
        ]);

        if($gudang->save())
        {
            $req->session()->flash('message_success','Barang telah ditambahkan');
            return redirect('warehouse');
        }

        $req->session()->flash('message_fails','Barang gagal ditambahkan');
        return redirect('warehouse/create');
    }

    public function edit($id)
    {
        $pass = array(
            'data'=> gudang::find($id),
            'jenis_barang'=> $this->jenis_barang()
        );
        return view('content.page_warehouse.edit', $pass);
    }

    public function update($id,Request $req)
    {
        $gudang = gudang::find($id);

        $this->validate($req,[
            'goods_name'=> 'required',
            'typeofgoods'=> 'required',
            'unit'=>'required',
            'minimum_stock'=> 'required|numeric',
            'initial_stock'=> 'required|numeric',
            'standard_price'=>'required|numeric'
        ]);

        $goods_code = $req->goods_code;
        $goods_name = $req->goods_name;
        $typeOfgoods = $req->typeofgoods;
        $unit = $req->unit;
        $minimum_stock = $req->minimum_stock;
        $initial_stock = $req->initial_stock;
        $standard_price= $req->standard_price;

        $gudang->goods_code = $goods_code;
        $gudang->goods_name = $goods_name;
        $gudang->typeofgoods_id = $typeOfgoods;
        $gudang->unit = $unit;
        $gudang->minimum_stock = $minimum_stock;
        $gudang->initial_stock = $initial_stock;
        $gudang->standard_price = $standard_price;

        if($gudang->save())
        {
            $req->session()->flash('message_success','Barang telah diubah');
            return redirect('warehouse');
        }

        $req->session()->flash('message_fails','Barang gagal diubah');
        return redirect('warehouse/'.$id.'/edit');
    }

    public function delete($id, Request $req)
    {
        $gudang = gudang::find($id);

        if($gudang->delete())
        {
            $req->session()->flash('message_success','Barang telah dihapus');
            return redirect('warehouse');
        }

        $req->session()->flash('message_fails','Barang gagal dihapus');
        return redirect('warehouse');
    }

    private function jenis_barang()
    {
        $jenis_barang = jenis_barang::all()->where('user_id', Session::get('user_id'));
        return $jenis_barang;
    }
}
