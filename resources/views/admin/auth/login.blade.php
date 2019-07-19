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
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    @include('admin.includes._form_response_messages')
                    <div class="auto-form-wrapper">
                        <form action="{{ url(route('admin::postLogin')) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="label">Email</label>
                                <div class="input-group">
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Username"
                                           id="username"
                                           name="email"
                                           required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="label">Password</label>
                                <div class="input-group">
                                    <input type="password"
                                           class="form-control"
                                           placeholder="*********"
                                           id="pwd"
                                           name="password"
                                           required>
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                      <i class="mdi mdi-check-circle-outline"></i>
                                    </span>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary submit-btn btn-block" id="login_button">Login</button>
                            </div>
                        </form>
                    </div>
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
