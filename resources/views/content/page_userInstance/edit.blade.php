@extends('master')

@section('judul_bar', 'Halaman Mengubah Akun')

@section('content')



    <div class="col-md-12">
        <section class="panel panel-featured panel-featured-primary">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>
                <h2 class="panel-title">Formulir</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" url="{{ url('newAccount/'.$userInstance->id.'/edit') }}" method="post" enctype="multipart/form-data">
                    @if($errors->any())
                        <div class="form-group">
                            <div class="col-md-6">
                                @foreach( $errors as $error)
                                <p> {{ $error }} </p>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="username">Nama Pengguna</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="username" name="username" value="{{ $userInstance->username }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="password">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="password" value="{{ $userInstance->password }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Nama Lengkap</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $userInstance->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Foto</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="foto" name="foto">
                            <br>
                            <div align="center">
                            <img src="{{ asset('ManagementUserPhoto/'.$userInstance->photo) }}" style="height: 30%;width: 40%">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" align="center">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary"><li class="fa fa-check-circle"> Proses </li></button>
                    </div>
                </form>
            </div>
        </section>
    </div>


@stop
