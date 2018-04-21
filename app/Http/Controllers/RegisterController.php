<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User as user;

use Session;
class RegisterController extends Controller
{
    public function index()
    {
        return "Hello Github";
    }

    public function Login()
    {
        return view('content.page_login.index');
    }

    public function Signup(){
        return view('content.page_login.signup_page');
    }

    public function StoreAccount(Request $req)
    {
        $this->validate($req, [
           'email' => 'required|email',
           'password' => 'required|min:5',
           'name' => 'required'
        ]);

        $name = $req->name;
        $email = $req->email;
        $password = $req->password;

        $user = new user([
            'name'      => $name,
            'email'     => $email,
            'password'  => $password
        ]);

        if($user->save()){

            $req->session()->flash('message_success', 'Akun Anda Telah berhasil dibuat');
            return redirect('/');
        }

            $req->session()->flash('message_fail', 'Akun Anda gagal dibuat');
            return redirect('signup');

        return "Account";
    }

    public function StoreLogin(Request $req)
    {
        $this->validate($req,[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $email = $req->email;
        $password = $req->password;

        $user = user::where('email', $email)->where('password', $password)->get();

        if(count($user) > 0)
        {
            $req->session()->put('user_id', $user[0]->id);
            $req->session()->put('nama', $user[0]->name);
            $req->session()->flash('message_success','Selamat Datang di Aplikasi Manajemen Persediaan');
            return redirect('dashboard');
        }

        $req->session()->flash('message_fail','Anda tidak mempunyai hak akses pada aplikasi ini');
        return redirect('/');

    }
}
