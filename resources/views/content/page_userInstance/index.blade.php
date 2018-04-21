@extends('master')

@section('judul_bar', 'Buat Akun')

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
													<div class="info">
														<strong class="amount">1281</strong>
														<span class="text-primary">(14 unread)</span>
													</div>
												</div>
												<div class="summary-footer">
													<a class="text-muted text-uppercase">(view all)</a>
												</div>
											</div>
										</div>
									</div>
		</section>
    @endif
    <div class="col-md-12 col-xl-3">
        <a href="{{ url('newAccount') }}" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-user"></i> Akun Baru</a>
    </div>


    @if(count($data_userinstansi) > 0)
        @foreach($data_userinstansi as $userInstansi)
        <div class="col-md-3 col-xl-6">
            <section class="panel">
                <header class="panel-heading bg-tertiary">
                    <div class="panel-heading-profile-picture">
                        <img src="{{ asset('ManagementUserPhoto/'.$userInstansi->photo) }}">
                    </div>
                </header>
                <div class="panel-body">
                    <h4 class="text-semibold mt-sm">{{ $userInstansi->name }}</h4>
                    <p> Username :{{ $userInstansi->username }}</p>
                    <hr class="solid short">
                    @if($userInstansi->user_id == Session::get('user_id'))
                    <p><a href="{{ url('newAccount/'.$userInstansi->id.'/edit') }}" class="mb-xs mt-xs mr-xs modal-basic btn btn-warning"><i class="fa fa-user mr-xs"></i> Ubah Akun</a></p>
                    <p>
                        <form action="{{ url('newAccount/'.$userInstansi->id.'/delete') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="foto" value="{{ $userInstansi->photo }}">
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="mb-xs mt-xs mr-xs modal-basic btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus Akun ini..?')"><i class="fa fa-lock mr-xs"></i> Hapus Akun</button>
                        </form>
                    </p>
                    @endif
                </div>
            </section>
        </div>
        @endforeach
    @else
        <section class="panel panel-horizontal">
            <header class="panel-heading bg-white">
                <div class="panel-heading-icon bg-primary mt-sm">
                    <i class="fa fa-music"></i>
                </div>
            </header>
            <div class="panel-body p-lg">
                <h3 class="text-semibold mt-sm">Belum Ada Akun yang pernah dibuat</h3>
                <p>Buat Akun untuk bisa memberi hak akses kepada pengguna lain</p>
            </div>
        </section>
    @endif
@stop