<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    @include('includes.styles')

</head>
<body>
<div class="container-scroller">

@include('layouts.navbar')

    <div class="container-fluid page-body-wrapper">

@include('layouts.sibebar')

        <div class="main-panel">

@include ('admin.content.dashboard')

@include('layouts.footer')
        </div>


    </div>

</div>

@include('includes.scripts')

</body>

</html>
