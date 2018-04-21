<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Spj as spj;

use App\Tbk as tbk;

use Illuminate\Support\Facades\Session;

class SpjController extends Controller
{
    //============================================== SPJ ===============================================================

    public function index()
    {
        $pass=array(
            'listSpj'=>spj::all()->whereIn('user_id', Session::get('user_id')),
            'spj'=>'active'
        );
        return view('content.page_spjPenerimaan.index', $pass);
    }

    public function create()
    {
        return view('content.page_spjPenerimaan.new');
    }

    public function store(Request $req)
    {
        $this->validate($req,[
            'numberSPJ'=>'required'
        ]);

        $numberSPJ = $req->numberSPJ;

        $spjModel = new spj([
            'number_spj'=> $numberSPJ,
            'user_id'=> Session::get('user_id')
        ]);

        if($spjModel->save())
        {
            $req->session()->flash('message_success', 'Surat Perjanjian No'.$numberSPJ.' telah dibuat');
            return redirect('goodsreceipt');
        }

        $req->session()->flash('message_fails', 'Surat Perjanjian No'.$numberSPJ.' gagal dibuat');
        return redirect('goodsreceipt/create');
    }

    public function edit($id)
    {
        $pass = array(
            'spj' => spj::find($id)
        );

        return view('content.page_spjPenerimaan.edit', $pass);
    }

    public function update($id,Request $req)
    {
        $this->validate($req,[
            'numberSPJ'=>'required'
        ]);

        $numberSPJ = $req->numberSPJ;

        $spjModel = spj::find($id);
        $spjModel->number_spj = $numberSPJ;
        if($spjModel->save())
        {
            $req->session()->flash('message_success', 'Surat Perjanjian No'.$numberSPJ.' telah diubah');
            return redirect('goodsreceipt');
        }

        $req->session()->flash('message_fails', 'Surat Perjanjian No'.$numberSPJ.' gagal diubah');
        return redirect('goodsreceipt/'.$id.'/edit');
    }

    public function delete($id, Request $req){
        $spjModel = spj::find($id);
        if($spjModel->delete())
        {
            $req->session()->flash('message_success', 'Surat Perjanjian Sudah dihapus');
            return redirect('goodsreceipt');
        }
        $req->session()->flash('message_fails', 'Surat Perjanjian gagal dihapus');
        return redirect('goodsreceipt');
    }


}
