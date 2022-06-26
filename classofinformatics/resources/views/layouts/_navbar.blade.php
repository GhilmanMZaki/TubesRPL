<nav
    class="{{ Auth::user()->role === 'STUDENT' && Request::is('student/subject/*/course/*/topic/*/*') ? 'navbar navbar-expand-sm top-navbar w-100' : 'navbar navbar-expand-sm top-navbar' }}">
    <div class="container-fluid bg-info">
        <div class="navbar-left">
            <div class="navbar-btn">
                <!-- <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Smart School Logo" width="150px">
                </a> -->
                <button type="button" class="btn-toggle-offcanvas pt-md-2 pt-0"><i
                        class="{{ Auth::user()->role === 'STUDENT' && Request::is('student/subject/*/course/*/topic/*/*') ? 'd-none' : 'lnr lnr-menu fa fa-bars' }}"></i></button>
            </div>
            <ul class="nav navbar-nav pl-0">
                @if (Auth::user()->role === 'STUDENT')
                    <li>
                        @include('layouts.student._nav_menu')
                    </li>
                @endif
            </ul>
        </div>

        <div class="navbar-right d-sm-flex d-block">
            <div id="menu-nav">
                <ul class="nav navbar-nav">
                    <li><a href="#" class="icon-menu js-sweetalert" data-type="confirm-logout"
                            data-toggle="tooltip" data-placement="bottom" title="Keluar"><i class="icon-power"
                                style="color:white"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
</nav>
