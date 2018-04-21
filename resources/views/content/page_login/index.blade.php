<h1> Selamat Datang Di Aplikasi Manajemen Persediaan </h1>
<span> Majemen persediaan adalah .... </span> <br>
<form action="{{ url('/') }}" method="post">
    @if(Session::has('message_success'))
        <p style="color: green">{{ Session::get('message_success') }} </p>
    @endif

    @if(Session::has('message_fail'))
        <p style="color: red">{{ Session::get('message_fail') }} </p>
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
    <div>
        {{ csrf_field() }}
        <input type="submit" value="Masuk"> <a href="{{ url('signup') }}" > Mendaftar </a>
    </div>
</form>