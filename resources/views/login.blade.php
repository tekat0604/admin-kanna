
@extends('part.layout')
@section('content')   
   <div class="container">
        <!-- Outer Row -->
        <div class="box-tengah">
                <div class="animate__animated animate__fadeInDown card o-hidden border-0 bg-white shadow-lg my-5">
                    <div class="card-body p-0 login-card">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="text-gray-900 "> Log in.</h1>
                                        <p class="mb-4"> Pagiku cerah matahari di barat</p>
                                    </div>
                                    <div class="mb-4 user">
                                        <div id="loading" class="text-center">
                                            @if(session('error'))
                                                <div class="alert alert-block alert-danger">{{session('error')}}</div>
                                            @endif
                                        </div>
                                        <form name="validasi_form" method="post" action="{{ route('actionlogin') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label mb-1">Username</label>
                                                <input name="username" type="text" class="form-login" required="true">
                                            </div>
                                            <div class="mb-4">
                                                <label class="control-label mb-1">Password</label>
                                                <div class="input-group">
                                                    <input type="password" name="password"  class="form-login" style="border-right:none !important;" data-toggle="password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" style="border-left:none !important; background:none !important;">
                                                            <i class="fa fa-eye"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-login btn-user btn-block">
                                                Login
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection