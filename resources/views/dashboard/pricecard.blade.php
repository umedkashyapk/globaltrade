<div class="row gy-gs">
  
   <div class="col-lg-12 col-xl-12">
   	<div class="nk-block-head-xs">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Overview</h5>
                                                </div>
                                            </div><!-- .nk-block-head -->
      <div class="nk-block">
        
         <div class="row g-2">
            <div class="col-sm-3">
               <div class="card bg-light">
                  <div class="nk-wgw sm">
                     <a class="nk-wgw-inner" href="javascript:void(0)">
                        <div class="nk-wgw-name">
                           <div class="nk-wgw-icon"><em class="icon ni ni-sign-bnb"></em></div>
                           <h5 class="nk-wgw-title title">Cake Price</h5>
                        </div>
                        <div class="nk-wgw-balance">
                           <div class="amount">{{$cakePrice['price']?
                              number_format($cakePrice['price'],2):0}}<span class="currency currency-inr">USD</span></div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-3">
               <div class="card bg-light">
                  <div class="nk-wgw sm">
                     <a class="nk-wgw-inner" href="javascript:void(0)">
                        <div class="nk-wgw-name">
                           <div class="nk-wgw-icon"><em class="icon ni ni-sign-bnb"></em></div>
                           <h5 class="nk-wgw-title title">Cake Verse</h5>
                        </div>
                        <div class="nk-wgw-balance">
                           @if(!is_null($cakeVersePrice))
                           <div class="amount">{{$cakeVersePrice->key_value}}<span class="currency currency-inr">USD</span></div>
                           @else
                           <div class="amount">N/A</div>
                           @endif
                        </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-3">
               <div class="card bg-light">
                  <div class="nk-wgw sm">
                     <a class="nk-wgw-inner" href="javascript:void(0)">
                        <div class="nk-wgw-name">
                           <div class="nk-wgw-icon"><em class="icon ni ni-sign-bnb"></em></div>
                           <h5 class="nk-wgw-title title">BNB Balance</h5>
                        </div>
                        <div class="nk-wgw-balance">
                           <div class="amount">{{$bnbBalance['data']['balance']??0}}<span class="currency currency-inr">BNB</span></div>
                         
                        </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-3">
               <div class="card bg-light">
                  <div class="nk-wgw sm">
                     <a class="nk-wgw-inner" href="javascript:void(0)">
                        <div class="nk-wgw-name">
                           <div class="nk-wgw-icon"><em class="icon ni ni-sign-bnb"></em></div>
                           <h5 class="nk-wgw-title title">USDT Balance</h5>
                        </div>
                        <div class="nk-wgw-balance">
                           <div class="amount">{{ UserManager::getCakePrice($usdtBalance['data']['data'])}}<span class="currency currency-inr">usdt</span></div>
                         
                        </div>
                     </a>
                  </div>
               </div>
            </div>
           
         </div>
      </div>
     
   </div>
</div>