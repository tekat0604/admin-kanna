@extends('backdoor.part.layout')
@section('content')
@include('backdoor.part.header')
<div class="container-fluid">
    <!-- Content Row -->
        <div class="row animate__animated animate__bounceInLeft ">
            <div class="col-md-4 mb-4">
                <div class="card bg-gray-100">
                    <div class="card-body">
                        <div class="rata job job-list-light mb-3 pb-2">
                            @if ($user->gambar == '')
                                <div id='targetLayer' class='mr-3 img-profil rounded-circle' style='background:url({{ asset('admin/img/default.png')}}) center no-repeat; background-size:cover'>
                             @else
                                <div id='targetLayer' class='mr-3 img-profil rounded-circle' style='background:url({{ asset('admin/img/'.$user->gambar) }}) center no-repeat; background-size:cover'>
                             @endif
                                <div class="icon-foto rounded-circle bg-kanna p-2 fileUpload animated--grow-in show">
                                    <i style="font-size:1.5rem;" class="fas fa-camera 2x text-white"></i>
                                    <form method="post" action="{{ route('agent.edit-gambar',['user' => $user->id]) }}" enctype='multipart/form-data' name="validasi_form">
                                        @csrf
                                        @method('PUT')
                                        <input name="gambar" onchange="this.form.submit()" class="upload" type="file" >
                                    </form>
                                </div>
                            </div>
                            <div class="text-right">
                                <badge class="badge badge-primary" style="ffont-size: 11px;font-weight: 500;">
                                    @if($user->role == 1)
                                        Superadmin
                                    @else
                                        Admin
                                    @endif
                                </badge>
                                <h3 class="m-0 font-weight-bold">{{ $user->name }}</h3>
                                <p class="m-0">{{ $user->email }}</p>
                                <div>
                                    <a href="{{ route('agent.user.show',['user' => $user->id]) }}" class="btn btn-kanna mt-3">Ubah Profilku</a>
                                </div>
                            </div>
                        </div>
                        @if ( $user->role == 1)                 
                            <div class="rata">
                                <div>
                                    <p class="text-xs m-0">Jumlah Admin</p>
                                    <h2 class="m-0 font-weight-bold">{{ $j_user }}</h2>
                                </div>
                                <a href="{{ route('agent.user.create') }}" type="button" class="tambah-button bg-kanna shadow">
                                    <i class="fas fa-plus fa-2x text-white"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="card bg-gray-100">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <div class="icon-header bg-kanna">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <h6 class="m-0 font-weight-bold ">Akun Admin Lainnya</h6>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tabel_sementara" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>role</th>
                                        @if ( $user->role == 1) 
                                        <th class="text-center"><i class="fa fa-cog"></i></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i = 0 @endphp
                                @foreach($s_user as $su)
                                    @if ($su->id !== Auth::user()->id)
                                    @php $i++ @endphp
                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td>{{ $su->name }}</td>
                                        <td>{{ $su->email}}</td>
                                        <td>
                                            @if ( $su->role == 1)
                                                Superadmin
                                            @else
                                                Admin
                                            @endif

                                        </td>
                                        @if ( $user->role == 1) 
                                            <td class="rata-tengah">
                                                <a href="{{ route('agent.user.show',['user' => $su->id]) }}">
                                                    <div class="icon-circle bg-danger mr-2">
                                                        <i class="fas fa-pencil text-white"></i>
                                                    </div>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#hapus-item{{ $su->id }}">
                                                    <div class="icon-circle bg-danger">
                                                        <i class="fas fa-trash text-white"></i>
                                                    </div>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    @foreach ($s_user as $su)
    @if ($su->id !== Auth::user()->id)
    <!-- modal hapus admin -->
    <div class="modal fade" id="hapus-item{{ $su->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Dihapus?</h5>
                    <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body mb-3">Menghapus data admin <strong>{{ $su->name}}</strong></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <form action="{{ route('agent.user.destroy', $su->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal hapus admin -->
    @endif
    @endforeach

@endsection