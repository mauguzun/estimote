<?php $__env->startSection('title'); ?>
    Stands
<?php $__env->stopSection(); ?>

<?php $__env->startSection('toolbar'); ?>
    <div class="sort-wrapper">
        <a href="<?php echo e(url('/admin/stands/create')); ?>" class="btn btn-primary toolbar-item">New</a>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>

            <th>Latitude</th>
            <th>Longitude</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $stands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="odd gradeX">
                <td><?php echo e($stand->getName()); ?></td>

                <td><?php echo e($stand->getLatitude()); ?></td><td><?php echo e($stand->getLongitude()); ?></td>
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
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'stand.edit')): ?>
                            <a class="dropdown-item"
                               href="<?php echo e(url('admin/stands/'.$stand->getId().'/edit')); ?>">
                                <i class="mdi mdi-pencil-circle"></i> Edit
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'stand.delete')): ?>
                            <?php echo e(Form::open(['url'=>['admin/stands', $stand->getId()], 'method'=>'delete'])); ?>

                            <button class="dropdown-item delete_item"><i class="mdi mdi-trash-can"></i> Delete</button>
                            <?php echo e(Form::close()); ?>

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

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/stands/index.blade.php ENDPATH**/ ?>