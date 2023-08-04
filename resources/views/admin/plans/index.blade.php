@extends('admin.layouts.app')
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
                                    <h3 class="nk-block-title page-title">Plans List</h3>
                                    <div class="nk-block-des text-soft">
                                        <p>You have total {{ $plansList->total() }} plans.</p>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{url('admin/plans/create')}}"><span>Add Plan</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="card card-bordered card-stretch">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h5 class="title">All Plans</h5>
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
                                                            <span>Plan Name</span>
                                                        </span>
                                                        <span class="tb-tnx-date d-md-inline-block d-none">
                                                            <span class="d-none d-md-block">
                                                                <span>No of Months</span>
                                                                <span>Monthly ROI</span>
                                                            </span>
                                                        </span>
                                                    </th>
                                                    <th class="tb-tnx-amount is-alt">
                                                        <span class="tb-tnx-total">Min Joining Token</span>
                                                        <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                                                    </th>
                                                    <th class="tb-tnx-action">
                                                        <span>&nbsp;</span>
                                                    </th>
                                                </tr><!-- tb-tnx-item -->
                                            </thead>
                                            <tbody>
                                                @foreach ($plansList as $key=>$plan)

                                                <tr class="tb-tnx-item">
                                                    <td class="tb-tnx-id">
                                                        <a href="#"><span>{{$plan->id}}</span></a>
                                                    </td>
                                                    <td class="tb-tnx-info">
                                                        <div class="tb-tnx-desc">
                                                            <span class="title">{{$plan->name}}</span>
                                                        </div>
                                                        <div class="tb-tnx-date">
                                                            <span class="date">{{$plan->no_of_months}}</span>
                                                            <span class="date">{{$plan->monthly_roi}}%</span>
                                                        </div>
                                                    </td>
                                                    <td class="tb-tnx-amount is-alt">
                                                        <div class="tb-tnx-total">
                                                            {{$plan->min_joining_token}}
                                                        </div>
                                                        <span class="tb-tnx-status">
                                                            @if($plan->active==1)
                                                            <span class="badge badge-dot badge-success">Active</span>
                                                            @else
                                                            <span class="badge badge-dot badge-danger">Hide</span>
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td class="tb-tnx-action">
                                                        <div class="dropdown">
                                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-sm">
                                                                <ul class="link-list-plain">
                                                                    <li><a href="{{url('admin/plans/'.$plan->id.'/edit')}}">Edit</a></li>
                                                                    @if($plan->active==1)
                                                                    <li> <form action="{{route('plans.destroy',[$plan->id])}}" method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <input type="hidden" name="active" value="0" />
                                                                        <button class="link" type="submit">Deactivate Plan</button>               
                                                                       </form>
                                                                    </li>
                                                                   @else
                                                                   <li> <form action="{{route('plans.destroy',[$plan->id])}}" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <input type="hidden" name="active" value="1" />
                                                                    <button class="link" type="submit">Activate Plan</button>               
                                                                   </form>
                                                                </li>

                                                                   @endif

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr><!-- tb-tnx-item -->
                                                @endforeach

                                                
                                            </tbody>
                                        </table>
                                    </div><!-- .card-inner -->
                                    @if($plansList->hasPages())
                                    <div class="card-inner">
                                        {{ $plansList->withQueryString()->links('pagination::bootstrap-4') }}
                                    
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
  
 @endsection