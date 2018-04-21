@extends('master')

@section('judul_bar', 'Tahun Anggaran')

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


    @if(count($fiscalYears) > 0)
        <div class="col-md-8">
            <section class="panel panel-featured panel-featured-primary">
                <header class="panel-heading">

                    <h3> Daftar Tahun Anggaran  <a href="{{ url('fiscalyears/create') }}" data-toggle="tooltip" title="Tambah Tahun Anggaran" class="mb-xs mt-xs mr-xs btn btn-primary"> Tambah Tahun Anggaran </a> </h3>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table mb-none">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Years</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($index=1)
                            @foreach($fiscalYears as $fiscalYear)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $fiscalYear->years }}</td>
                                <td>
                                    Aktif
                                </td>
                                <td>
                                    <form action="{{ url('fiscalyears/'.$fiscalYear->id.'/destroy') }}" method="post">
                                        <a href="{{ url('fiscalyears/'.$fiscalYear->id.'/edit') }}" type="button" class="mb-xs  btn btn-warning">ubah</a>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="put">
                                        <button type="submit" class="mb-xs  btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus tahun anggaran ini data dengan tahun yang bersangkutan akan terhapus')">delete</button>
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
                <h3 class="text-semibold mt-sm">Tahun Anggaran Masih Kosong</h3>
                <p>Tahun Anggaran merupakan Tahun Anggara merupakan tahun anggaran yang berjalan "Buat tahun anggaran" :
                    <a href="{{ url('fiscalyears/create') }}" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-file-text-o"></i> Buat tahun anggaran </a>
                </p>
            </div>
        </section>
    @endif

@stop
