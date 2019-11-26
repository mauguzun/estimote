<?php $__env->startSection('title'); ?>
    <?php echo e($item ? "Manage status" : "New status"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open([
                    'url'	=> $item ? 	['admin/statuses',$item->getId()]:['admin/statuses'],
                    'method'	=>  	$item ? 'put' : 'post',
                ])); ?>


            <div class="form-group">
                <?php echo e(Form::label('status', 'Status')); ?>

                <?php echo e(Form::text('status', $item ? $item->getStatus() : '', ["class" => "form-control"])); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('description', 'Description')); ?>

                <?php echo e(Form::text('description', $item ? $item->getDescription() : '', ["class" => "form-control"])); ?>

            </div>


            <div class="form-group">
                <a href="<?php echo e(url('admin/statuses')); ?>" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/statuses/form.blade.php ENDPATH**/ ?>