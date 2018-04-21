<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\typeOfGoods as jenis_barang;

class typeOfGoodsController extends Controller
{
    //

    public function index()
    {
        $pass = array(
            'daftar_jenis_barang' => jenis_barang::all()->whereIn('user_id', Session::get('user_id'))
        );
        return view('content.page_typeOfGoods.index', $pass);
    }

    public function create()
    {
        return view('content.page_typeOfGoods.new');
    }

    public function store(Request $req)
    {
        $this->validate($req,[
           'jenisBarang'=>'required'
        ]);

        $jenis_barang = $req->jenisBarang;
        $master_id = Session::get('user_id');

        $filter = jenis_barang::where('typeOfGoods','like',$jenis_barang.'%')->where('user_id',$master_id)->get();

        $jenisBarangModel = new jenis_barang([
            'typeOfGoods' => $jenis_barang,
            'user_id'=> $master_id
        ]);

        if(count($filter) >= 1){
            $req->session()->flash('message_warning','Data sudah tersedia');
            return redirect('typeOfGoods');
            return "lebih dari 1";
        }else{
            if($jenisBarangModel->save())
            {
                $req->session()->flash('message_success','Data Berhasil Ditambahkan');
                return redirect('typeOfGoods');
            }
        }

        $req->session()->flash('message_fails','Data gagal dibuat');
        return redirect('typeOfGoods/create');
    }

    public function edit($id)
    {
        $pass=array(
            'jenis_barang' => jenis_barang::find($id)
        );
        return view('content.page_typeOfGoods.edit', $pass);
    }

    public function update($id, Request $req)
    {

       $this->validate($req,[
            'jenis_barang'=>'required'
        ]);

        $jenis_barang = $req->jenis_barang;
        $master_id = Session::get('user_id');

        $filter = jenis_barang::where('typeOfGoods','like',$jenis_barang.'%')->where('user_id',$master_id);

        $jenisBarangModel = jenis_barang::find($id);
        $jenisBarangModel->typeOfGoods = $jenis_barang;


        if(count($filter) >= 1){
            $req->session()->flash('message_warning','Data sudah tersedia');
            return redirect('typeOfGoods');
        }else{
            if($jenisBarangModel->save())
            {
                $req->session()->flash('message_success','Data Berhasil diubah');
                return redirect('typeOfGoods');
            }
        }

        $req->session()->flash('message_fails','Data gagal diubah');
        return redirect('typeOfGoods/'.$id.'/edit');
    }

    public function destroy($id, Request $req)
    {
        $typeOfGoods = jenis_barang::find($id);
        if($typeOfGoods->delete()){
            $req->session()->flash('message_success', 'Jenis Barang Telah Berhasil dihapus');
            return redirect('typeOfGoods');
        }

        $req->session()->flash('message_fails', 'Jenis Barang Telah Gagal dihapus');
        return redirect('typeOfGoods/'.$id.'/delete');
    }
}
