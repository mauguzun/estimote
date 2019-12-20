

<?php $__env->startSection('title'); ?>
    Aircraft
<?php $__env->stopSection(); ?>

<?php $__env->startSection('toolbar'); ?>
    <div class="sort-wrapper">
        <a href="<?php echo e(url('/admin/aircrafts/create')); ?>" class="btn btn-primary toolbar-item">New</a>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <table class="table">
        <thead>
        <tr>
            <th>Date</th>
            <th>Aircraft</th>
            <th>Stand <small>Only debug</small> </th>
            <th>Device</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $aircrafts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="odd gradeX">

                <td><?= $stand->getAdded()->format('Y-m-d H:i') ?></td>
                <td><?= $stand->getAircraft() ?></td>
                <td><?= $stand->getStand()->getName() ?></td>
                <td><a href="#"><?= $stand->getDevice()->getId()?></a></td>



            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/aircrafts/index.blade.php ENDPATH**/ ?>