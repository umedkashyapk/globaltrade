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
        <input type="text" name="email_token" value="{{$tkn}}" />
        <div class="form-group">
            <label class="form-label" for="password">Passcode</label>
            <div class="form-control-wrap">
                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode" required />
                @if($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="password">Confirm Passcode</label>
            <div class="form-control-wrap">
                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="confirm_password">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input type="password" name="confirm_password" class="form-control form-control-lg" id="confirm_password" placeholder="Enter your passcode" required />
                @if($errors->has('confirm_password'))
                <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block"> Reset Password</button>
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
   
                   
                </div><!-- .nk-block -->
@endsection