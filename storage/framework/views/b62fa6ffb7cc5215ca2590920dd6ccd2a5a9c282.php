<?php $__env->startSection('title'); ?>
    Beacon Devices
<?php $__env->stopSection(); ?>

<?php $__env->startSection('toolbar'); ?>
    <div class="sort-wrapper">
        <a href="<?php echo e(url('/admin/userdevice/create')); ?>" class="btn btn-primary toolbar-item">New</a>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <table class="table">
        <thead>
        <tr>
            <th>Device Id</th>

            <th>From</th>
            <th>Till</th>

        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $stands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="odd gradeX">
                <td><?php echo e($stand->getDevice()); ?></td>

                <td><?php echo e($stand->getStart()); ?></td>
                <td><?php echo e($stand->getStop()); ?></td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/userdevice/index.blade.php ENDPATH**/ ?>