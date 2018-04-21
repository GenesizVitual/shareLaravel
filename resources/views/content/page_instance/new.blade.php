@extends('master')

@section('judul_bar', 'Profil Instansi')

@section('content')

        <div class="col-md-12">
            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">
                    <h2 class="panel-title">Halaman mengisi Instansi</h2>
                </header>
                <div class="panel-body">
                    <form action="{{ url('profilInstansi') }}" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="nama_instansi">Nama Instansi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="nama_instansi" name="nama_instansi">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Provinsi</label>
                            <div class="col-md-6">
                                <select data-plugin-selectTwo class="form-control populate" name="provinsi">
                                    <option> Pilih Provinsi </option>
                                    @foreach($provinsi as $provinsi)
                                        <option value="{{ $provinsi->id }}"> {{ $provinsi->province }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Kabupaten</label>
                            <div class="col-md-6">
                                <select data-plugin-selectTwo class="form-control populate" name="kabupaten">
                                    <option>Pilih Kabupaten</option>
                                    @foreach($kabupaten as $kabupaten)
                                        <option value="{{ $kabupaten->id }}">{{ $kabupaten->district }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-6">
                                <textarea name="alamat" rows="5" class="form-control" placeholder="Isi Dengan Alamat lengkap Instansi anda" required=""></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="no_telp">No Telepon/Handphone</label>
                            <div class="col-md-6">
                                <input class="form-control" data-plugin-maxlength="" maxlength="20" name="no_telp">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="fax">Fax</label>
                            <div class="col-md-6">
                                <input class="form-control" data-plugin-maxlength="" maxlength="20" name="fax">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Logo</label>
                            <div class="col-md-6">
                                <input class="form-control" type="file" name="logo">
                            </div>
                        </div>

                        <div align="center">
                            {{ csrf_field() }}
                            <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">Proses</button>
                        </div>

                    </form>
                </div>
            </section>
        </div>

@stop
