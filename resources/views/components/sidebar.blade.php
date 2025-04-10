{{-- <nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            CMS <span>System</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body mb-4">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('profile.edit') }} " class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('create.index') }} " class="nav-link">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Make Complaint</span>
                </a>
            </li>



            <li class="nav-item">
                <a href="{{ route('history.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="pie-chart"></i>
                    <span class="link-title">My Complaint</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}"  class="nav-link">
                    <i class="link-icon" data-feather="log-out"></i>
                    <span class="link-title">Log out</span>
                </a>
            </li>
             
        </ul>
    </div>
</nav> --}}


<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            CMS <span>System</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body mb-4">
        <ul class="nav">


            <!-- Show only for Normal Users -->
            @if (Auth::user()->role == 1)
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('create.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Make Complaint</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('history.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="pie-chart"></i>
                        <span class="link-title">My Complaints</span>
                    </a>
                </li>
            @endif

            <!-- Show only for Admin -->
            @if (Auth::user()->role == 2)
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">Admin Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Profile</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Manage Users</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('sub_officer') }}" class="nav-link">Subject Officer</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer.index') }}" class="nav-link">Customers</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">User Reports</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Complaint Reports</span>
                    </a>
                </li>



                {{-- <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                      <i class="link-icon" data-feather="anchor"></i>
                      <span class="link-title">Manage Complaint</span>
                      <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="advancedUI">
                      <ul class="nav sub-menu">
                        <li class="nav-item">
                          <a href="{{ route('complaints.index') }}" class="nav-link">All</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('over_due.index') }}" class="nav-link">Over Due</a>
                          </li>
                        <li class="nav-item">
                          <a href="{{ route('complaints.not_assign') }}" class="nav-link">Not Assigned</a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">Not Process</a>
                        </li>

                        <li class="nav-item">
                            <a href="pages/advanced-ui/sweet-alert.html" class="nav-link">In Process</a>
                        </li>

                        <li class="nav-item">
                            <a href="pages/advanced-ui/sweet-alert.html" class="nav-link">Closed</a>
                        </li>
                      </ul>
                    </div>
                </li> --}}

                @php
                    $manageComplaintRoutes = [
                        'complaints.index',
                        'over_due.index',
                        'complaints.not_assign',
                    ];
                @endphp

                <li class="nav-item">
                    <a class="nav-link {{ in_array(Route::currentRouteName(), $manageComplaintRoutes) ? '' : 'collapsed' }}"
                        data-toggle="collapse" href="#advancedUI" role="button"
                        aria-expanded="{{ in_array(Route::currentRouteName(), $manageComplaintRoutes) ? 'true' : 'false' }}"
                        aria-controls="advancedUI">
                        <i class="link-icon" data-feather="anchor"></i>
                        <span class="link-title">Manage Complaint</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ in_array(Route::currentRouteName(), $manageComplaintRoutes) ? 'show' : '' }}"
                        id="advancedUI">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('complaints.index') }}"
                                    class="nav-link {{ request()->routeIs('complaints.index') ? 'active' : '' }}">All</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('over_due.index') }}"
                                    class="nav-link {{ request()->routeIs('over_due.index') ? 'active' : '' }}">Over
                                    Due</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('complaints.not_assign') }}"
                                    class="nav-link {{ request()->routeIs('complaints.not_assign') ? 'active' : '' }}">Not
                                    Assigned</a>
                            </li>
                            <!-- Add more with similar logic -->
                        </ul>
                    </div>
                </li>
            @endif

            <!-- Logout -->
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                    <i class="link-icon" data-feather="log-out"></i>
                    <span class="link-title">Log out</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
