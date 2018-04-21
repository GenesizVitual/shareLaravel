<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fiscal_years as fiscalYears;

use Session;

class FiscalyearsControllers extends Controller
{
    //
    public function index()
    {
        $pass=array(
          'fiscalYears' => fiscalYears::all()->whereIn('user_id', Session::get('user_id'))
        );
        return view('content.page_fiscalyears.index', $pass);
    }

    public function create()
    {
        return view('content.page_fiscalyears.new');
    }

    public function store(Request $req)
    {
        $this->validate($req,[
           'years' => 'required|numeric'
        ]);

        $tahun_anggaran = $req->years;
        $master_id = Session::get('user_id');
        $fiscalYears = new fiscalYears([
            'years'=>$tahun_anggaran,
            'user_id'=> $master_id
        ]);

        if ($fiscalYears->save())
        {
            $req->session()->flash('message_success', 'Tahun anggaran sudah ditambahkan');
            return redirect('fiscalyears');
        }

        $req->session()->flash('message_fails', 'Tahun anggaran gagal ditambahkan');
        return redirect('fiscalyears/create');
    }

    public function edit($id)
    {
        $pass = array(
            'years' => fiscalYears::find($id)
        );
        return view('content.page_fiscalyears.edit', $pass);
    }

    public function update($id, Request $req)
    {
        $this->validate($req,[
           'years' => 'required|numeric'
        ]);

        $tahun_anggaran = $req->years;

        $fiscalYears = fiscalYears::find($id);
        $fiscalYears->years = $tahun_anggaran;

        if($fiscalYears->save())
        {
            $req->session()->flash('message_success', 'Tahun Anggaran Berhasil diubah');
            return redirect('fiscalyears');
        }

        $req->session()->flash('message_fails','Tahun Anggaran gagal diubah');
        return redirect('fiscalyears/'.$id.'/edit');
    }

    public function destroy($id, Request $req)
    {
        $fiscalYears = fiscalYears::find($id);
        if ($fiscalYears->delete())
        {
            $req->session()->flash('message_success', 'Tahun Anggaran Berhasil diubah');
            return redirect('fiscalyears');
        }
        $req->session()->flash('message_fails','Tahun Anggaran gagal dihapus');
        return redirect('fiscalyears');
    }
}
