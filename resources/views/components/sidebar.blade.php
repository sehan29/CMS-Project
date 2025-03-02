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
                    <span class="link-title">Complaint History</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#errorPages" role="button"
                    aria-expanded="false" aria-controls="errorPages">
                    <i class="link-icon" data-feather="log-out"></i>
                    <span class="link-title">Log out</span>
                </a>
            </li>
             
        </ul>
    </div>
</nav>