<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i data-feather="search"></i>
                    </div>
                </div>
                <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
            </div>
        </form>
        <ul class="navbar-nav">

            <li class="nav-item dropdown nav-apps">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="appsDropdown">
                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium">Web Apps</p>
                        <a href="javascript:;" class="text-muted">Edit</a>
                    </div>
                    <div class="dropdown-body">
                        <div class="d-flex align-items-center apps">
                            <a href="pages/apps/chat.html"><i data-feather="message-square"
                                    class="icon-lg"></i>
                                <p>Chat</p>
                            </a>
                            <a href="pages/apps/calendar.html"><i data-feather="calendar"
                                    class="icon-lg"></i>
                                <p>Calendar</p>
                            </a>
                            <a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i>
                                <p>Email</p>
                            </a>
                            <a href="pages/general/profile.html"><i data-feather="instagram"
                                    class="icon-lg"></i>
                                <p>Profile</p>
                            </a>
                        </div>
                    </div>
                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown nav-messages">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="mail"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="messageDropdown">
                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium">9 New Messages</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
                    <div class="dropdown-body">
                        <a href="javascript:;" class="dropdown-item">
                            <div class="figure">
                                <img src="https://via.placeholder.com/30x30" alt="user">
                            </div>
                            <div class="content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>Yaretzi Mayo</p>
                                    <p class="sub-text text-muted">5 hr ago</p>
                                </div>
                                <p class="sub-text text-muted">New record</p>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown nav-notifications">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell"></i>
                    <div class="indicator">
                        <div class="circle"></div>
                    </div>
                </a>
                <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium">6 New Notifications</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
                    <div class="dropdown-body">
                        <a href="javascript:;" class="dropdown-item">
                            <div class="icon">
                                <i data-feather="download"></i>
                            </div>
                            <div class="content">
                                <p>Download completed</p>
                                <p class="sub-text text-muted">6 hrs ago</p>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://media.istockphoto.com/id/1332100919/vector/man-icon-black-icon-person-symbol.jpg?s=612x612&w=0&k=20&c=AVVJkvxQQCuBhawHrUhDRTCeNQ3Jgt0K1tXjJsFy1eg=" alt="user">
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            <img src="{{ Auth::user() && Auth::user()->image ? url('storage/public/profile_images/' . Auth::user()->image) : asset('images/default-profile.png') }}" alt="">
                        </div>
                        <div class="info text-center">
                            <p class="name font-weight-bold mb-0">{{ Auth()->user()->name }}</p>
                            <p class="email text-muted mb-3">{{ Auth()->user()->email }}</p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <li class="nav-item">
                                <a href="{{ route('profile.edit') }} " class="nav-link">
                                    <i data-feather="user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                             
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link">
                                    <i data-feather="log-out"></i>
                                    <span>Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>