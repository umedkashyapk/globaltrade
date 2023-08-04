 <!-- sidebar @s -->
 <div class="nk-sidebar nk-sidebar-fixed is-theme" data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="{{url('/')}}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{asset('images/logo-cake.png')}}" style="width:200px" srcset="{{asset('images/logo-cake.png')}} 2x" alt="logo">
                            <img class="logo-dark logo-img" style="width:100px" src="{{asset('images/logo-cake.png')}}" srcset="{{asset('images/logo-cake.png')}} 2x" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-body" data-simplebar>
                        <div class="nk-sidebar-content">
                            
                            <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                                <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
                                    <div class="user-card-wrap">
                                        <div class="user-card">
                                            <div class="user-avatar">
                                                <span>{{substr(UserManager::get()->name, 0, 1)}}</span>
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text">{{UserManager::get()->name}}</span>
                                                <span class="sub-text">{{UserManager::get()->email}}</span>
                                            </div>
                                            <div class="user-action">
                                                <em class="icon ni ni-chevron-down"></em>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                                   
                                   
                                    <ul class="link-list">
                                        <li><a href="javascript:void(0)"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                        <li><a href="javascript:void(0)"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                        <li><a href="javascript:void(0)"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                    </ul>
                                    <ul class="link-list">
                                        <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                    </ul>
                                </div>
                            </div><!-- .nk-sidebar-widget -->
                            <div class="nk-sidebar-menu">
                                <!-- Menu -->
                                <ul class="nk-menu">
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title">Menu</h6>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('admin-dashboard')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                            <span class="nk-menu-text">Dashboard</span>
                                        </a>
                                    </li>
                                     <li class="nk-menu-item has-sub">
  <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-original-title="" title="">
    <span class="nk-menu-icon">
      <em class="icon ni ni-users">
      </em>
    </span>
    <span class="nk-menu-text">Users
    </span>
  </a>
  <ul class="nk-menu-sub">
    <li class="nk-menu-item">
      <a href="{{route('user-lists.index')}}" class="nk-menu-link" data-bs-original-title="" title="">
        <span class="nk-menu-text">All Users
        </span>
      </a>
    </li>
   
   
  </ul>
</li>
  <li class="nk-menu-item has-sub">
  <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-original-title="" title="">
    <span class="nk-menu-icon">
      <em class="icon ni ni-users">
      </em>
    </span>
    <span class="nk-menu-text">Withdrawal Request
    </span>
  </a>
  <ul class="nk-menu-sub">
    <li class="nk-menu-item">
      <a href="{{route('admin-twi.index')}}" class="nk-menu-link" data-bs-original-title="" title="">
        <span class="nk-menu-text">Level Income Request
        </span>
      </a>
    </li>
    <li class="nk-menu-item">
      <a href="{{route('admin-twi-approve-reject')}}" class="nk-menu-link" data-bs-original-title="" title="">
        <span class="nk-menu-text">Level Income Approved/Reject List
        </span>
      </a>
    </li>
    <li class="nk-menu-item">
      <a href="{{route('admin-roi.index')}}" class="nk-menu-link" data-bs-original-title="" title="">
        <span class="nk-menu-text">ROI Income
        </span>
      </a>
    </li>
    <li class="nk-menu-item">
      <a href="{{route('admin-roi-approve-reject')}}" class="nk-menu-link" data-bs-original-title="" title="">
        <span class="nk-menu-text">ROI Approved/Reject List
        </span>
      </a>
    </li>
   
  </ul>
</li>
                                    {{-- <li class="nk-menu-item">
                                        <a href="javascript:void(0)" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                            <span class="nk-menu-text">All Reports</span>
                                        </a>
                                    </li> --}}
                                                                         <li class="nk-menu-item has-sub">

                                    <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-original-title="" title="">
    <span class="nk-menu-icon">
      <em class="icon ni ni-reload">
      </em>
    </span>
    <span class="nk-menu-text">CVT update
    </span>
  </a>
  <ul class="nk-menu-sub">
    <li class="nk-menu-item">
      <a href="{{route('cake-verse.index')}}" class="nk-menu-link" data-bs-original-title="" title="">
        <span class="nk-menu-text">Cake Verse Rate
        </span>
      </a>
    </li>
   
   
  </ul>
</li>
<li class="nk-menu-item">
  <a href="{{route('admin-support.index')}}" class="nk-menu-link">
      <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
      <span class="nk-menu-text">Support</span>
  </a>
</li>
                                    <li class="nk-menu-item">
                                        <a href="{{url('admin/plans')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-table-view"></em></span>
                                            <span class="nk-menu-text">Plans</span>
                                        </a>
                                    </li>
                                  
                                    <li class="nk-menu-item">
                                        <a href="{{route('levels.index')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-table-view"></em></span>
                                            <span class="nk-menu-text">Levels</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('settings.index')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-setting-alt"></em></span>
                                            <span class="nk-menu-text">Settings</span>
                                        </a>
                                    </li>
                                     <li class="nk-menu-item">
                                        <a href="{{route('admin-logout')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                                            <span class="nk-menu-text">Sign Out</span>
                                        </a>
                                    </li>
                                  
                                  
                                </ul><!-- .nk-menu -->
                            </div><!-- .nk-sidebar-menu -->
                            
                         
                        </div><!-- .nk-sidebar-content -->
                    </div><!-- .nk-sidebar-body -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->