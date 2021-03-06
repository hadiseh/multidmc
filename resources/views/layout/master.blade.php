<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layout.header')
@php
    use App\Demand;
   $request_count = Demand::where('status','=','waiting')->count();
@endphp
<body>
<style>
    .request-notification {
        top: 10px;
        left: 260px;
        position: absolute;
        border-radius: 9999px;
        background-color: red;
        display: inline;
        padding: .3em .6em .3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        /*border-radius: .40em;*/
    }
</style>

@guest
    <style>body{padding-top: 0}</style>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
            <div >
                get started with your account
            </div>

                    <a class="nav-link btn btn-primary" href="{{ route('login') }}" >{{ __('Login') }}</a>

                @if (Route::has('register'))

                        <a class="nav-link btn btn-danger" href="{{ route('register') }}">{{ __('Register') }}</a>

                @endif

            </div>
        </div>
    </div>



@else
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="{{ route('dashboard') }}"><span>MULTI DMC</span>Admin</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">3 mins ago</small>
                                        <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                                        <br/><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">1 hour ago</small>
                                        <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                        <br/><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="all-button"><a href="#">
                                        <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                    </a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-bell"></em><span class="label label-info">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><a href="#">
                                    <div><em class="fa fa-envelope"></em> 1 New Message
                                        <span class="pull-right text-muted small">3 mins ago</span></div>
                                </a></li>
                            <li class="divider"></li>
                            <li><a href="#">
                                    <div><em class="fa fa-heart"></em> 12 New Likes
                                        <span class="pull-right text-muted small">4 mins ago</span></div>
                                </a></li>
                            <li class="divider"></li>
                            <li><a href="#">
                                    <div><em class="fa fa-user"></em> 5 New Followers
                                        <span class="pull-right text-muted small">4 mins ago</span></div>
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{ Auth::user()->name }} </div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">

        <li class="active"><a href="{{ route('dashboard') }}"><em
                    class="fa fa-dashboard">&nbsp;</em> {{ __('dashboard') }}</a></li>

                <li><a href="{{ route('language.index') }}"><em class="fa fa-calendar">&nbsp;</em> List of Language </a></li>
        {{--        <li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>--}}
        {{--        <li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>--}}
        {{--        <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>--}}
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em> Request <span data-toggle="collapse" href="#sub-item-1"
                                                                    class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="{{ route('demand.create') }}">
                        <span class="fa fa-arrow-right">&nbsp;</span> Create New Request
                    </a></li>
                <li style="position: relative"><a class="" href="{{ route('demand.index') }}">
                        <span class="fa fa-arrow-right">&nbsp;</span> List Of Requests
                    </a>

                        <span class="request-notification">
                        {{ $request_count ?? null}}
                    </span>


                </li>


            </ul>
        </li>
{{--        <li>--}}
{{--         --}}
{{--            <a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a>--}}
{{--        </li>--}}

            <li class="">


                    <a class="" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <em class="fa fa-power-off">&nbsp;</em>  {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

            </li>

    </ul>
</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    @include('layout.breadcrumb')

    @yield('content')

</div>    <!--/.main-->
@endguest

@include('layout.footer')

</body>
</html>
