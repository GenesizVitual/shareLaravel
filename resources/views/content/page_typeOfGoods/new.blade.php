@extends('master')

@section('judul_bar', 'Halaman Jenis Barang')

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
       <div class="col-md-6">
            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">
                    <h4> Formulir Tambah Jenis Barang </h4>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" url="{{ url('typeOfGoods/create') }}" method="post">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="jenisBarang">Jenis Barang</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="jenisBarang" name="jenisBarang">
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
