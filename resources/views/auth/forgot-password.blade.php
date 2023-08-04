@extends('layouts.app1')
@section('content')
<div class="nk-block nk-block-middle nk-auth-body">
     @include('includes.logo')
                   
     <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Reset password</h5>
            <div class="nk-block-des">
                <p>If you forgot your password, well, then we’ll email you instructions to reset your password.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    
    <form  method="post"  class="form-validate is-alter" autocomplete="off">
        @csrf
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="default-01">Email</label>
                {{-- <a class="link link-primary link-sm" href="#">Need Help?</a> --}}
            </div>
            <div class="form-control-wrap">
                <input type="text" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address" name="email" required>
                @if($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
              @endif
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block">Send Reset Link</button>
        </div>
    </form><!-- form -->
    @if (\Session::has('error'))
    <div class="text-danger mt-2">
          <p class="text-danger">{!! \Session::get('error') !!}</p>
    </div>
  @endif

  @if (\Session::has('success'))
    <div class="text-success mt-2">
          <p class="text-success">{!! \Session::get('success') !!}</p>
    </div>
  @endif
    <div class="form-note-s2 pt-3">
        <a href="{{route('login')}}"><strong>Return to login</strong></a>
    </div>
                   
                </div><!-- .nk-block -->
@endsection