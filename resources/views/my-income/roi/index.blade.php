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
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between g-3">
                                <div class="nk-block-head-content">
                                     <p class="text-danger">You can withdraw Roi income in first 7 days of month</p>
                                    <h3 class="nk-block-title page-title">Weekly Bonus List</h3>
                                    <div class="nk-block-des text-soft">
                                        <p>Total {{ $roiLog->total() }} Rows.</p>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                   
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                        </div><!-- .nk-block-head -->
                        @if($roiLog->count()>0)
                           @include('my-income.roi.wallet')  
                        @endif
                        <div class="nk-block mt-5">
                                @if($roiLog->count()>0)
                             <div class="card card-bordered card-stretch">

                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h5 class="title">All Weekly Bonus</h5>
                                            </div>
                                            <div class="card-tools mr-n1">
                                                <ul class="btn-toolbar">
                                                    <li>
                                                        <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                                    </li><!-- li -->
                                                    <li class="btn-toolbar-sep"></li><!-- li -->
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                <em class="icon ni ni-setting"></em>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                <ul class="link-check">
                                                                    <li><span>Show</span></li>
                                                                    <li class="active"><a href="#">10</a></li>
                                                                    <li><a href="#">20</a></li>
                                                                    <li><a href="#">50</a></li>
                                                                </ul>
                                                                <ul class="link-check">
                                                                    <li><span>Order</span></li>
                                                                    <li class="active"><a href="#">DESC</a></li>
                                                                    <li><a href="#">ASC</a></li>
                                                                </ul>
                                                                <ul class="link-check">
                                                                    <li><span>Density</span></li>
                                                                    <li class="active"><a href="#">Regular</a></li>
                                                                    <li><a href="#">Compact</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .dropdown -->
                                                    </li><!-- li -->
                                                </ul><!-- .btn-toolbar -->
                                            </div><!-- card-tools -->
                                            <div class="card-search search-wrap" data-search="search">
                                                <div class="search-content">
                                                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                    <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by order id">
                                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                                </div>
                                            </div><!-- card-search -->
                                        </div><!-- .card-title-group -->
                                    </div><!-- .card-inner -->
                                    <div class="card-inner p-0">
                                        <table class="table table-tranx">
                                            <thead>
                                                <tr class="tb-tnx-head">
                                                    <th class="tb-tnx-id"><span class="">#</span></th>
                                                    <th class="tb-tnx-info">
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <span> Amount</span>
                                                        </span>
                                                       
                                                    </th>
                                                    <th class="tb-tnx-amount is-alt">
                                                        <span class="tb-tnx-total">Roi Date</span>
                                                    </th>
                                                  
                                            </thead>
                                            <tbody>
                                                @foreach ($roiLog as $key=>$roi)

                                                <tr class="tb-tnx-item">
                                                    <td class="tb-tnx-id">
                                                        <a href="#"><span>{{$roi->id}}</span></a>
                                                    </td>
                                                    <td class="tb-tnx-info">
                                                        <div class="tb-tnx-desc">
                                                            <span class="title">{{$roi->amount}}</span>
                                                        </div>
                                                       
                                                    </td>
                                                    <td class="tb-tnx-amount is-alt">
                                                        <div class="tb-tnx-total">
                                                            {{$roi->roi_date->format('Y-m-d')}}
                                                        </div>
                                                       
                                                    </td>
                                                  
                                                </tr><!-- tb-tnx-item -->
                                                @endforeach

                                                
                                            </tbody>
                                        </table>
                                    </div><!-- .card-inner -->
                                    @if($roiLog->hasPages())
                                    <div class="card-inner">
                                        {{ $roiLog->withQueryString()->links('pagination::bootstrap-4') }}
                                    
                                    </div><!-- .card-inner -->
                                    @endif
                                   
                                </div><!-- .card-inner-group -->
                                 </div><!-- .card -->
                                @else
                                 <div class="card  card-stretch">

                                <div class="card-inner-group text-center">
                                  <img style="width:500px;margin:auto;" src="{{asset('assets/images/undraw_not_found_-60-pq.svg')}}" />
                              </div>
                          </div>
                                @endif
                           
                        </div><!-- .nk-block -->
                    </div>
                </div>
            </div>
            <!-- content @e -->
           

        <!-- @@ Buy Coin Modal @e -->
    <div class="modal fade" tabindex="-1" role="dialog" id="buy-coin">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <div class="nk-block-head nk-block-head-xs text-center">
                        <h5 class="nk-block-title plan-title">Withdrawal ROI Income</h5>
                        <div class="nk-block-text">
                            <div class="caption-text description-sub">Total Token in your wallet 
                                @if(!is_null($loggedInUser->walletInfo))
                                {{$loggedInUser->walletInfo->non_working_income ?number_format($loggedInUser->walletInfo->non_working_income,2): 0}}
                                @else
                                0
                                @endif
                            </div>
                            {{-- <span class="sub-text-sm">Exchange rate: 1 BTC = 9,804.00 USD</span> --}}
                        </div>
                    </div>
                    <form>
                    <input type="hidden" name="plan_id" id="planIdField" placeholder="10">
                    <div class="nk-block">
                        <div class="bJJJ form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="withdrawal_in">Withdrawal In</label>
                            </div>
                            <div class="form-control-group">
                                <select name="wi" class="form-control form-control-lg " id="withdrawal_in">
                                    <option value="CV">Cake Verse</option>
                                    <option value="USDT">USDT</option>
                                </select>
                               
                            </div>
                        </div>
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="buysell-amount"> Withdrawal Cake Verse Quantity </label>
                            </div>
                            <div class="form-control-group">
                                <input type="text" class="form-control form-control-lg form-control-number" id="cakeValue" name="bs-amount" placeholder="10">
                               
                            </div>
                            <div class="form-note-group">
                                {{-- <span class="buysell-min form-note-alt">Minimum: 10 Cakes</span> --}}
                                {{-- <span class="buysell-rate form-note-alt">1 USD = 0.000016 BTC</span> --}}
                            </div>
                        </div>
                        
                        <div class="buysell-field form-action text-center">
                            <div>
                                <button id="withdraw-button" class="btn btn-primary btn-lg ">Withdraw</button>
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
                        <h4 class="nk-modal-title"></h4>
                        <div class="nk-modal-text">
                            <p class="caption-text"></p>
                           
                        </div>
                        <div class="nk-modal-action-lg">
                            <ul class="btn-group gx-4">
                                <li><a href="{{route('withdrawal-history.index')}}"  class="btn btn-lg btn-mw btn-primary">Return</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .modal-body -->
                
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
                        <h4 class="nk-modal-title">Error!</h4>
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
    function openPopup(){
        $('input[name="plan_id"]').val();
        $('#buy-coin').modal('show'); 

    }
    $(document).on('click','#withdraw-button',function(e){
        e.preventDefault();
    let cakeValue=$("#cakeValue").val();
    let wi=$("#withdrawal_in").val()
  
$.ajax({
url: "{{route('roi.store')}}",
type: 'post',
dataType: 'json',
data: {
total_cake : cakeValue,wi:wi, _token: "{{ csrf_token() }}",
}, 
success: function (msg) {
    $('#buy-coin').modal('hide'); 
    $("#confirm-coin .nk-modal-title").html(`Token Withdrawal request send to Admin`)
    $('#confirm-coin').modal('show'); 


},
error: function (request, status, error) {
//     console.log(request.responseJSON.message,status,error);
    $('#failed-coin').modal('show'); 
    $("#failed-coin .caption-text").html(request?.responseJSON?.message ||`Error in Api`);
 
    }
});

});
</script>
 @endsection