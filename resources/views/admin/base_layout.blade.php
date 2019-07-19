<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    @include('admin.includes.styles')

</head>
<body>
<div class="container-scroller">

    @include('admin.includes.navbar')

    <div class="container-fluid page-body-wrapper">

        @include('admin.includes.sibebar')

        <div class="main-panel">
            <div class="content-wrapper">
                <!-- Page Title Header Starts-->
                <div class="row page-title-header">
                    <div class="col-12">
                        <div class="page-header">
                            <h4 class="page-title">@yield('title')</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom: 25px;">
                    <div class="page-header-toolbar">
                        @yield('toolbar')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->

            @include('admin.includes.footer')
        </div>
    </div>
</div>

@include('admin.includes.scripts')
@yield('scripts')

</body>
</html>
