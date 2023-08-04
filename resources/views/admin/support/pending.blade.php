@extends('admin.layouts.app')
@section('content')

                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            @if (\Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                    <p class="text-success">{!! \Session::get('success') !!}</p>
                              </div>
                            @endif
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Open Tickets Lists</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>You have total {{ $tickets->total() }} Tickets.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="card card-bordered card-stretch">
                                    <div class="card-inner-group">
                                        <div class="card-inner position-relative card-tools-toggle">
                                            <div class="card-title-group">
                                                <div class="card-tools">
                                                    <!-- <div class="form-inline flex-nowrap gx-3">
                                                        <div class="form-wrap w-150px">
                                                            <select class="form-select" data-search="off" data-placeholder="Bulk Action">
                                                                <option value="">Bulk Action</option>
                                                                <option value="email">Send Email</option>
                                                                <option value="group">Change Group</option>
                                                                <option value="suspend">Suspend User</option>
                                                                <option value="delete">Delete User</option>
                                                            </select>
                                                        </div>
                                                        <div class="btn-wrap">
                                                            <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span>
                                                            <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                                        </div>
                                                    </div> -->
                                                    <!-- .form-inline -->
                                                </div><!-- .card-tools -->
                                                <div class="card-tools mr-n1">
                                                    <ul class="btn-toolbar gx-1">
                                                        <li>
                                                            <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                                        </li><!-- li -->
                                                        <li class="btn-toolbar-sep"></li><!-- li -->
                                                        <li>
                                                            <div class="toggle-wrap">
                                                                <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                                <div class="toggle-content" data-content="cardTools">
                                                                    <ul class="btn-toolbar gx-1">
                                                                        <li class="toggle-close">
                                                                            <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                                                                        </li><!-- li -->
                                                                        <li>
                                                                            <div class="dropdown">
                                                                                <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                                    <div class="dot dot-primary"></div>
                                                                                    <em class="icon ni ni-filter-alt"></em>
                                                                                </a>
                                                                                <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                                                    <div class="dropdown-head">
                                                                                        <span class="sub-title dropdown-title">Filter Users</span>
                                                                                        <div class="dropdown">
                                                                                            <a href="#" class="btn btn-sm btn-icon">
                                                                                                <em class="icon ni ni-more-h"></em>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="dropdown-body dropdown-body-rg">
                                                                                        <div class="row gx-6 gy-3">
                                                                                            <!-- <div class="col-6">
                                                                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                                                                    <input type="checkbox" class="custom-control-input" id="hasBalance">
                                                                                                    <label class="custom-control-label" for="hasBalance"> Have Balance</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                                                                    <input type="checkbox" class="custom-control-input" id="hasKYC">
                                                                                                    <label class="custom-control-label" for="hasKYC"> KYC Verified</label>
                                                                                                </div>
                                                                                            </div> -->
                                                                                           
                                                                                            <div class="col-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="overline-title overline-title-alt">Status</label>
                                                                                                    <select class="form-select" id="filter-status" name="status">
                                                                                                        <option value="any">Any Status</option>
                                                                                                        <option value="1">Closed</option>
                                                                                                        <option value="0">Open</option>
                                                                                                      
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12">
                                                                                                <div class="form-group">
                                                                                                    <button type="button"  class="btn btn-secondary filter-btn">Filter</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="dropdown-foot between">
                                                                                        <a class="clickable" href="{{url('admin/user-lists')}}">Reset Filter</a>
                                                                                        <!-- <a href="#">Save Filter</a> -->
                                                                                    </div>
                                                                                </div><!-- .filter-wg -->
                                                                            </div><!-- .dropdown -->
                                                                        </li><!-- li -->
                                                                        <!-- <li>
                                                                            <div class="dropdown">
                                                                                <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                                    <em class="icon ni ni-setting"></em>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
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
                                                                                </div>
                                                                            </div>
                                                                        </li> -->
                                                                        <!-- li -->
                                                                    </ul><!-- .btn-toolbar -->
                                                                </div><!-- .toggle-content -->
                                                            </div><!-- .toggle-wrap -->
                                                        </li><!-- li -->
                                                    </ul><!-- .btn-toolbar -->
                                                </div><!-- .card-tools -->
                                            </div><!-- .card-title-group -->
                                            <div class="card-search search-wrap" data-search="search">
                                                <div class="card-body">
                                                    <div class="search-content">
                                                        <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                        <input type="text" class="form-control border-transparent form-focus-none search-input-field" placeholder="Search by user or email">
                                                        <button class="search-submit btn btn-icon search-user-btn"><em class="icon ni ni-search"></em></button>
                                                    </div>
                                                </div>
                                            </div><!-- .card-search -->
                                        </div><!-- .card-inner -->
                                        <div class="card-inner p-0">
                                            <div class="nk-tb-list nk-tb-ulist">
                                                <div class="nk-tb-item nk-tb-head">
                                                    <div class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                            <input type="checkbox" class="custom-control-input" id="uid">
                                                            <label class="custom-control-label" for="uid"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col"><span class="sub-text">User</span></div>
                                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></div>
                                                    <div class="nk-tb-col tb-col-lg"><span class="sub-text">ticket title</span></div>
                                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Message</span></div>
                                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
                                                    <div class="nk-tb-col tb-col-md text-right"><span class="sub-text">Actions</span></div>

                                                    
                                                </div><!-- .nk-tb-item -->
                                                @foreach ($tickets as $key=>$ticket)

                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                            <input type="checkbox" class="custom-control-input" id="uid{{$key}}">
                                                            <label class="custom-control-label" for="uid{{$key}}"></label>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <a href="html/user-details-regular.html">
                                                            <div class="user-card">
                                                                <div class="user-avatar bg-primary">
                                                                    <span>{{substr($ticket->userInfo->name, 0, 1)}}</span>
                                                                </div>
                                                                <div class="user-info">
                                                                    <span class="tb-lead">{{$ticket->userInfo->name}} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                                    <span>{{$ticket->userInfo->email}}</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-md">
                                                        <span>{{$ticket->userInfo->mobile_number}}</span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-lg">
                                                        {{$ticket->title}}
                                                        {{-- <ul class="list-status">
                                                            <li><em class="icon {{$user->registration_step<2?'ni ni-alert-circle':'text-success ni ni-check-circle'}}"></em> <span>Email</span></li>
                                                            <li><em class="icon {{$user->registration_step<3?'ni ni-alert-circle':'text-success ni ni-check-circle'}}"></em> <span>KYC</span></li>
                                                        </ul> --}}
                                                    </div>
                                                    
                                                    <div class="nk-tb-col tb-col-md">
                                                      
                                                       {{$ticket->message}}
                                                    </div>
                                                    <div class="nk-tb-col tb-col-md">
                                                        @if($ticket->status==1)
                                                        <span class="tb-status text-success">Closed</span>
                                                        @else
                                                        <span class="tb-status text-danger">Open</span>
                                                        @endif

                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1">
                                                           
                                                            <li>
                                                                <div class="drodown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    @if($ticket->status==0) <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <!-- <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick View</span></a></li> -->
                                                                           <li><a href="{{url('admin/admin-support/'.$ticket->id)}}"><em class="icon ni ni-stop"></em><span>Close ticket</span></a></li>
                                                                            <!-- <li><a href="#"><em class="icon ni ni-repeat"></em><span>Transaction</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li> -->
                                                                        </ul>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div><!-- .nk-tb-list -->
                                        </div><!-- .card-inner -->
                                        @if($tickets->hasPages())
                                        <div class="card-inner">
                                            {{ $tickets->withQueryString()->links('pagination::bootstrap-4') }}
                                        
                                        </div><!-- .card-inner -->
                                        @endif
                       
                                       </div><!-- .card-inner-group -->
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
                <!-- content @e -->       

@endsection
@section('footerScript')
@parent
  <script>
      var setQueryParameter = function(uri, key, value) {
      var re = new RegExp("([?&])("+ key + "=)[^&#]*", "g");
        if (uri.match(re)) 
            return uri.replace(re, '$1$2' + value);

        // need to add parameter to URI
        var paramString = (uri.indexOf('?') < 0 ? "?" : "&") + key + "=" + value;
        var hashIndex = uri.indexOf('#');
        if (hashIndex < 0)
            return uri + paramString;
        else
            return uri.substring(0, hashIndex) + paramString + uri.substring(hashIndex);
        }

      $(document).on("click",".filter-btn",function(e){
          e.preventDefault();
          let filterOn=$("#filter-on").val();
          let filterStatus=$("#filter-status").val();
          let url=$(location).attr('href');
          url=setQueryParameter(url,'filter_on',filterOn);
          url=setQueryParameter(url,'filter_status',filterStatus);

          window.location = url;
      })  
      $(document).on('click','.search-user-btn',function(e){
        e.preventDefault();
        searchString=$(".search-input-field").val();
        if(searchString.length>0){
            let url=$(location).attr('href');
          url=setQueryParameter(url,'search_text',searchString);
          window.location = url;

        }
      })

    
  </script>
 @endsection