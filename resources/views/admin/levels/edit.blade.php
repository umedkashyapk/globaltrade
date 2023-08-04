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
                        <div class="nk-block-head-sub"><a class="back-to" href="{{url('admin/levels')}}"><em class="icon ni ni-arrow-left"></em><span>Listing</span></a></div>
                        <h2 class="nk-block-title fw-normal">Edit Level</h2>
                      
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                   
                    <div class="card card-preview">
                        <div class="card-inner">
                            <form class="preview-block form-validate is-alter" method="post" action="{{url('admin/levels/'.$level->id)}}" autocomplete="off">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row gy-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Name<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="name" value="{{$level->name}}" class="form-control form-control-lg" id="name" placeholder="level Name" required>
                                            </div>
                                            @if($errors->has('name'))
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="percentage">Percentage<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="percentage" value="{{$level->percentage}}" class="form-control form-control-lg" id="percentage" placeholder="Percentage" required>
                                            </div>
                                            @if($errors->has('percentage'))
                                            <p class="text-danger">{{ $errors->first('percentage') }}</p>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="level_no">Level No<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" value="{{$level->level_no}}" name="level_no" class="form-control form-control-lg" id="level_no" placeholder="Level No" readonly required>
                                            </div>
                                            @if($errors->has('level_no'))
                                            <p class="text-danger">{{ $errors->first('level_no') }}</p>
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