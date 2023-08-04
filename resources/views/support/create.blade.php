@extends('layouts.app')
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
                        <h2 class="nk-block-title fw-normal">Create Ticket</h2>
                      
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                   
                    <div class="card card-preview">
                        <div class="card-inner">
                            <form class="preview-block form-validate is-alter" method="post" action="{{route('support.store')}}" autocomplete="off">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Title<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="title" value="" class="form-control form-control-lg" id="title" placeholder="Title"  required>
                                            </div>
                                            @if($errors->has('title'))
                                            <p class="text-danger">{{ $errors->first('title') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="message">Message<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <textarea name="message" class="form-control form-control-lg" id="message" placeholder="Message"  required></textarea>
                                            </div>
                                            @if($errors->has('message'))
                                            <p class="text-danger">{{ $errors->first('message') }}</p>
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