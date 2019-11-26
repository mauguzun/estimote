<?php $__env->startSection('title'); ?>
    <?php echo e($role ? "Update Role" : "New Role"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open([
                'method' => 'post',
                'route' => ['admin::role.post', 'roleId' => $role ? $role->getId() : null ]
                ])); ?>

            <div class="form-group">
                <?php echo e(Form::label('name', 'Name')); ?>

                <?php echo e(Form::text('name', $role ? $role->getName() : '', ["class" => "form-control"])); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('description', 'Description')); ?>

                <?php echo e(Form::text('description', $role ? $role->getDescription() : '', ["class" => "form-control"])); ?>

            </div>

            <div class="form-group">
                <a href="<?php echo e(url(route('admin::role.index'))); ?>" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/roles/form.blade.php ENDPATH**/ ?>