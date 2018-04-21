@extends('master')

@section('judul_bar', 'Halaman Suppliers')

@section('content')

    <div class="col-md-8">
        <section class="panel panel-featured panel-featured-primary">
            <header class="panel-heading">
                <h4> Formulir Ubah Suppliers</h4>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" url="{{ url('suppliers/'.$suppliers->id.'/edit') }}" method="post">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="suppliers">Suppliers</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="suppliers" name="suppliers" value="{{ $suppliers->suppliers }}">
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
