<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Spj as spj;

use App\Tbk as tbk;

use Session;

class TbkController extends Controller
{
    //


    public function tbk_list($id)
    {
        $pass = array(
            'tbkList'=>tbk::all()->where('spj_id', $id)->whereIn('user_id', Session::get('user_id')),
            'spj'=>spj::find($id)
        );
        return view('content.page_spjTbk.index', $pass);
    }

    public function createtbk($id)
    {
        $pass = array(
            'spj'=>spj::find($id)
        );

        return view('content.page_spjTbk.new', $pass);
    }

    public function tbkStore($id,Request $req)
    {
        $this->validate($req,[
            'numberTbk'=>'required'
        ]);

        $spj_id = $id;
        $number_tbk = $req->numberTbk;

        $tbkModel = new tbk([
            'number_tbk'=>$number_tbk,
            'spj_id' => $spj_id,
            'user_id'=> Session::get('user_id')
        ]);

        if($tbkModel->save()){
            $req->session()->flash('message_success', 'Tbk Berhasil Dibuatkan');
            return redirect('tbk/'.$spj_id.'/list');
        }

        $req->session()->flash('message_fails', 'Tbk Gagal dibuatkan');
        return redirect('tbk/'.$spj_id.'/create');
    }

    public function tbkEdit($spjID,$tbkID)
    {
        $pass = array(
            'spj'=>spj::find($spjID),
            'tbk'=>tbk::find($tbkID)
        );
        return view('content.page_spjTbk.edit', $pass);
    }

    public function tbkUpdate($spjID,$tbkID, Request $req)
    {
        $this->validate($req,[
            'numberTbk'=>'required'
        ]);

        $spj_id = $spjID;
        $number_tbk = $req->numberTbk;

        $tbkModel = tbk::find($tbkID);
        $tbkModel->number_tbk = $number_tbk;
        if($tbkModel->save()){
            $req->session()->flash('message_success', 'Tbk Berhasil Diubah');
            return redirect('tbk/'.$spj_id.'/list');
        }

        $req->session()->flash('message_fails', 'Tbk Gagal diubah');
        return redirect('tbk/'.$spj_id.'/create');
    }

    public function tbkDelete($spjID,$tbkID, Request $req)
    {
        $tbkModel = tbk::find($tbkID);
        if($tbkModel->delete()){
            $req->session()->flash('message_success', 'Tbk Berhasil Dihapus');
            return redirect('tbk/'.$spjID.'/list');
        }
        $req->session()->flash('message_fails', 'Tbk Gagal dihapus');
        return redirect('tbk/'.$spjID.'/create');
    }

}
