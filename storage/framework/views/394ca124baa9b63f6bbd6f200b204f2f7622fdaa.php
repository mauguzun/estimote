<?php $__env->startSection('title'); ?>
    <?php echo e($stand ? "Manage stand" : "New stand"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open([
                    'url'	=> $stand ? 	['admin/stands',$stand->getId()]:['admin/stands'],
                    'method'	=>  	$stand ? 'put' : 'post',
                ])); ?>


            <div class="form-group">
                <?php echo e(Form::label('name', 'Name')); ?>

                <?php echo e(Form::text('name', $stand ? $stand->getName() : '', ["class" => "form-control"])); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('latitude', 'Latitude')); ?>

                <?php echo e(Form::text('latitude', $stand ? $stand->getLatitude() : '', ["class" => "form-control"])); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('longitude', 'Longitude')); ?>

                <?php echo e(Form::text('longitude', $stand ? $stand->getLongitude() : '', ["class" => "form-control"])); ?>

            </div>



            <div class="form-group">
                <a href="<?php echo e(url('admin/stands')); ?>" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/stands/form.blade.php ENDPATH**/ ?>