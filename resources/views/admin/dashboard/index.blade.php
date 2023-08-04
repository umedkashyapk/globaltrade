@extends('admin.layouts.app')
@section('content')
       
            
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Admin Dashboard</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>Welcome to Cake Verse Dashboard Template.</p>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="row g-gs">
                                    <div class="col-lg-12">
                                        <div class="card  h-100">
                                            <div class="card-inner">
                                               
                                                <div class="nk-order-ovwg">
                                                    <div class="row g-4 align-end">
                                                       
                                                        <div class="col-xxl-4">
                                                            <div class="row g-4">
                                                                <div class="col-sm-4 col-xxl-12">
                                                                    <div class="nk-order-ovwg-data buy">
                                                                        <div class="amount">{{$totalUsers}} <small class="currenct currency-usd">Users</small></div>
                                                                        <div class="info">Last month <strong>{{$lastMonthUsers->count()}} <span class="currenct currency-usd">Users</span></strong></div>
                                                                        <div class="title d-none" ><em class="icon ni ni-arrow-down-left"></em> Buy Orders</div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 col-xxl-12">
                                                                    <div class="nk-order-ovwg-data sell">
                                                                        <div class="amount">{{ UserManager::getCakePrice($cakeVerseBalance['data']['data'])}}<small class="currenct currency-usd"> CV</small></div>
                                                                        <div class="info" style="visibility:hidden">Last month <strong>0 <span class="currenct currency-usd">USD</span></strong></div>
                                                                        <div class="title d-none "><em class="icon ni ni-arrow-up-left"></em> Sell Orders</div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 col-xxl-12">
                                                                    <div class="nk-order-ovwg-data sell">
                                                                        <div class="amount">{{ UserManager::getCakePrice($usdtBalance['data']['data'])}}<small class="currenct currency-usd"> usdt</small></div>
                                                                        <div class="info" style="visibility:hidden">Last month <strong>0 <span class="currenct currency-usd">USD</span></strong></div>
                                                                        <div class="title d-none "><em class="icon ni ni-arrow-up-left"></em> Sell Orders</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .col -->
                                                    </div>
                                                </div><!-- .nk-order-ovwg -->
                                            </div><!-- .card-inner -->
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                   
                                   
                                </div><!-- .row -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
                <!-- content @e -->  
           
@endsection
@section('footerScript')
@parent
   @if (\Session::has('kycMessage'))
       <script>
          swal({
                title: "KYC Message",
                text: "Your document uploaded successfully. It's in In-Review State",
                icon: "success",
            });
        </script>
    @endif

 @endsection