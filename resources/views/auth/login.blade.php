@extends('layouts.app1')
@section('content')
<div class="nk-block nk-block-middle nk-auth-body">
     @include('includes.logo')
                   
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Sign-In</h5>
                            <div class="nk-block-des">
                                <p>Access the Global Trade panel using your email and passcode.</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    @if (\Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                            <p class="text-danger">{!! \Session::get('error') !!}</p>
                      </div>
                    @endif
                    <form action="{{url('check-user')}}" method="post" class="form-validate is-alter" autocomplete="off">
                        @csrf

                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="email-address">Email </label>
                                {{-- <a class="link link-primary link-sm" tabindex="-1" href="#">Need Help?</a> --}}
                            </div>
                            <div class="form-control-wrap">
                                <input autocomplete="off" type="text" name="email"  value="{{old('email')}}" class="form-control form-control-lg" required id="email-address" placeholder="Enter your email address">
                                @if($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="password">Passcode</label>
                                <a class="link link-primary link-sm" tabindex="-1" href="{{route('forgot-password')}}">Forgot Code?</a>
                            </div>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input autocomplete="new-password" name="password" type="password" class="form-control form-control-lg" required id="password" placeholder="Enter your passcode">
                                @if($errors->has('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                        </div>
                    </form><!-- form -->
                    <div class="form-note-s2 pt-4"> New on our platform? <a href="{{url('register')}}">Create an account</a>
                    </div>
                   
                </div><!-- .nk-block -->
@endsection