<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo"><b>Admin</b>LTE</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">

                <ul class="nav navbar-nav navbar-right">
                          @if(Auth::user())
                            <li><a href="/auth/logout">Logout</a></li>
                          @else
                            <li><a href="/auth/login">Login</a></li>
                        @endif
                      </ul>


        </div>
    </nav>
</header>