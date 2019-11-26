<?php $__env->startSection('title'); ?>
    <?php echo e($user ? "Manage User" : "New User"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open([
                'method' => 'post',
                'route' => ['admin::user.post', 'userId' => $user ? $user->getId() : null ]
                ])); ?>

            <div class="form-group">
                <?php echo e(Form::label('email', 'Email')); ?>

                <?php if($user): ?>
                    <p class="form-control-static"><?php echo e($user->getEmail()); ?></p>
                <?php else: ?>
                    <?php echo e(Form::text('email', $user ? $user->getEmail() : '', ["class" => "form-control"])); ?>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('name', 'Name')); ?>

                <?php echo e(Form::text('name', $user ? $user->getName() : '', ["class" => "form-control"])); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('lastname', 'Lastname')); ?>

                <?php echo e(Form::text('lastname', $user ? $user->getLastname() : '', ["class" => "form-control"])); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('role', 'Role')); ?>

                <?php echo e(Form::select('role', $roles,
                        $user && $user->getRole() ? $user->getRole()->getId() : '',
                        ['class' => 'form-control selectpicker']
                    )); ?>

            </div>

            <div class="form-group">
                <a href="<?php echo e(url(route('admin::user.index'))); ?>" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/users/form.blade.php ENDPATH**/ ?>