 <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed" data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="{{url('/')}}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{asset('images/logo-cake.png')}}" style="width:150px" srcset="{{asset('images/logo-cake.png')}} 2x" alt="logo">
                            <img class="logo-dark logo-img" style="width:150px" src="{{asset('images/logo-cake.png')}}" srcset="{{asset('images/logo-cake.png')}} 2x" alt="logo-dark">
                            {{-- <span class="nio-version">Crypto</span> --}}
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-body" data-simplebar>
                        <div class="nk-sidebar-content">
                            <div class="nk-sidebar-widget d-none d-xl-block">
                               
                                
                            </div><!-- .nk-sidebar-widget -->
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
                                       <li><a href="html/crypto/profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                    </ul>
                                    <ul class="link-list">
                                        <li><a href="{{url('logout')}}"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
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
                                        <a href="{{route('dashboard')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                            <span class="nk-menu-text">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('plan.index')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                            <span class="nk-menu-text">Packages</span>
                                        </a>
                                    </li>
                                      <li class="nk-menu-item">
                                        <a href="{{route('profile.index')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                            <span class="nk-menu-text">Profile</span>
                                        </a>
                                    </li>
                                     <li class="nk-menu-item">
                                        <a href="{{route('team.index')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                            <span class="nk-menu-text">Team Status</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item has-sub">
  <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-original-title="" title="">
    <span class="nk-menu-icon">
      <em class="icon ni ni-repeat">
      </em>
    </span>
    <span class="nk-menu-text">My Income
    </span>
  </a>
  <ul class="nk-menu-sub">
    <li class="nk-menu-item">
      <a href="{{route('roi.index')}}" class="nk-menu-link" data-bs-original-title="" title="">
        <span class="nk-menu-text">Weekly Bonus
        </span>
      </a>
    </li>
    <li class="nk-menu-item">
      <a href="{{route('twi.index')}}" class="nk-menu-link" data-bs-original-title="" title="">
        <span class="nk-menu-text">Level Bonus
        </span>
      </a>
    </li>
   
  </ul>
</li>
 <li class="nk-menu-item">
                                        <a href="{{route('withdrawal-history.index')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                            <span class="nk-menu-text">Withdrawal History</span>
                                        </a>
                                    </li>
                                     <li class="nk-menu-item has-sub">
  <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-original-title="" title="">
    <span class="nk-menu-icon">
      <em class="icon ni ni-chat-circle">
      </em>
    </span>
    <span class="nk-menu-text">Support
    </span>
  </a>
  <ul class="nk-menu-sub">
    <li class="nk-menu-item">
      <a href="{{route('support.create')}}" class="nk-menu-link" data-bs-original-title="" title="">
        <span class="nk-menu-text">Create Ticket
        </span>
      </a>
    </li>
    <li class="nk-menu-item">
      <a href="{{route('support.index')}}" class="nk-menu-link" data-bs-original-title="" title="">
        <span class="nk-menu-text">Ticket History
        </span>
      </a>
    </li>
   
  </ul>
</li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('logout')}}" class="nk-menu-link">
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