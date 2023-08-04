<div class="nk-block">
   
   <div class="row g-gs">
      <div class="col-sm-6 col-lg-4 col-xl-6 col-xxl-4">
         <div class="card card-bordered is-dark">
            <div class="nk-wgw">
               <div class="nk-wgw-inner">
                  <a class="nk-wgw-name" href="javascript:void(0)">
                     <div class="nk-wgw-icon is-default"><em class="icon ni ni-sign-bnb"></em></div>
                     <h5 class="nk-wgw-title title">Total Working Income</h5>
                  </a>
                  <div class="nk-wgw-balance">
                     <div class="amount">{{$loggedInUser->walletInfo->working_income ?number_format($loggedInUser->walletInfo->working_income,2): 0}}<span class="currency currency-bnb">Cake Verse</span></div>
                       <div class="amount">Withdrawable  {{$loggedInUser->walletInfo->withdrawal_working_income ?? 0}}<span class="currency currency-bnb">Cake Verse</span></div>
           
                  </div>
               </div>
                <div class="nk-wgw-actions">
                  <ul>
                   
                     <li><a href="javascript:void(0)" onClick="openPopup()"><em class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a></li>
                     
                  </ul>
               </div>
               
         </div>
      </div>
   </div>
</div>
</div>
@if(!is_null($isPendingWithdrawal))
<div class="pmo-lv pmo-dark active">
   <a class="pmo-close" href="#"><em class="ni ni-cross"></em></a>
   <a class="pmo-wrap" target="_blank" href="{{route('withdrawal-history.index')}}">
      <div class="pmo-text text-white m-auto">Your {{$isPendingWithdrawal->quantity}} cake verse withdrawal request in pending state.<em class="ni ni-arrow-long-right"></em></div>
   </a>
</div>
@endif