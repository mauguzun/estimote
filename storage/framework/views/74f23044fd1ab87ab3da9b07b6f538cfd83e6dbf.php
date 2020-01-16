<?php $__env->startSection('title'); ?>
    Reports
<?php $__env->stopSection(); ?>

<?php $__env->startSection('toolbar'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <table class="table">
        <thead>
        <tr>
            <th>Time</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Gate</th>
            <th>Aircraft</th>
            <th>Lead time at gate</th>

        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="odd gradeX">
                <td><?= date('d-m-Y H:i', strtotime($item['start'])) ?> </td>
                <td><?= $item['lat']?></td>
                <td><?= $item['lng']?></td>
                <td>
                    <? if($item['name'] ):?>
                    <a target="_blank" href="<?php echo e(url('admin/stands/'.$item['id'].'/edit' )); ?>"><?= $item['name']?></a>
                    <? endif; ?>
                </td>
                <td> I must setup lazy load for this </td>
                <td><?=
                  ( strtotime($item['stop'])- strtotime($item['start'])) / 60   ?>
                min
                </td>


            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>


    <br>
    <br>

    <?php echo $__env->make('admin.reports.map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    <script>

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/reports/index.blade.php ENDPATH**/ ?>