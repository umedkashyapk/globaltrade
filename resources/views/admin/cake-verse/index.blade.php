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
                        <h2 class="nk-block-title fw-normal">Cake Verse Price Set</h2>
                      
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                   
                    <div class="card card-preview">
                        <div class="card-inner">
                            <form class="preview-block form-validate is-alter" method="post" action="{{route('cake-verse.store')}}" autocomplete="off">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="wallet_address">Cake Verse Price<span class="text-danger"> *</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="cake_verse_price" value="{{$cakeVersePrice->key_value??''}}" class="form-control form-control-lg" id="wallet_address" placeholder="Cake Verse Price"  required>
                                            </div>
                                            @if($errors->has('cake_verse_price'))
                                            <p class="text-danger">{{ $errors->first('cake_verse_price') }}</p>
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