<?php $__env->startSection('title'); ?>
    <?php echo e($stand ? "Manage device" : "New device"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open([
                    'url'	=> $stand ? 	['admin/devices',$stand->getId()]:['admin/devices'],
                    'method'	=>  	$stand ? 'put' : 'post',
                ])); ?>


            <?php if(!$stand): ?>
            <div class="form-group">
                <?php echo e(Form::label('device_identifier', 'Device identifier')); ?>

                <?php echo e(Form::text('device_identifier', $stand ? $stand->getId() : '', ["class" => "form-control"])); ?>

            </div>
            <?php endif; ?>
            <div class="form-group">
                <?php echo e(Form::label('api_id', 'Api')); ?>

                <?php echo e(Form::text('api_id', $stand ? $stand->getApiId() : '', ["class" => "form-control"])); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('description', 'Description')); ?>

                <?php echo e(Form::text('description', $stand ? $stand->getDescription() : '', ["class" => "form-control"])); ?>

            </div>




            <div class="form-group">
                <a href="<?php echo e(url('admin/stands')); ?>" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/devices/form.blade.php ENDPATH**/ ?>