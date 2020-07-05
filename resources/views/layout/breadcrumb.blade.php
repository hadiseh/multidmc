<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">@yield('breadcrumb')</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@yield('page-header')</h1>
    </div>
</div><!--/.row-->
