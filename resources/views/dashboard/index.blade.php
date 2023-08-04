@extends('layouts.app')
@section('content')
       
            
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Investment Dashboard</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>Welcome to Cake Verse Dashboard</p>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li><a href="javascript:void(0)" class="btn btn-white btn-dim btn-outline-primary" data-toggle="modal" data-target="#buy-coin"><span>Wallet Address </span><em class="icon ni ni-wallet"></em></a></li>                                                   
                                                    <li><a href="https://wa.me?text={{url('/register?token='.$loggedInUser->referral_code)}}" class="btn btn-white btn-dim btn-outline-primary" target="_blank"><span>Send Referal Link </span><em class="icon ni ni-share"></em></a></li>                                                   
                                                </ul>
                                            </div><!-- .toggle-expand-content -->
                                        </div><!-- .toggle-wrap -->
                                    </div>
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                              @include('dashboard.pricecard')  

                                <div class="row g-gs">
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="nk-block">
                                            <div class="nk-block-head-xs" style="visibility:hidden">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Overview</h5>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="nk-block">
                                                <div class="card card-bordered text-light is-dark h-100">
                                                    <div class="card-inner">
                                                        <div class="nk-wg7">
                                                            <div class="nk-wg7-stats">
                                                                <div class="nk-wg7-title">Available balance in Cake Verse</div>
                                                                <div class="number-lg amount">{{ UserManager::getCakePrice($walletBalance['data']['data'])}} </div>
                                                            </div>
                                                            <div class="nk-wg7-stats-group" >
                                                                <div class="nk-wg7-stats w-100">
                                                                    {{-- <div class="nk-wg7-title">USD</div> --}}
                                                                    <div class="nk-wg7-title">1 USDT ={{ 1/$cakeVersePrice->key_value}} <span class="currency currency-usd">CAKE VERSE</span></div>
                                                                </div>
                                                                {{-- <div class="nk-wg7-stats w-50" style="visibility:hidden">
                                                                    <div class="nk-wg7-title">Transactions</div>
                                                                    <div class="number">0</div>
                                                                </div> --}}
                                                            </div>
                                                            <div class="nk-wg7-foot">
                                                                <span class="nk-wg7-note">Last activity at <span>{{UserManager::utcToIst($lastActive->created_at)??'-'}}</span></span>
                                                            </div>
                                                        </div><!-- .nk-wg7 -->
                                                    </div><!-- .card-inner -->
                                                </div><!-- .card -->
                                            </div><!-- .nk-block -->
                                        </div><!-- .nk-block -->
                                    </div>
                                    @if(!is_null($loggedInUser->walletInfo))
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="nk-block">
                                            <div class="nk-block-head-xs">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title" style="visibility:hidden">Overview</h5>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="nk-block">
                                                <div class="card card-bordered  h-100">
                                                    <div class="card-inner">
                                                        <div class="nk-wg7">
                                                            <div class="nk-wg7-stats">
                                                                <div class="nk-wg7-title">Total Working Income</div>
                                                                <div class="number-lg amount">{{number_format($loggedInUser->walletInfo->working_income,2)}} CV</div>
                                                            </div>
                                                            <div class="nk-wg7-stats-group">
                                                                <div class="nk-wg7-stats w-50">
                                                                    <div class="nk-wg7-title">This Month</div>
                                                                    <div class="number">0</div>
                                                                </div>
                                                                <div class="nk-wg7-stats w-50">
                                                                    <div class="nk-wg7-title">This Week</div>
                                                                    <div class="number">0</div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-wg7-foot" style="visibility:hidden">
                                                                <span class="nk-wg7-note">Last activity at <span>19 Nov, 2019</span></span>
                                                            </div>
                                                        </div><!-- .nk-wg7 -->
                                                    </div><!-- .card-inner -->
                                                </div><!-- .card -->
                                            </div><!-- .nk-block -->
                                        </div><!-- .nk-block -->
                                    </div>
                                    
                                    @endif
                                    @if(!is_null($currentPackage))
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="nk-block">
                                            <div class="nk-block-head-xs">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title" style="visibility:hidden">Overview</h5>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="nk-block">
                                                <div class="card card-bordered  h-100">
                                                    <div class="card-inner">
                                                        <div class="nk-wg7">
                                                            <div class="nk-wg7-stats">
                                                                <div class="nk-wg7-title">Total ROI</div>
                                                                <div class="number-lg amount">{{number_format($loggedInUser->walletInfo->non_working_income,2)}} CV</div>
                                                            </div>
                                                            <div class="nk-wg7-stats-group">
                                                                <div class="nk-wg7-stats w-50">
                                                                    <div class="nk-wg7-title">Current Package</div>
                                                                    <div class="number">{{$currentPackage->planInfo->name}}</div>
                                                                </div>
                                                                <div class="nk-wg7-stats w-50">
                                                                    <div class="nk-wg7-title">Expired</div>
                                                                    <div class="number">{{$currentPackage->expire_date->format('Y-m-d')}}</div>
                                                                </div>
                                                            </div>

                                                            <div class="nk-wg7-foot" >
                                                                <span class="nk-wg7-note">Invested Cakes <span>{{$currentPackage->total_cakes}}({{$currentPackage->planInfo->monthly_roi}}%)</span></span>
                                                            </div>
                                                        </div><!-- .nk-wg7 -->
                                                    </div><!-- .card-inner -->
                                                </div><!-- .card -->
                                            </div><!-- .nk-block -->
                                        </div><!-- .nk-block -->
                                    </div>
                                   
                                    @endif
                                    </div>
                                     @if(!is_null($currentPackage))
                                    <div class="row g-gs" >
                                      <div class="col-lg-12 col-xl-12">
                                @include('dashboard.currentPlan')  
                            </div>
                                </div>
                                @endif


                                   <div class="row g-gs" >

                                    @if(count($loggedInUser->workingIncomeFrom))

                                    <div class="col-md-6 col-xxl-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner border-bottom">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Recent Referral Activities</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <ul class="card-tools-nav">
                                                            {{-- <li><a href="#"><span>Cancel</span></a></li> --}}
                                                            <li class="active"><a href="#"><span>All</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nk-activity">
                                                @php
                                                $colorClass=['bg-warning','bg-success','bg-azure','bg-purple','bg-pink']
                                                @endphp
                                                @foreach($loggedInUser->workingIncomeFrom()->orderBy('id',"desc")->paginate(5) as $value)
                                                <li class="nk-activity-item">
                                                    <div class="nk-activity-media user-avatar {{$colorClass[array_rand($colorClass)]}}">{{substr($value->fromUserInfo->name,0,1)}}</div>
                                                    <div class="nk-activity-data">
                                                        <div class="label">You got <b>{{$value->referal_amount}} cake verse</b> refer bonus from <b>{{$value->fromUserInfo->name}} </b>refer.</div>
                                                        <span class="time">{{$value->created_at}}</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                              
                                            </ul>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    @endif
                                    @if(count($loggedInUser->roiLogInfo))

                                    <div class="col-md-6 col-xxl-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner border-bottom">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Recent ROI Activities</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <ul class="card-tools-nav">
                                                            {{-- <li><a href="#"><span>Cancel</span></a></li> --}}
                                                            <li class="active"><a href="#"><span>All</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nk-activity">
                                                @php
                                                $colorClass=['bg-warning','bg-success','bg-azure','bg-purple','bg-pink']
                                                @endphp
                                                @foreach($loggedInUser->roiLogInfo()->orderBy('id',"desc")->paginate(5) as $value)
                                                <li class="nk-activity-item">
                                                    <div class="nk-activity-media user-avatar {{$colorClass[array_rand($colorClass)]}}">{{substr($loggedInUser->name,0,1)}}</div>
                                                    <div class="nk-activity-data">
                                                        <div class="label">You got <b>{{number_format($value->amount,2)}} cake verse</b> interest for  <b>{{$value->roi_date}} </b></div>
                                                        {{-- <span class="time">{{$value->created_at}}</span> --}}
                                                    </div>
                                                </li>
                                                @endforeach
                                              
                                            </ul>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                  @endif
                                </div>
                                 @include('dashboard.refer-earn')  

                              @include('dashboard.support')  
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
 <!-- @@ Buy Coin Modal @e -->
 <div class="modal fade zoom" tabindex="-1" role="dialog" id="buy-coin">
    <div class="modal-dialog modal-dialog-centered modal-sm " role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-sm ">
                <div class="nk-block-head nk-block-head-xs text-center">
                    <h5 class="nk-block-title">Wallet Address</h5>
                   
                </div>
                <div class="nk-block text-center">
                    <div id="qr2"></div>                   
                    <div class="form-control-wrap">
                        <input type="text" value="{{$loggedInUser->cWalletInfo->address}}" id="wallet-address" class="form-control form-control-lg" readonly />
                        <a href="javascript:void(0)" onclick="copyToClipboard()" class="btn btn-primary mt-2"><span>Copy</span> <em class="icon ni ni-copy"></em></a>
                    </div>
                </div><!-- .nk-block -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modla-dialog -->
</div><!-- .modal -->           
@endsection
@section('footerScript')
@parent
<script src="{{asset('assets/js/jquery.classyqr.js')}}"></script>
<script>

$("#qr2").ClassyQR({
    create: true,
    size:400,
    type: 'text',
    text: "{{$loggedInUser->cWalletInfo->address}}"
});
function copyToClipboard() {
        var textBox = document.getElementById("wallet-address");
        textBox.select();
        document.execCommand("copy");
    }
    </script>
@endsection
