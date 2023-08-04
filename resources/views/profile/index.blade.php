@extends('layouts.app')
@section('content')
 <!-- content @s -->
 <div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><span>Account Setting</span></div>
                    <h2 class="nk-block-title fw-normal">My Profile</h2>
                    <div class="nk-block-des">
                        <p>You have full control to manage your own account setting. <span class="text-primary"><em class="icon ni ni-info" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></em></span></p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <ul class="nk-nav nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('profile')}}">Personal</a>
                </li>
               
            </ul><!-- .nk-menu -->
            <!-- NK-Block @s -->
            <div class="nk-block">
                
                
                @include('profile.profile')  
            </div>
            <!-- NK-Block @e -->
            <!-- //  Content End -->
        </div>
    </div>
</div>
<!-- content @e -->
 <!-- @@ Profile Edit Modal @e -->
 <div class="modal fade" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
                    </li>
                   <!--  <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#address">Address</a>
                    </li> -->
                </ul><!-- .nav-tabs -->
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <form id="updatePersonalProfile" class="form-validate is-alter" method="post" action="{{url('profile')}}"  >
                            @csrf
                            <input type="hidden" name="save-type" value="P" required/> 
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="first-name">First Name</label>
                                    <input type="text" name="first-name" class="form-control form-control-lg" id="first-name" value="{{$loggedInUser->first_name}}" placeholder="Enter First name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="last-name">Last Name</label>
                                    <input type="text" name="last-name" class="form-control form-control-lg" id="lasst-name" value="{{$loggedInUser->last_name}}" placeholder="Enter Last name" required>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="phone-no">Phone Number</label>
                                    <input type="text" name="mobile" class="form-control form-control-lg" id="phone-no" value="{{$loggedInUser->mobile_number}}" placeholder="Phone Number" required>
                                </div>
                            </div>
                            
                            
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button type="submit" class="btn btn-lg btn-primary">Update Profile</button>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                    </div><!-- .tab-pane -->
                   
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->

@endsection
@section('footerScript')
@parent
<script>
    /**
    Person Profile Api Call Hanlder
    */
        $(document).on("submit","#updatePersonalProfile",function(e){
            e.preventDefault();
            $.ajax({
            type: $(this).attr('method'),
            url:$(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                swal({
                title: "Success",
                text: data?.success|| "Information Updated successfully successfully",
                icon: "success",
            }).then(function(){ 
                location.reload();
                }
                );
            },
            error: function (data) {
                swal({
                title: "Error!",
                text: data?.error|| "Error in Saving data",
                icon: "error",
            });
            },
        });
        });
    


</script>    
 @endsection