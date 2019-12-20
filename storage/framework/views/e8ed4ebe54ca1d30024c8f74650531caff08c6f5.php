<?php $__env->startSection('title'); ?>
    Pick up Device
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open([
                    'url'	=> ['admin/userdevice'],
                    'method'	=>  	$stand ? 'put' : 'post',
                ])); ?>



            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   <?php echo e(Form::label('apron', 'Device')); ?></label>
                <div class="col-sm-9">
                    <?php echo e(Form::select('device_identifier',$devices ,  '',
                            ['class' => 'form-control selectpicker' ,
                            'required'=>'required']
                        )); ?></div>
            </div>

            <div class="form-group">
                <a href="<?php echo e(url('admin/userdevice')); ?>" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/userdevice/form.blade.php ENDPATH**/ ?>