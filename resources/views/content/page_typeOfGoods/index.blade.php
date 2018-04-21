@extends('master')

@section('judul_bar', 'Halaman Jenis Barang')

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

    @if(count($daftar_jenis_barang) > 0)
        <div class="col-md-8">
            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">

                    <h3> Daftar Jenis Barang  <a href="{{ url('typeOfGoods/create') }}" data-toggle="tooltip" title="Tambah Jenis Barang" class="mb-xs mt-xs mr-xs btn btn-primary"> Tambah Jenis Barang </a> </h3>
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
                            @foreach($daftar_jenis_barang as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $data->typeOfGoods }}</td>
                                    <td>
                                        <form action="{{ url('typeOfGoods/'.$data->id.'/delete') }}" method="post">
                                            <a href="{{ url('typeOfGoods/'.$data->id.'/edit') }}" type="button" class="mb-xs  btn btn-warning">ubah</a>
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="put">
                                            <button type="submit" class="mb-xs  btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus jenis Barang ini data dengan tahun yang bersangkutan akan terhapus')">hapus</button>
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
                <h3 class="text-semibold mt-sm">Jenis Barang Masih Kosong</h3>
                <p>Jenis barang : ......
                    <a href="{{ url('typeOfGoods/create') }}" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-file-text-o"></i> Buat Jenis Barang </a>
                </p>
            </div>
        </section>
    @endif

@stop
