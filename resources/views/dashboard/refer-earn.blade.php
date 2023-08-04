<div class="nk-block mt-5">
   <div class="card card-bordered">
      <div class="nk-refwg1">
         <div class="nk-refwg-invite card-inner">
            <div class="nk-refwg-head g-3">
               <div class="nk-refwg-title">
                  <h5 class="title">Refer Us &amp; Earn</h5>
                  <div class="title-sub">Use the bellow link to invite your friends.</div>
               </div>
               <div class="nk-refwg-action"><a href="https://wa.me?text={{url('/register?token='.$loggedInUser->referral_code)}}" class="btn btn-primary">Invite</a></div>
            </div>
            <div class="nk-refwg-url">
               <div class="form-control-wrap">
                  <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span></div>
                  <div class="form-icon"><em class="icon ni ni-link-alt"></em></div>
                  <input type="text" class="form-control copy-text" id="refUrl" value="{{url('/register?token='.$loggedInUser->referral_code)}}">
               </div>
            </div>
         </div>
         
      </div>
   </div>
</div>