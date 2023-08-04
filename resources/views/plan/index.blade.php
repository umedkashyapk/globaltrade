@extends('layouts.app')
@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
                                <div class="nk-content-wrap">
                                    <div class="nk-block-head nk-block-head-lg wide-md">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-head-sub"><span>Pricing</span></div>
                                            <h2 class="nk-block-title fw-normal">Choose Suitable Plan</h2>
                                            <div class="nk-block-des">
                                                <p class="lead">You can change your plan any time by upgrade your plan.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block" >
                                        <div class="row g-gs">
                                            @foreach($plans as $plan)
                                            <div class="col-md-4">
                                                <div class="price-plan card card-bordered text-center">
                                                    <div class="card-inner">
                                                        <div class="price-plan-media">
                                                            <img src='{{asset("/images/icons/plan-s1.svg")}}' alt="">
                                                        </div>
                                                        <div class="price-plan-info">
                                                            <h5 class="title">{{$plan->name}}</h5>
                                                            <span>{{$plan->description}}</span>
                                                        </div>
                                                        <div class="price-plan-amount">
                                                            <div class="amount">{{$plan->monthly_roi}} <span>%</span></div>
                                                            {{-- <span class="bill">1 User, Billed Yearly</span> --}}
                                                        </div>
                                                        <div class="price-plan-action">
                                                            <a href="#" onClick="openPlanPopup({{$plan}})"data-toggle="modal" data-target="#buy-coin" class="btn btn-primary">Select Plan</a>
                                                        </div>
                                                    </div>
                                                </div><!-- .price-item -->
                                            </div><!-- .col -->
                                            @endforeach
                                          
                                        </div><!-- .row -->
                                        
                                    </div><!-- .nk-block -->
                                   
                                   
                                </div>
        </div>
    </div>
</div>
                              
        <!-- @@ Buy Coin Modal @e -->
    <div class="modal fade" tabindex="-1" role="dialog" id="buy-coin">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <div class="nk-block-head nk-block-head-xs text-center">
                        <h5 class="nk-block-title plan-title">Purchase Plan</h5>
                        <div class="nk-block-text">
                            <div class="caption-text description-sub"></div>
                            {{-- <span class="sub-text-sm">Exchange rate: 1 BTC = 9,804.00 USD</span> --}}
                        </div>
                    </div>
                    <form>
                    <input type="hidden" name="plan_id" id="planIdField" placeholder="10">
                    <div class="nk-block">                    
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="buysell-amount">Enter Usd value </label>
                            </div>
                            <div class="form-control-group">
                                <input type="text" class="form-control form-control-lg form-control-number" id="cakeValue" name="bs-amount" placeholder="Enter value in  USDT to purchse cake verse">
                               
                            </div> 
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt">Minimum: 10 Cakes</span>
                                <span class="buysell-rate form-note-alt"></span>
                            </div>
                        </div>
                        
                        <div class="buysell-field form-action text-center">
                            <div>
                                <button id="purchase-plan-button" class="btn btn-primary btn-lg ">Purchase</button>
                            </div>
                            <div class="pt-3">
                                <a href="#" data-dismiss="modal" class="link link-danger">Cancel</a>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </form>
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->      
    
     <!-- @@ Confirm Coin Modal @e -->
     <div class="modal fade" tabindex="-1" role="dialog" id="confirm-coin">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Successfully sent payment!</h4>
                        <div class="nk-modal-text">
                            <p class="caption-text"></p>
                            {{-- <p class="sub-text-sm">Learn when you reciveve bitcoin in your wallet. <a href="#"> Click here</a></p> --}}
                        </div>
                        <div class="nk-modal-action-lg">
                            <ul class="btn-group gx-4">
                                <li><a href="{{url('/dashboard')}}"  class="btn btn-lg btn-mw btn-primary">Return</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .modal-body -->
                {{-- <div class="modal-footer bg-lighter">
                    <div class="text-center w-100">
                        <p>Earn upto $25 for each friend your refer! <a href="#">Invite friends</a></p>
                    </div>
                </div> --}}
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
           
      <!-- @@ Failed Coin Modal @e -->
      <div class="modal fade" tabindex="-1" role="dialog" id="failed-coin">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                        <h4 class="nk-modal-title">Error In Plan Subscription!</h4>
                        <div class="nk-modal-text">
                            <p class="caption-text"></p>
                            {{-- <p class="sub-text-sm">Learn when you reciveve bitcoin in your wallet. <a href="#"> Click here</a></p> --}}
                        </div>
                        <div class="nk-modal-action-lg">
                            <ul class="btn-group gx-4">
                                <li><a href="#" data-dismiss="modal" class="btn btn-lg btn-mw btn-primary">Return</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .modal-body -->
                {{-- <div class="modal-footer bg-lighter">
                    <div class="text-center w-100">
                        <p>Earn upto $25 for each friend your refer! <a href="#">Invite friends</a></p>
                    </div>
                </div> --}}
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
@endsection

@section('footerScript')
@parent
<script>
    function openPlanPopup(planInfo){
        let cvPrice="{{$cakeVersePrice->key_value}}";
        let oneUsdToCv=1/cvPrice;
        console.log(planInfo.name);
        $(".plan-title").text(planInfo.name+"");
        $(".description-sub").text(planInfo.description+"");
        $('input[name="plan_id"]').val(planInfo.id);
        $(".buysell-min").text("Min joining:"+planInfo.min_joining_token+" USDT")
        $(".buysell-rate").text("1 USDT ="+oneUsdToCv+" CV");
        $('#buy-coin').modal('show'); 

    }
    $(document).on('click','#purchase-plan-button',function(e){
        e.preventDefault();
    let planIdField=$("#planIdField").val();
    let cakeValue=$("#cakeValue").val();
  
$.ajax({
url: "{{url('plan')}}",
type: 'post',
dataType: 'json',
data: {
plan_id: planIdField , total_cake : cakeValue, _token: "{{ csrf_token() }}",
}, 
success: function (msg) {
    $('#buy-coin').modal('hide'); 
    $("#confirm-coin .caption-text").html(`You’ve successfully purchase the plan`)
    $('#confirm-coin').modal('show'); 
    // payButton.attr('disabled',false);
    // payButton.html(`Continue to Buy`);
    // $('#buyForm').trigger("reset");

// window.location.href = 'https://www.tutsmake.com/Demos/php/razorpay/success.php';
},
error: function (request, status, error) {
    console.log(request.responseJSON.message,status,error);
    $('#failed-coin').modal('show'); 
    $("#failed-coin .caption-text").html(request?.responseJSON?.message ||`If your cakes are deduction from your account. Please contact with support team`);
 
    }
});

});
</script>
@endsection
