@extends('master')

@section('judul_bar', 'Tahun Anggaran')

@section('content')

    <div class="col-md-8">
        <section class="panel panel-featured panel-featured-primary">
            <header class="panel-heading">
                <h4> Formulir Ubah Tahun Anggaran </h4>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" url="{{ url('fiscalyears/'.$years->id.'/edit') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="username">Tahun</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="years" name="years" value="{{ $years->years }}">
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
