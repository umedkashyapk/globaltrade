@extends('layouts.app1')
@section('content')
<  <div class="nk-block nk-block-middle nk-auth-body">
                          @include('includes.logo')

                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Register</h5>
                            <div class="nk-block-des">
                                <p>Create New Cake Verse Account</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <form  action="{{url('register')}}" method="post"  class="form-validate is-alter">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="first_name">First Name</label>
                            <div class="form-control-wrap">
                                <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control form-control-lg" id="first_name" placeholder="Enter your first name" required />
                                @if($errors->has('first_name'))
                                <p class="text-danger">{{ $errors->first('first_name') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="last_name">Last Name</label>
                            <div class="form-control-wrap">
                                <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control form-control-lg" id="last_name" placeholder="Enter your last name" required />
                                @if($errors->has('last_name'))
                                <p class="text-danger">{{ $errors->first('last_name') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="mobile_no">Mobile Number</label>
                            <div class="form-control-wrap">
                                <input type="text" name="mobile_no" value="{{old('mobile_no')}}" class="form-control form-control-lg" id="mobile_no" placeholder="Enter your mobile number" required />
                                @if($errors->has('mobile_no'))
                                <p class="text-danger">{{ $errors->first('mobile_no') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email or Username</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Enter your email address" value="{{old('email')}}" required>
                                @if($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
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
                            <label class="form-label" for="refer_by">Referred By</label>
                            <div class="form-control-wrap">
                                <input type="text" name="refer_by" value="{{$referalCode !=''?$referalCode:old('refer_by')}}" class="form-control form-control-lg" id="refer_by" placeholder="Enter your referal code" required />
                                @if($errors->has('refer_by'))
                                <p class="text-danger">{{ $errors->first('refer_by') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-control-xs custom-checkbox">
                                <input type="checkbox" name="terms_checkbox" class="custom-control-input" id="checkbox">
                                <label class="custom-control-label" for="checkbox">I agree to Cake Verse <a tabindex="-1" href="#">Privacy Policy</a> &amp; <a tabindex="-1" href="#"> Terms.</a></label>
                               
                            </div>
                            @if($errors->has('terms_checkbox'))
                            <p class="text-danger">{{ $errors->first('terms_checkbox') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block">Register</button>
                        </div>
                    </form><!-- form -->
                    <div class="form-note-s2 pt-4"> Already have an account ? <a href="{{url('/')}}"><strong>Sign in instead</strong></a>
                    </div>
                   
                </div><!-- .nk-block -->
@endsection