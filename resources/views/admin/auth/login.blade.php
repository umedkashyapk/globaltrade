@extends('admin.layouts.app1')
@section('content')
<div class="nk-block nk-block-middle nk-auth-body  wide-xs">
<div class="brand-logo pb-4 text-center">
                            <a href="{{url('/')}}" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{asset('images/logo-cake.png')}}" srcset="{{asset('images/logo-cake.png')}} 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="{{asset('images/logo-cake.png')}}" srcset="{{asset('images/logo-cake.png')}} 2x" alt="logo-dark">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Sign-In</h4>
                                        <div class="nk-block-des">
                                            <p>Access the Cake Verse panel using your email and passcode.</p>
                                        </div>
                                    </div>
                                </div>
                                @if (\Session::has('error'))
                <div class="alert alert-danger" role="alert">
                        <p class="text-danger">{!! \Session::get('error') !!}</p>
                  </div>
                @endif
                                <form id="loginForm" action="{{url('admin/check-user')}}" method="post" class="form-validate is-alter" autocomplete="off">
                                @csrf    
                                <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" name="email"  value="{{old('email')}}"  class="form-control form-control-lg" id="default-01" placeholder="Enter your email address" required>
                                            @if($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Passcode</label>
                                            <a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot Code?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password"  name="password"  class="form-control form-control-lg" id="password" placeholder="Enter your passcode" required>
                                            @if($errors->has('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary  submit-btn btn-block">
                                            Sign in
                                            <div class="loader-class ml-2"></div>
                                        </button>
                                    </div>
                                </form>

                        
                            </div>
                        </div>
                    </div>
@endsection
@section('footerScript')
@parent

       <script>
      
         $(document).on('submit','#loginForm',function(e){
            $(".loader-class").html(`<div class="spinner-grow spinner-grow-sm text-white" role="status"></div>`);
            $(".submit-btn").attr("disabled",true);

         });
        </script>

 @endsection