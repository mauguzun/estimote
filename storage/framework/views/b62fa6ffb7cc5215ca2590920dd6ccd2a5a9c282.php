

<?php $__env->startSection('title'); ?>
    Beacon Devices
<?php $__env->stopSection(); ?>

<?php $__env->startSection('toolbar'); ?>
    <div class="sort-wrapper">
        <?php if($in_use ): ?>

            <?php echo e(Form::open(['url'=>['admin/userdevice', $in_use->getId()], 'method'=>'delete'])); ?>

            <button class="btn btn-danger toolbar-item">

                Drop <?= $in_use->getDevice()->getId() ?></button>
            <?php echo e(Form::close()); ?>


        <?php else: ?>
            <a href="<?php echo e(url('/admin/userdevice/create')); ?>" class="btn btn-primary toolbar-item">Pick device</a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <table class="table">
        <thead>
        <tr>
            <th>Device Id</th>

            <th>Start</th>
            <th>Stop</th>

        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $stands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="odd gradeX">
                <td><a href="#"><?= $stand->getDevice()->getId()?></a></td>
                <td><?= $stand->getStart()->format('Y-m-d H:i') ?></td>
                <td><?= $stand->getStop() ? $stand->getStop()->format('Y-m-d H:i') : null ?></td>


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