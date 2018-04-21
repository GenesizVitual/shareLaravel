<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Instance as instance;

use App\Province as province;

use App\District as district;

use Session;

class InstanceController extends Controller
{
    //

    public function getUserId()
    {
        $user_id = Session::get('user_id');
        return $user_id;
    }

    public function index()
    {
        $instance = array(
            'instansi_profil'=> instance::all()->whereIn('user_id', Session::get('user_id'))
        );

        return view('content.page_instance.index', $instance);
    }

    public function create()
    {
        $pass = array(
            'provinsi'=> province::all(),
            'kabupaten'=> district::all()
        );
        return view('content.page_instance.new', $pass);
    }

    public function store(Request $req)
    {

        $this->validate($req, [
            'nama_instansi' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'fax' => 'required|numeric',
            'logo' => 'required|image|mimes:jpeg,png,gif,jpg|max:2048'
        ]);

        $name_instansi = $req->nama_instansi;
        $provinsi = $req->provinsi;
        $kabupaten = $req->kabupaten;
        $alamat = $req->alamat;
        $no_telp = $req->no_telp;
        $fax = $req->fax;
        $logo = $req->logo;

        $imagename = time() . '.' . $logo->getClientOriginalExtension();

        $instansi = new instance([
            'instance' => $name_instansi,
            'province_id' => $provinsi,
            'district_id' => $kabupaten,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'fax' => $fax,
            'logo' => $imagename,
            'user_id'=> $this->getUserId()
        ]);

        if ($instansi->save()){
            if ($logo->move(public_path('logo'), $imagename)) {
                $req->session()->flash('message_success','Instansi Berhasil dibuat');
                return redirect('profileInstansi');
            }else{
                $req->session()->flash('message_fail','Instansi Berhasil dibuat tapi logo tidak ter upload');
                return redirect('profileInstansi');
            }
        }

        $req->session()->flash('message_fail', 'Instansi Gagal dibuatkan');
        return redirect('profilInstansi');
    }

    public function edit($id)
    {
        $data = array(
            'provinsi'=> province::all(),
            'kabupaten'=> district::all(),
            'data_instansi' => instance::find($id)
        );
        return view('content.page_instance.edit', $data);
    }

    public function update($id, Request $req)
    {
        $this->validate($req, [
            'nama_instansi' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'fax' => 'required|numeric',
            'logo' => 'required|image|mimes:jpeg,png,gif,jpg|max:2048'
        ]);

        $name_instansi = $req->nama_instansi;
        $provinsi = $req->provinsi;
        $kabupaten = $req->kabupaten;
        $alamat = $req->alamat;
        $no_telp = $req->no_telp;
        $fax = $req->fax;

        $dataInstansi = instance::find($id);
        $dataInstansi->fill($req->except('logo'));

        $dataInstansi->instance = $name_instansi;
        $dataInstansi->province_id = $provinsi;
        $dataInstansi->district_id = $kabupaten;
        $dataInstansi->alamat = $alamat;
        $dataInstansi->no_telp = $no_telp;
        $dataInstansi->fax = $fax;

        if($file = $req->hasFile('logo'))
        {
            $file= $req->file('logo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('logo'), $filename);
            $dataInstansi->logo = $filename;
        }


        if($dataInstansi->save())
        {
            $req->session()->flash('message_success','Profil instansi berhasil terubah');
            return redirect('profileInstansi');
        }

        return $id;
    }
}
