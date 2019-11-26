<?php $__env->startSection('title'); ?>
    Roles
<?php $__env->stopSection(); ?>

<?php $__env->startSection('toolbar'); ?>
    <div class="sort-wrapper">
        <a href="<?php echo e(url(route('admin::role.showForm'))); ?>" class="btn btn-primary toolbar-item">New</a>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="odd gradeX">
                <td><?php echo e($role->getName()); ?></td>
                <td><?php echo e($role->getDescription()); ?></td>
                <td width="25%">
                    <button class="btn btn-warning icon-btn dropdown-toggle"
                            type="button" id="dropdownMenuIconButton1"
                            data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                    </button>
                    <div class="dropdown-menu"
                         aria-labelledby="dropdownMenuIconButton1"
                         x-placement="bottom-start"
                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'role.edit')): ?>
                            <a class="dropdown-item"
                               href="<?php echo e(url(route("admin::role.showForm", ['roleId' => $role->getId()]))); ?>">
                                <i class="mdi mdi-pencil-circle"></i> Edit
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'role.permission.edit')): ?>
                            <a class="dropdown-item"
                               href="<?php echo e(url(route('admin::role.edit.permissions', ['roleId' => $role->getId()]))); ?>">
                                <i class="mdi mdi-pencil-circle"></i> Edit Permissions
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'role.delete')): ?>
                            <a class="dropdown-item delete_item"
                               href="<?php echo e(url(route('admin::role.delete', ['roleId' => $role->getId()]))); ?>">
                                <i class="mdi mdi-trash-can"></i> Delete
                            </a>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/roles/index.blade.php ENDPATH**/ ?>