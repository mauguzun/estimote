<?php $__env->startSection('title'); ?>
    Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('toolbar'); ?>
    <div class="sort-wrapper">
        <a href="<?php echo e(url(route('admin::user.showForm'))); ?>" class="btn btn-primary toolbar-item">New</a>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <table class="table">
        <thead>
        <tr>
            <th>Full name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="odd gradeX">
                <td><?php echo e($user->getFullName()); ?></td>
                <td><?php echo e($user->getEmail()); ?></td>
                <td>
                    <?php if($user->getRole() != null): ?>
                        <?php echo e($user->getRole()->getName()); ?> <?php echo e($user->getRole()->getDescription()); ?>

                    <?php else: ?>
                        Role is not assigned to this user yet
                    <?php endif; ?>
                </td>
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
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'user.edit')): ?>
                            <a class="dropdown-item"
                               href="<?php echo e(url(route("admin::role.showForm", ['userId' => $user->getId()]))); ?>">
                                <i class="mdi mdi-pencil-circle"></i> Edit
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'user.user.passwordReset')): ?>
                            <a class="dropdown-item reset_password"
                               href="<?php echo e(url(route("admin::user.resetPassword", ['userId' => $user->getId()]))); ?>">
                                <i class="mdi mdi-key"></i> Reset Password
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'user.delete')): ?>
                            <a class="dropdown-item delete_item"
                               href="<?php echo e(url(route('admin::user.delete', ['userId' => $user->getId()]))); ?>">
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

<?php $__env->startSection('scripts'); ?>
    <script>
        $('.reset_password').click(function () {
            if (confirm("Are you sure want to reset user's password?")) {
                return true
            }

            return false;
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/users/index.blade.php ENDPATH**/ ?>