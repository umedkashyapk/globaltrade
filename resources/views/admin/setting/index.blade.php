@extends('admin.layouts.app')
@section('content')
 <!-- content @s -->
 <div class="nk-content nk-content-fluid">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
            <p class="text-success">{!! session('success') !!}</p>
      </div>
    @endif
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="components-preview wide-md mx-auto">
                <div class="nk-block-head nk-block-head-lg wide-sm">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal">Settings</h2>
                      
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                   
                    <div class="card card-preview">
                        <div class="card-inner">
                            <form class="preview-block form-validate is-alter" method="post" action="{{route('settings.store')}}" autocomplete="off">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="wallet_address">Admin Wallet Address<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="wallet_address" value="{{$addressKey->key_value??''}}" class="form-control form-control-lg" id="wallet_address" placeholder="Admin Wallet Address" Name" required>
                                            </div>
                                            @if($errors->has('private_key'))
                                            <p class="text-danger">{{ $errors->first('private_key') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="private_key">Admin Private Key<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="private_key" value="{{$privateKey->key_value??''}}" class="form-control form-control-lg" id="private_key" placeholder="Admin Private Key" Name" required>
                                            </div>
                                            @if($errors->has('private_key'))
                                            <p class="text-danger">{{ $errors->first('private_key') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="withdrawal_admin">Withdrawal Admin Charges(%)<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="withdrawal_admin" value="{{$withdrawalCharges->key_value??''}}" class="form-control form-control-lg" id="withdrawal_admin" placeholder="Withdrawal Admin Charges" Name" required>
                                            </div>
                                            @if($errors->has('withdrawal_admin'))
                                            <p class="text-danger">{{ $errors->first('withdrawal_admin') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary btn-lg">Save</button>
                                    </div>
                                </div>
                              
                            </form>
                        </div>
                    </div><!-- .card-preview -->
                    
                </div><!-- .nk-block -->
               
               
            </div><!-- .components-preview -->
        </div>
    </div>
</div>
<!-- content @e -->
           
@endsection
@section('footerScript')
@parent
  
 @endsection