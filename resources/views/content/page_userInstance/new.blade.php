@extends('master')

@section('judul_bar', 'Halaman Membuat Akun Baru')

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
                <form class="form-horizontal form-bordered" url="{{ url('newAccount') }}" method="post" enctype="multipart/form-data">
                    @if($errors->any())
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">Instansi</label>

                            <div class="col-md-6">
                                @foreach( $errors as $error)
                                ada yang error {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="name">Instansi</label>
                      <div class="col-md-6">
                          @if(count($instansi) > 0)
                          <input type="text" class="form-control" value="{{ $instansi[0]->instance }}" readonly>
                          <input type="hidden" class="form-control" name="instance_id" value="{{ $instansi[0]->id }}" readonly>
                          @else
                              <label style="color: red"  class="control-label"> *Silahkan ini Profil Instansi Anda Terlebih Dahulu </label>
                          @endif
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="username">Nama Pengguna</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="password">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Nama Lengkap</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="foto">Foto</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div>

                    <div class="form-group" align="center">
                        {{ csrf_field() }}
                            <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary"><li class="fa fa-check-circle"> Proses </li></button>
                    </div>
                </form>
            </div>
        </section>
    </div>


@stop
