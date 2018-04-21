@extends('master')

@section('judul_bar', 'Halaman Supplier')

@section('content')

    @if(Session::has('message_success'))
        <div class="col-md-8">
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
                                <h4 class="title">{{ Session::get('message_success') }}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif

    @if(Session::has('message_warning'))
        <div class="col-md-8">
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
                                <h4 class="title">{{ Session::get('message_warning') }}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif

    @if(count($supplier) > 0)
        <div class="col-md-8">
            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">

                    <h3> Daftar Supplier <a href="{{ url('suppliers/create') }}" data-toggle="tooltip" title="Tambah Suppliers" class="mb-xs mt-xs mr-xs btn btn-primary"> Tambah Suppliers </a> </h3>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis Barang</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1);
                            @foreach($supplier as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $data->suppliers }}</td>
                                    <td>
                                        <form action="{{ url('suppliers/'.$data->id.'/delete') }}" method="post">
                                            <a href="{{ url('suppliers/'.$data->id.'/edit') }}" type="button" class="mb-xs  btn btn-warning">ubah</a>
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="put">
                                            <button type="submit" class="mb-xs  btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus supplier ini data dengan suppliers yang bersangkutan akan terhapus')">hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    @else
        <section class="panel panel-horizontal">
            <header class="panel-heading bg-white">
                <div class="panel-heading-icon bg-primary mt-sm">
                    <i class="fa fa-music"></i>
                </div>
            </header>
            <div class="panel-body p-lg">
                <h3 class="text-semibold mt-sm">Suppliers Masih Kosong</h3>
                <p>Suppliers : ......
                    <a href="{{ url('suppliers/create') }}" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-file-text-o"></i> Buat Suppliers </a>
                </p>
            </div>
        </section>
    @endif

@stop
