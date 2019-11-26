<?php $__env->startSection('title'); ?>
    <?php echo e($role ? "Update Role" : "New Role"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo e($role->getName()); ?> Permissions</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open([
                'method' => 'post',
                'route' => ['admin::role.post.permissions', 'roleId' => $role ? $role->getId() : null ]
                ])); ?>

            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Permission</th>
                    <th>Enabled</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $availablePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($permission); ?></td>
                        <td class="text-center" width="10%">
                            <?php echo e(Form::checkbox($permission, 1, $role->hasPermission($permission))); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="form-group" style="margin-top: 20px;">
                <a href="<?php echo e(url(route('admin::role.index'))); ?>" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/roles/editPermissions.blade.php ENDPATH**/ ?>