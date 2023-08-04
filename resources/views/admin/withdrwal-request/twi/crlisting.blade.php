@extends('admin.layouts.app')
@section('content')
<div class="nk-content container-fluid">
   @if (session('success'))
   <div class="alert alert-success" role="alert">
      <p class="text-success">{!! session('success') !!}</p>
   </div>
   @endif
   <div class="container-xl wide-lg">
      <div class="nk-content-body">
         <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between ">
               <div class="nk-block-head-content">
                  <h3 class="nk-block-title page-title">Twi Withdrawal Approved/Reject List</h3>
                  <div class="nk-block-des text-soft">
                     <p>You have total {{ $whistory->total() }} Request.</p>
                  </div>
               </div>
               <div class="nk-block-head-content">
                  <div class="toggle-wrap nk-block-tools-toggle">
                      <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                      <div class="toggle-expand-content" data-content="pageMenu">
                          <ul class="nk-block-tools g-3">
                              <li><a href="{{url('/admin/twi-report')}}" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                             
                          </ul>
                      </div>
                  </div>
              </div>
            </div>
         </div>
         <div class="nk-block">
            @if($whistory->count()>0)
            <div class="card-bordered card-stretch card">
               <div class="card-inner-group">
                  <div class="card-inner">
                     <div class="card-title-group">
                        <div class="card-title">
                           <h5 class="title">All List</h5>
                        </div>
                        <div class="card-tools mr-n1">
                           <ul class="btn-toolbar gx-1">
                              <li><button class="btn btn-icon search-toggle toggle-search" href="#search"><em class="icon ni ni-search"></em></button></li>
                              <li class="btn-toolbar-sep"></li>
                              <li>
                                 <div class="dropdown">
                                    <a aria-haspopup="true" class="btn btn-trigger btn-icon dropdown-toggle" aria-expanded="false">
                                       <div class="dot dot-primary"></div>
                                       <em class="icon ni ni-filter-alt"></em>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="filter-wg dropdown-menu-xl dropdown-menu dropdown-menu-right">
                                       <div class="dropdown-head">
                                          <span class="sub-title dropdown-title">Advanced Filter</span>
                                          <div class="dropdown"><button class="btn btn-undefined btn-sm btn-icon"><em class="icon ni ni-more-h"></em></button></div>
                                       </div>
                                       <div class="dropdown-body dropdown-body-rg">
                                          <div class="row gx-6 gy-4">
                                             <div class="col-6">
                                                <div class="form-group">
                                                   <label class="overline-title overline-title-alt">Type</label>
                                                   <div class="form-control-select">
                                                      <div class="react-select-container css-2b097c-container">
                                                         <span aria-live="polite" aria-atomic="false" aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                                                         <div class="react-select__control css-yk16xz-control">
                                                            <div class="react-select__value-container css-1hwfws3">
                                                               <div class="react-select__placeholder css-1wa3eu0-placeholder">Any Activity</div>
                                                               <div class="css-1g6gooi">
                                                                  <div class="react-select__input" style="display: inline-block;">
                                                                     <input autocapitalize="none" autocomplete="off" autocorrect="off" id="react-select-5-input" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                                                                     <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 13px; font-family: Roboto, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="react-select__indicators css-1wy0on6">
                                                               <span class="react-select__indicator-separator css-1okebmr-indicatorSeparator"></span>
                                                               <div class="react-select__indicator react-select__dropdown-indicator css-tlfecz-indicatorContainer" aria-hidden="true">
                                                                  <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-8mmkcg">
                                                                     <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                                                                  </svg>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-6">
                                                <div class="form-group">
                                                   <label class="overline-title overline-title-alt">Status</label>
                                                   <div class="form-control-select">
                                                      <div class="react-select-container css-2b097c-container">
                                                         <span aria-live="polite" aria-atomic="false" aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                                                         <div class="react-select__control css-yk16xz-control">
                                                            <div class="react-select__value-container css-1hwfws3">
                                                               <div class="react-select__placeholder css-1wa3eu0-placeholder">Any Status</div>
                                                               <div class="css-1g6gooi">
                                                                  <div class="react-select__input" style="display: inline-block;">
                                                                     <input autocapitalize="none" autocomplete="off" autocorrect="off" id="react-select-6-input" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                                                                     <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 13px; font-family: Roboto, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="react-select__indicators css-1wy0on6">
                                                               <span class="react-select__indicator-separator css-1okebmr-indicatorSeparator"></span>
                                                               <div class="react-select__indicator react-select__dropdown-indicator css-tlfecz-indicatorContainer" aria-hidden="true">
                                                                  <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-8mmkcg">
                                                                     <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                                                                  </svg>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-6">
                                                <div class="form-group form-group">
                                                   <label class="overline-title overline-title-alt">Pay Currency</label>
                                                   <div class="form-control-select">
                                                      <div class="react-select-container css-2b097c-container">
                                                         <span aria-live="polite" aria-atomic="false" aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                                                         <div class="react-select__control css-yk16xz-control">
                                                            <div class="react-select__value-container css-1hwfws3">
                                                               <div class="react-select__placeholder css-1wa3eu0-placeholder">Any coin</div>
                                                               <div class="css-1g6gooi">
                                                                  <div class="react-select__input" style="display: inline-block;">
                                                                     <input autocapitalize="none" autocomplete="off" autocorrect="off" id="react-select-7-input" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                                                                     <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 13px; font-family: Roboto, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="react-select__indicators css-1wy0on6">
                                                               <span class="react-select__indicator-separator css-1okebmr-indicatorSeparator"></span>
                                                               <div class="react-select__indicator react-select__dropdown-indicator css-tlfecz-indicatorContainer" aria-hidden="true">
                                                                  <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-8mmkcg">
                                                                     <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                                                                  </svg>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-6">
                                                <div class="form-group form-group">
                                                   <label class="overline-title overline-title-alt">Method</label>
                                                   <div class="form-control-select">
                                                      <div class="react-select-container css-2b097c-container">
                                                         <span aria-live="polite" aria-atomic="false" aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                                                         <div class="react-select__control css-yk16xz-control">
                                                            <div class="react-select__value-container css-1hwfws3">
                                                               <div class="react-select__placeholder css-1wa3eu0-placeholder">Any Method</div>
                                                               <div class="css-1g6gooi">
                                                                  <div class="react-select__input" style="display: inline-block;">
                                                                     <input autocapitalize="none" autocomplete="off" autocorrect="off" id="react-select-8-input" spellcheck="false" tabindex="0" type="text" aria-autocomplete="list" value="" style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                                                                     <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 13px; font-family: Roboto, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="react-select__indicators css-1wy0on6">
                                                               <span class="react-select__indicator-separator css-1okebmr-indicatorSeparator"></span>
                                                               <div class="react-select__indicator react-select__dropdown-indicator css-tlfecz-indicatorContainer" aria-hidden="true">
                                                                  <svg height="20" width="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false" class="css-8mmkcg">
                                                                     <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                                                                  </svg>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-6">
                                                <div class="form-group">
                                                   <div class="custom-control custom-control-sm custom-checkbox"><input type="checkbox" class="custom-control-input" id="includeDel"><label class="custom-control-label" for="includeDel"> Including Deleted</label></div>
                                                </div>
                                             </div>
                                             <div class="col-12">
                                                <div class="form-group form-group"><button class="btn btn btn-secondary" type="button">Filter</button></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="dropdown-foot between"><a href="#reset" class="clickable">Reset Filter</a><a href="#save">Save Filter</a></div>
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="dropdown">
                                    <a aria-haspopup="true" class="btn btn-trigger btn-icon dropdown-toggle" aria-expanded="false"><em class="icon ni ni-setting"></em></a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xs dropdown-menu dropdown-menu-right">
                                       <ul class="link-check">
                                          <li><span>Show</span></li>
                                          <li class="active"><a href="#dropdownitem" tabindex="0" role="menuitem" class="dropdown-item">10</a></li>
                                          <li class=""><a href="#dropdownitem" tabindex="0" role="menuitem" class="dropdown-item">15</a></li>
                                       </ul>
                                       <ul class="link-check">
                                          <li><span>Order</span></li>
                                          <li class=""><a href="#dropdownitem" tabindex="0" role="menuitem" class="dropdown-item">DESC</a></li>
                                          <li class=""><a href="#dropdownitem" tabindex="0" role="menuitem" class="dropdown-item">ASC</a></li>
                                       </ul>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="card-search search-wrap false">
                           <div class="search-content"><button class="btn search-back btn-icon toggle-search"><em class="icon ni ni-arrow-left"></em></button><input type="text" class="border-transparent form-focus-none form-control" placeholder="Search by Order Id" value=""><button class="btn search-submit btn-icon"><em class="icon ni ni-search"></em></button></div>
                        </div>
                     </div>
                  </div>
                  <div class="card-inner p-0 ">
                     <div class="nk-tb-list nk-tb-ulist nk-tb-tnx ">
                        <div class="nk-tb-item nk-tb-head">
                           <div class="nk-tb-col"><span>#</span></div>
                           <div class="nk-tb-col tb-col-lg"><span>User Name</span></div>
                           <div class="nk-tb-col tb-col-lg"><span>Token</span></div>
                           <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Status</span></div>
                            <div class="nk-tb-col tb-col-lg"><span>Txid</span></div>
                        </div>
                        @foreach ($whistory as $key=>$wh)
                        <div class="nk-tb-item ">
                           <div class="nk-tb-col">
                              <div class="nk-tnx-type">
                                 <div class="nk-tnx-type-icon bg-warning-dim text-warning"><em class="icon ni ni-arrow-up-right"></em></div>
                                 <div class="nk-tnx-type-text"><span class="tb-lead">Withdrawal Id {{$wh->id}}</span><span class="tb-date">{{$wh->created_at}}</span></div>
                              </div>
                           </div>
                           <div class="nk-tb-col tb-col-lg"><span class="tb-lead-sub">{{$wh->userInfo->name}}</span></div>
                           <div class="nk-tb-col tb-col-lg"><span class="tb-lead-sub font-weight-bold">{{$wh->quantity}} {{$wh->withdrawal_in}}</span></div>
                           <div class="nk-tb-col nk-tb-col-status">
                              @if($wh->status==config('constants.withdrawal_status.PENDING'))
                              <span class="badge badge-sm badge-dim badge-outline-warning d-none d-md-inline-flex">Pending</span>
                              @elseif($wh->status==config('constants.withdrawal_status.COMPLETED'))
                              <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">Completed</span>                                          @else
                              <span class="badge badge-sm badge-dim badge-outline-danger d-none d-md-inline-flex">Rejected</span>
                              @endif 
                           </div>
                           <div class="nk-tb-col tb-col-lg"><span class="tb-lead-sub "><input type="text" value="{{$wh->txId}}" disabled/></span></div>

                          
                        </div>
                        @endforeach
                     </div>
                  </div>
                  @if($whistory->hasPages())
                  <div class="card-inner">
                     {{ $whistory->withQueryString()->links('pagination::bootstrap-4') }}
                  </div>
                  <!-- .card-inner -->
                  @endif
               </div>
            </div>
            @else
            <div class="card  card-stretch">
               <div class="card-inner-group text-center">
                  <img style="width:500px;margin:auto;" src="{{asset('assets/images/undraw_not_found_-60-pq.svg')}}" />
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
@endsection
@section('footerScript')
@parent
<script>
    function onApprovedMethod(id,isApproved){
         let message=isApproved==1?"Are you sure to approve this Request":"Are you sure to reject request";
        if(confirm(message)){

$.ajax({
url: "{{route('admin-twi.store')}}",
type: 'post',
dataType: 'json',
data: {
id : id, _token: "{{ csrf_token() }}",isApproved:isApproved,
}, 
success: function (msg) {
    alert(msg?.message || "Withdrawal Request approved successfully");
    window.location.reload();

},
error: function (request, status, error) {
//   
    alert(request?.responseJSON?.message ||`Error in Api`);
 
    }
});   
        }
    }
    </script>
@endsection