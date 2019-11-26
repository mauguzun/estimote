<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <?php echo $__env->make('admin.includes.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth" style="margin-top: -10%">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo e(Form::open([
                        'method' => 'post',
                        'route' => ['admin::passwordReset', 'userId' => $user->getId() ]
                    ])); ?>

                        <div class="form-group">
                            <?php echo e(Form::label('password', 'Password')); ?>

                            <?php echo e(Form::password('password', ['class' => 'form-control'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('passwordConfirm', 'Confirm Password')); ?>

                            <?php echo e(Form::password('passwordConfirm', ['class' => 'form-control'])); ?>

                        </div>

                    <div class="form-group">
                        <button type="SUBMIT" class="btn btn-success">Submit</button>
                    </div>
                    <?php echo e(Form::close()); ?>


                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<?php echo $__env->make('admin.includes.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH /home/vagrant/code/resources/views/admin/password/resetForm.blade.php ENDPATH**/ ?>