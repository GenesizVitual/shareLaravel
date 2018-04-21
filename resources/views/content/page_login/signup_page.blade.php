<h1> Aplikasi Manajemen Persediaan </h1>
<span> Membuat Akun ini berfungsi untuk memberi akses kepada pengguna pada aplikasi ini</span> <br>
<form action="{{ url('signup') }}" method="post">

    @if($errors->any())
        @foreach($errors as $error)
            <p style="color: red">{{ $error }}</p>
        @endforeach
    @endif

    @if(Session::has('message_fail'))
        <p style="color: red"> {{ Session::get('message_fail') }} </p>
    @endif
    <div >
        <label for="email"> Email </label>
        <input type="email" name="email" id="email">
    </div>
    <br>
    <div>
        <label for="password"> Password </label>
        <input type="password" name="password" id="password">
    </div>
    <hr>
    <div>
        <label for="name"> Masukan Nama </label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        {{ csrf_field() }}
        <input type="submit" value="Buatkan Akun">
    </div>
</form>