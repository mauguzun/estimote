<?php $__env->startSection('title'); ?>
    <?php echo e($aircraft ? "Manage aircraft" : "New aircraft"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open([
                    'url'	=> $aircraft ? 	['admin/aircrafts',$aircraft->getId()]:['admin/aircrafts'],
                    'method'	=>  	$aircraft ? 'put' : 'post',
                ])); ?>



            <div class="form-group">
                <?php echo e(Form::label('acReg', 'Ac Reg')); ?>

                <?php echo e(Form::text('acReg', $aircraft ? $aircraft->getAcReg() : '', ["class" => "form-control"])); ?>

            </div>


            <div class="form-group">
                <a href="<?php echo e(url('admin/aircrafts')); ?>" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/aircrafts/form.blade.php ENDPATH**/ ?>