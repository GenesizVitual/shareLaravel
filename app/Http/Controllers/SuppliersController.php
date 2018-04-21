<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Suppliers as suppliers;

class SuppliersController extends Controller
{
    //
    public function index()
    {
        $pass = array(
            'supplier'=> suppliers::all()->whereIn('user_id', Session::get('user_id'))
        );
        return view('content.page_suppliers.index', $pass);
    }

    public function create()
    {
        return view('content.page_suppliers.new');
    }

    public function store(Request $req)
    {
        $this->validate($req,[
            'suppliers'=>'required'
        ]);

        $suppliers = $req->suppliers;
        $master_id = Session::get('user_id');

        $count = suppliers::where('suppliers','like',$suppliers.'%')->where('user_id', $master_id)->count();

        $suppliersModels = new suppliers([
           'suppliers' => $suppliers,
            'user_id'=> $master_id
        ]);
        if($count >= 1)
        {
            $req->session()->flash('message_warning','Supplier Sudah Ada');
            return redirect('suppliers');
        }else{
            if($suppliersModels->save())
            {
                $req->session()->flash('message_success','Supplier berhasil ditambahkan');
                return redirect('suppliers');
            }
        }

        $req->session()->flash('message_fails','Supplier gagal ditambahkan');
        return redirect('suppliers/create');
    }

    public function edit($id)
    {
        $pass = array(
            'suppliers' => suppliers::find($id)
        );
        return view('content.page_suppliers.edit', $pass);
    }

    public function update($id,Request $req)
    {
        $this->validate($req,[
            'suppliers'=>'required'
        ]);

        $suppliers = $req->suppliers;
        $master_id = Session::get('user_id');

        $count = suppliers::where('suppliers','like',$suppliers.'%')->where('user_id', $master_id)->count();

        $suppliersModels = suppliers::find($id);
        $suppliersModels->suppliers = $suppliers;
        $suppliersModels->user_id = $master_id;
        if($count >= 1)
        {
            $req->session()->flash('message_warning','Supplier Sudah Ada');
            return redirect('suppliers');
        }else{
            if($suppliersModels->save())
            {
                $req->session()->flash('message_success','Supplier berhasil diubah');
                return redirect('suppliers');
            }
        }

        $req->session()->flash('message_fails','Supplier gagal diubah');
        return redirect('suppliers/'.$id.'/edit');
    }

    public function destroy($id, Request $req)
    {
        $suppliersModel = suppliers::find($id);
        if($suppliersModel->delete())
        {
            $req->session()->flash('message_success','Supplier berhasil dihapus');
            return redirect('suppliers');
        }

        $req->session()->flash('message_fails','Supplier gagal dihapus');
        return redirect('suppliers/'.$id.'/delete');
    }

}
