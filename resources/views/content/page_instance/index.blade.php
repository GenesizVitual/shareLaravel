@extends('master')

@section('judul_bar', 'Profil Instansi')

@section('content')

    @if(Session::has('message_success'))
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
    @endif

    @if(Session::has('message_warning'))
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
    @endif

@if(count($instansi_profil) > 0)
<div class="col-md-8">
    <section class="panel panel-featured panel-featured-primary">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="{{ url('editInstansi/'.$instansi_profil[0]->id.'/edit') }}" data-toggle="tooltip" title="Ubah Profil"><li class="fa fa-edit" ></li></a>
            </div>
            <h5></h5>
        </header>
        <div class="panel-body">
            <p>
            <h3 align="center"> Profil Instansi </h3>
            </p>
            <hr>

            <div class="col-md-6">
                <p>
                <h5>Instansi : {{ $instansi_profil[0]->instance }}</h5>
                </p>
                <p>
                <h5>Provinsi : {{ $instansi_profil[0]->getProvince->province }}</h5>
                </p>
                <p>
                <h5>Kabupaten : {{ $instansi_profil[0]->getDistrict->district }}</h5>
                </p>
                <p>
                <h5>Alamat : {{ $instansi_profil[0]->alamat }}</h5>
                </p>
                <p>
                <h5>Telepon : {{ $instansi_profil[0]->no_telp }}</h5>
                </p>
                <p>
                <h5>Fax : {{ $instansi_profil[0]->fax }}</h5>
                </p>
            </div>
            <div class="col-md-3">
                 <img style="height: 100%; width: 100%" src="{{ asset('logo/'.$instansi_profil[0]->logo) }}" alt="Logo Tidak Ditemukan">
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
            <h3 class="text-semibold mt-sm">Profil Instansi Belum Dibuat</h3>
            <p>Profil Instansi merupakan data lengkap instansi ditempat anda berada. untuk membuat profil instansi tekan tombol "isi profil instansi" :
                <a href="{{ url('profilInstansi') }}" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-file-text-o"></i> Isi profil instansi </a>
            </p>
        </div>
    </section>
@endif

@stop
