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
                                    <h3 class="nk-block-title page-title">Tickets List</h3>
                                    <div class="nk-block-des text-soft">
                                        <p>Total {{ $tickets->total() }} Rows.</p>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                   
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                                @if($tickets->count()>0)
                             <div class="card card-bordered card-stretch">

                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h5 class="title">All Ticket</h5>
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
                                                            <span> Title</span>
                                                        </span>
                                                       
                                                    </th>
                                                    <th class="tb-tnx-amount is-alt">
                                                        <span class="tb-tnx-total">Message</span>
                                                    </th>
                                                    <th class="tb-tnx-amount is-alt">
                                                        <span class="tb-tnx-total">Status</span>
                                                    </th>
                                                  
                                            </thead>
                                            <tbody>
                                                @foreach ($tickets as $key=>$ticket)

                                                <tr class="tb-tnx-item">
                                                    <td class="tb-tnx-id">
                                                        <a href="#"><span>{{$ticket->id}}</span></a>
                                                    </td>
                                                    <td class="tb-tnx-info">
                                                        <div class="tb-tnx-desc">
                                                            <span class="title">{{$ticket->title}}</span>
                                                        </div>
                                                       
                                                    </td>
                                                    <td class="tb-tnx-amount is-alt">
                                                        <div class="tb-tnx-total">
                                                            {{$ticket->message}}
                                                        </div>
                                                       
                                                    </td>
                                                    <td class="tb-tnx-amount is-alt">
                                                        <div class="tb-tnx-total">
                                                            @if($ticket->status==0)
                                                            <span class="badge badge-sm badge-dim bg-outline-warning d-none d-md-inline-flex">Pending</span>
                                                            @else
                                                            <span class="badge badge-sm badge-dim bg-outline-success d-none d-md-inline-flex">Completed</span>
                                                            @endif
                                                        </div>
                                                       
                                                    </td>
                                                  
                                                </tr><!-- tb-tnx-item -->
                                                @endforeach

                                                
                                            </tbody>
                                        </table>
                                    </div><!-- .card-inner -->
                                    @if($tickets->hasPages())
                                    <div class="card-inner">
                                        {{ $tickets->withQueryString()->links('pagination::bootstrap-4') }}
                                    
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
           
@endsection
@section('footerScript')
@parent
  
 @endsection