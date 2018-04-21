@extends('master')

@section('judul_bar', 'Halaman Tanda Bukti Kas')

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
    <div class="col-md-8">
        <section class="panel panel-featured panel-featured-primary">
            <header class="panel-heading">
                <h4> Formulir Ubah Tanda Bukti Kas (TBK)</h4>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" url="{{ url('tbk/'.$spj->id.'/edit/'.$tbk->id) }}" method="post">
                    <div class="form-group">
                        <label class="col-md-5 control-label" >Nomor Surat Pertanggung Jawaban</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{ $spj->number_spj }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="numberTbk">Masukan Nomor TBK</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="numberTbk" name="numberTbk" value="{{ $tbk->number_tbk }}">
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
