


<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{ (Route::currentRouteName() == 'admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Users </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="login.html"> Role </a></li>
                        <li><a href="register.html"> Permission </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Blog </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ (Route::currentRouteName() == 'post.index') ? 'ok' : '' }}"><a href="{{ route('post.index') }}">All Post </a></li>
                        <li class="{{ (Route::currentRouteName() == 'post.create') ? 'ok' : '' }}"><a href="{{ route('post.create') }}">Add New Post </a></li>
                        <li class="{{ (Route::currentRouteName()== 'category.index') ? 'ok' : '' }}"><a href="{{ route('category.index') }}"> Category </a></li>
                        <li class="{{ (Route::currentRouteName()== 'tag.index') ? 'ok' : '' }}"><a href="{{ route('tag.index') }}"> Tag </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Product </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="login.html"> Brand </a></li>
                        <li><a href="register.html"> Category </a></li>
                        <li><a href="forgot-password.html"> Tag </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Orders </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="login.html"> Report </a></li>
                        <li><a href="register.html"> Order list </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="login.html"> Report </a></li>
                        <li><a href="register.html"> Order list </a></li>
                    </ul>
                </li>
                <li>
                    <a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->

