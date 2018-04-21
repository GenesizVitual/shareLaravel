@extends('master')

@section('judul_bar', 'Halam Pertanggung Jawaban')

@section('content')

    <div class="col-md-8">
        <section class="panel panel-featured panel-featured-primary">
            <header class="panel-heading">
                <h4> Formulir Ubah Surat Pertanggung Jawaban </h4>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" url="{{ url('goodsreceipt/'.$spj->id.'/edit') }}" method="post">
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="numberSPJ">Nomor Surat Pertanggung Jawaban</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="numberSPJ" name="numberSPJ" value="{{ $spj->number_spj }}">
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
