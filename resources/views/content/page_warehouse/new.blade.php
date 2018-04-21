@extends('master')

@section('judul_bar', 'Halaman Gudang')

@section('content')
    @if(Session::has('message_fails'))
        <section class="panel panel-featured-left panel-featured-primary">
            <div class="panel-body">
                <div class="widget-summary widget-summary-xs">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                            <i class="fa fa-life-ring"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">{{ Session::get('message_fails') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
       <div class="col-md-12">
            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">
                    <h4> Formulir Tambah Barang </h4>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" url="{{ url('warehouse/create') }}" method="post">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="goods_code">Kode Barang</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="goods_code" name="goods_code">
                                <span class="required">Isi jika dibutuhkan</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="goods_name">Nama Barang</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="goods_name" name="goods_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Barang</label>
                            <div class="col-md-6">
                                <select data-plugin-selectTwo class="form-control populate" name="typeofgoods">
                                    <option>Pilih Jenis Barang</option>
                                    @foreach($jenis_barang as $data)
                                        <option  value="{{ $data->id }}">{{ $data->typeOfGoods }}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="unit">Satuan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="unit" name="unit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="specs">Spesifikasi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="specs" name="specs">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="brand">Merek</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="brand" name="brand">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="minimum_stock">Minimum Stok</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="minimum_stock" name="minimum_stock">
                                <span class="required">Batas Stok yang tidak bisa digunakan</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="initial_stock">Stok Awal</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="initial_stock" name="initial_stock">
                                <span class="required">Sisa stok tahun lalu</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="standard_price">Standar Harga Barang</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="standard_price" name="standard_price">
                                <span class="required">standar harga barang diinstansi anda</span>
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
