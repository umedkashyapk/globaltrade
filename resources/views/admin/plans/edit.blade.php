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
                        <div class="nk-block-head-sub"><a class="back-to" href="{{url('admin/plans')}}"><em class="icon ni ni-arrow-left"></em><span>Listing</span></a></div>
                        <h2 class="nk-block-title fw-normal">Edit Plan</h2>
                      
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                   
                    <div class="card card-preview">
                        <div class="card-inner">
                            <form class="preview-block form-validate is-alter" method="post" action="{{url('admin/plans/'.$plan->id)}}" autocomplete="off">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row gy-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="plan_name">Plan Name<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="plan_name" value="{{$plan->name}}" class="form-control form-control-lg" id="plan_name" placeholder="Plan Name" required>
                                            </div>
                                            @if($errors->has('plan_name'))
                                            <p class="text-danger">{{ $errors->first('plan_name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="plan_description">Plan Description<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <textarea  name="plan_desc" class="form-control form-control-lg" id="plan_description" placeholder="Plan Description" required>{{$plan->description}}</textarea>
                                            </div>
                                            @if($errors->has('plan_desc'))
                                            <p class="text-danger">{{ $errors->first('plan_desc') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="no_of_months">No of Months<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="no_of_months" value="{{$plan->no_of_months}}" class="form-control form-control-lg" id="no_of_months" placeholder="No of Months" required>
                                            </div>
                                            @if($errors->has('no_of_months'))
                                            <p class="text-danger">{{ $errors->first('no_of_months') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="monthly_roi"> Monthly Roi<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="monthly_roi" value="{{$plan->monthly_roi}}" class="form-control form-control-lg" id="monthly_roi" placeholder="Monthly ROI" required>
                                            </div>
                                            @if($errors->has('monthly_roi'))
                                            <p class="text-danger">{{ $errors->first('monthly_roi') }}</p>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="min_joining_token">Min Joining Token<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" value="{{$plan->min_joining_token}}" name="min_joining_token" class="form-control form-control-lg" id="min_joining_token" placeholder="Min Joining Token" required>
                                            </div>
                                            @if($errors->has('min_joining_token'))
                                            <p class="text-danger">{{ $errors->first('min_joining_token') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary btn-lg">Update</button>
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