@extends('backdoor.part.layout')
@section('content')
@include('backdoor.part.header')

<div class="container-fluid">
<!-- Content Row -->
    <div class="row"> 
        <div class="col-md-12 mb-4">
            <div class="card bg-gray-100">
                <div class="card-header rata-kiri">
                    <div class="icon-header bg-kanna mr-3">
                        <i class="fas fa-pencil fa-2x text-white"></i>
                    </div>
                    <h5 class="mb-2"><b>Tambah Akun Admin</b></h5>
                </div>
                <div class="card-body px-5">
                    <form  id="passwordForm" method="post" action="{{ route('agent.user.store') }}" enctype='multipart/form-data'>
                    <div class="row pb-4">
                        <div class="col-lg-6 px-3">
                            <h5 class="mb-4">Data Akun</h5>
                                @csrf
                                <div class="form-group">
                                    <label class="control-label mb-1">Nama Lengkap</label>
                                    <input name="name" type="text" class="form-control" required="true">
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Email</label>
                                    <input name="email" id="email" type="text" class="form-control" oninput="validatePassword()" required="true">
                                    <small id="emailMessage" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Role</label>
                                    <select name="role" class="form-control">
                                            <option value="1">Superadmin</option>
                                            <option selected value="2">Admin</option>
                                    </select>
                                </div> 
                        </div>
                        <div class="col-lg-6 px-3">
                            <h5 class="mb-4">Ubah Password Akun</h5>
                                <div>
                                    <label class="control-label mb-1">Input Password</label>
                                    <div class="input-group">
                                        <input type="password" min="8" name="password" id="password" oninput="validatePassword()" class="form-control" style="border-right:none !important;" data-toggle="password" required="true">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="border:none !important;">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <small id="passwordMessage" class="text-danger"></small>
                                </div>
                                <div class="mb-4">
                                    <label class="control-label mb-1 mt-3">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <input type="password" min="8" name="confirmPassword" id="confirmPassword" oninput="validatePassword()" class="form-control" style="border-right:none !important;" data-toggle="password" required="true">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="border:none !important;">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <small id="confirmMessage" class="text-danger"></small>
                                </div>
                                    
                        </div>
                        <div class="col-lg-12 px-3 mt-4">
                            <a class="btn btn-secondary mr-2" type="button" href="{{ route('agent.user.index')}}">Kembali</a>
                            <button type="submit" id="submitButton" class="btn btn-success">Simpan</button>  
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection