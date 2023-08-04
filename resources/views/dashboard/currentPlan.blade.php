

<div class="card card-bordered sp-plan">
   <div class="row no-gutters">
      <div class="col-md-8">
         <div class="sp-plan-info card-inner">
            <div class="row gx-0 gy-3">
               <div class="col-xl-9 col-sm-8">
                  <div class="sp-plan-name">
                     <h6 class="title"><a href="/demo4/subscription/subscriptions-detail.html">{{$currentPackage->planInfo->name}}<span class="badge bg-success rounded-pill">Active</span></a></h6>
                     <p>Tnx ID: <span class="text-base">{{$currentPackage->txId}}</span></p>
                  </div>
               </div>
               <!-- <div class="col-xl-3 col-sm-4">
                  <div class="sp-plan-opt">
                     <div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="auto-plan-p1" checked=""><label class="custom-control-label text-soft" for="auto-plan-p1">Auto Renew</label></div>
                  </div>
               </div> -->
            </div>
         </div>
         <div class="sp-plan-desc card-inner">
            <ul class="row gx-1">
               <li class="col-6 col-lg-3">
                  <p><span class="text-soft">Started On</span>{{$currentPackage->created_at->format('Y-m-d')}}</p>
               </li>
              
               <li class="col-6 col-lg-3">
                  <p><span class="text-soft">cake</span> {{$currentPackage->total_cakes}}</p>
               </li>
               <li class="col-6 col-lg-3">
                   <p><span class="text-soft">Expired On</span>{{$currentPackage->expire_date->format('Y-m-d')}}</p>
               </li>
            </ul>
         </div>
      </div>
      <div class="col-md-4">
         <div class="sp-plan-action card-inner">
            <div class="sp-plan-btn"><a class="btn btn-primary" data-bs-toggle="modal" href="javascript:void(0)" subscription-change"><span>{{$currentPackage->total_cakes +($currentPackage->total_cakes*$currentPackage->planInfo->monthly_roi/100)}} cakes</span></a></div>
            <div class="sp-plan-note text-md-center">
               <p> will return to you in  <span>{{$currentPackage->planInfo->no_of_months}} Months</span></p>
            </div>
         </div>
      </div>
   </div>
</div>

