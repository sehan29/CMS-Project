
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
                        <i class="link-icon" data-feather="monitor"></i>
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
                    <a class="nav-link" role="button" aria-expanded="true" aria-controls="emails">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Manage Users</span>
                    </a>
                    <div class="collapse show" id="emails">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('sub_officer') }}"
                                   class="nav-link {{ request()->routeIs('sub_officer') ? 'active' : '' }}">
                                    Subject Officer
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer.index') }}"
                                   class="nav-link {{ request()->routeIs('customer.index') ? 'active' : '' }}">
                                    Customers
                                </a>
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

                <li class="nav-item {{ request()->is('admin/complaint_report') ? 'active' : '' }}">
                    <a href="{{ route('complaint_report.index') }}"
                       class="nav-link {{ request()->is('admin/complaint_report') ? 'active' : '' }}">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Complaint Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" role="button" aria-expanded="true" aria-controls="advancedUI">
                        <i class="link-icon" data-feather="anchor"></i>
                        <span class="link-title">Manage Complaint</span>
                    </a>
                    <div class="collapse show" id="advancedUI">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('complaints.index') }}"
                                    class="nav-link {{ request()->routeIs('complaints.index') ? 'active' : '' }}">
                                    All
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('over_due.index') }}"
                                    class="nav-link {{ request()->routeIs('over_due.index') ? 'active' : '' }}">
                                    Over Due
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('complaints.not_assign') }}"
                                    class="nav-link {{ request()->routeIs('complaints.not_assign') ? 'active' : '' }}">
                                    Not Assigned
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href=" {{ route('admin.complaints.reconsideration_complaint') }}"
                                    class="nav-link {{ request()->routeIs('admin.complaints.reconsideration_complaint') ? 'active' : '' }}">
                                    Requested Reconsideration                                
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ request()->is('admin/search') ? 'active' : '' }}">
                    <a href="{{ route('search.search_user') }}" class="nav-link {{ request()->routeIs('search.search_user') ? 'active' : '' }}">
                        <i class="link-icon" data-feather="search"></i>
                        <span class="link-title">Search User</span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('admin/complaint_search') ? 'active' : '' }}">
                    <a href="{{ route('admin.complaint.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="search"></i>
                        <span class="link-title">Search Complaint</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 3)

            <li class="nav-item">
                <a href="{{ route('sub') }} " class="nav-link">
                    <i class="link-icon" data-feather="monitor"></i>
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
                <a class="nav-link" role="button" aria-expanded="true" aria-controls="advancedUI">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Manage Complaint</span>
                </a>
                <div class="collapse show" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href=" {{ route('subject_officer.all_complaints') }} "
                                class="nav-link {{-- {{ request()->routeIs('complaints.index') ? 'active' : '' }} --}}">
                                All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subject_officer.over_complaints') }}"
                                class="nav-link {{-- {{ request()->routeIs('over_due.index') ? 'active' : '' }} --}}">
                                Over Due
                            </a>
                        </li>
                    
                        <li class="nav-item">
                            <a href=" {{ route('subject_officer.reconsideration_complaint') }}"
                                class="nav-link {{-- {{ request()->routeIs('admin.complaints.reconsideration_complaint') ? 'active' : '' }} --}}">
                                Requested Reconsideration                                
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subject_officer.closed') }}"
                                class="nav-link {{-- {{ request()->routeIs('over_due.index') ? 'active' : '' }} --}}">
                                Closed Complaints
                            </a>
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

            <li class="nav-item {{ request()->is('sub/sub_complaint_report') ? 'active' : '' }}">
                <a href="{{ route('subject_officer.sub_complaint_report') }}"
                   class="nav-link {{ request()->is('sub/sub_complaint_report') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Complaint Reports</span>
                </a>
            </li>

            <li class="nav-item {{-- {{ request()->is('admin/complaint_search') ? 'active' : '' }} --}}">
                <a href="{{-- {{ route('admin.complaint.index') }} --}}" class="nav-link">
                    <i class="link-icon" data-feather="search"></i>
                    <span class="link-title">Search Complaint</span>
                </a>
            </li>

            @endif



            <!-- Logout -->
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="confirmLogout(event)">
                    <i class="link-icon" data-feather="log-out"></i>
                    <span class="link-title">Log out</span>
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>

<script>
$(document).ready(function() {
    $('.nav-link[onclick]').click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to log out?',
/*             text: "Are you sure you want to log out?",
 */            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log out!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
});
</script>
