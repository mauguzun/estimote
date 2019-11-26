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
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth" style="margin-top: -10%">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    @include('admin.includes._form_errors')
                    {{ Form::open([
                        'method' => 'post',
                        'route' => ['admin::passwordReset', 'userId' => $user->getId() ]
                    ])}}
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('passwordConfirm', 'Confirm Password') }}
                            {{ Form::password('passwordConfirm', ['class' => 'form-control']) }}
                        </div>

                    <div class="form-group">
                        <button type="SUBMIT" class="btn btn-success">Submit</button>
                    </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

@include('admin.includes.scripts')

</body>
</html>
