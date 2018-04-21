@extends('master')

@section('judul_bar', 'Halaman Tanda Bukti Kas')

@section('content')


    @if(count($tbkList) > 0)
        <section class="content-with-menu mailbox">
            <div class="content-with-menu-container" data-mailbox data-mailbox-view="email">
                <div class="inner-menu-toggle">
                    <a href="#" class="inner-menu-expand" data-open="inner-menu">
                        Show Menu <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
                @include('content.page_spjTbk.menuItem')

                {{-- ================ --}}
                <div class="inner-body mailbox-folder">
                    {{-- Start Header--}}

                    <div class="mailbox-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="mailbox-title text-light m-none">
                                    <a id="mailboxToggleSidebar" class="sidebar-toggle-btn trigger-toggle-sidebar">
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class="line line-angle1"></span>
                                        <span class="line line-angle2"></span>
                                    </a>

                                    Rincian TBK
                                </h1>
                            </div>
                            <div class="col-sm-6">
                                <div class="search">
                                    <div class="input-group input-search">
                                        <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                                        <span class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Header--}}
                <!-- START: .mailbox-actions -->
                    <div class="mailbox-actions">

                        <ul class="list-unstyled m-none pt-lg pb-lg">
                            <li class="ib mr-sm">
                                <div class="btn-group">
                                    <a href="#" class="item-action fa fa-chevron-down dropdown-toggle" data-toggle="dropdown"></a>
                                </div>
                            </li>
                            <li class="ib mr-sm">
                                <a class="item-action fa fa-refresh" href="#"></a>
                            </li>
                            <li class="ib mr-sm">
                                <a class="item-action fa fa-tag" href="#"></a>
                            </li>
                            <li class="ib">
                                <a class="item-action fa fa-times text-danger" href="#"></a>
                            </li>
                        </ul>
                    </div>
                    <!-- END: .mailbox-actions -->
                    <div id="mailbox-email-list" class="mailbox-email-list">
                        <div class="nano">
                            <div class="nano-content">
                                <ul id="" class="list-unstyled">
                                    @foreach($tbkList as $tbk)
                                    <li>
                                        <a href="mailbox-email.html">
                                            <div class="col-sender">
                                                <p class="m-none ib"><a href="{{ url('tbk/'.$tbk->id.'/list') }}"  class="mb-xs mt-xs mr-xs btn btn-primary" style="color: white;">Penerimaan</a></p>
                                            </div>
                                            <div class="col-mail">
                                                <p class="m-none mail-content">
                                                    <span class="subject">{{ $tbk->number_tbk }}</span>
                                                    <span class="mail-partial"></span>
                                                </p>
                                                <p class="m-none mail-date" style="width: 30%;" >
                                                    <form action="{{ url('tbk/'.$spj->id.'/delete/'.$tbk->id) }}" method="post" align="right">
                                                        <a href="{{ url('tbk/'.$spj->id.'/edit/'.$tbk->id) }}" class="mb-xs mt-xs mr-xs btn btn-warning"> <i class="fa fa-edit" title="Ubah SPJ"></i></a>
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="PUT">
                                                        <button type="submit"  class="mb-xs mt-xs mr-xs btn btn-danger" onclick="return confirm('Apakah Anda yakin menghapus data TBK ini ...?')"><i class="fa fa-eraser" title="hapus TBK"></i></button>
                                                    </form>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
               {{-- ================= --}}
            </div>
        </section>
    @else
        <div class="col-md-12">
            <section class="panel panel-horizontal">
                <header class="panel-heading bg-white">
                    <div class="panel-heading-icon bg-primary mt-sm">
                        <i class="fa fa-music"></i>
                    </div>
                </header>
                <div class="panel-body p-lg">
                    <h3 class="text-semibold mt-sm">TBK Dengan No. {{ $spj->number_spj }} Masih Kosong</h3>
                    <p>Buat TBK ....
                        <a href="{{ url('tbk/'.$spj->id.'/create') }}" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-file-text-o"></i> Buat TBK </a>
                    </p>
                </div>
            </section>
        </div>
    @endif

@stop
