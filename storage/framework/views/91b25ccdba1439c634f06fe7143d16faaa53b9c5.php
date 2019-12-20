<?php $__env->startSection('title'); ?>
    Add aircraft
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open([
                    'url'	=> 'admin/aircrafts',
                    'method'	=>  	'post'
                ])); ?>

            <div class="form-group">
                <?php echo e(Form::label('aircraft', 'Aircraft')); ?>

                <?php echo e(Form::text('aircraft','', ["class" => "form-control"])); ?>

            </div>

            <p>Only on debug,in real life driver can`t choose time </p>

            <div class="form-group">
                <?php echo e(Form::label('added', 'Added')); ?>

                <?php echo e(Form::text('added',date("Y-m-d H:i:s"), ["class" => "form-control"])); ?>

            </div>
            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   <?php echo e(Form::label('apron', 'Apron')); ?></label>
                <div class="col-sm-9">
                    <?php echo e(Form::select('stand',$stands,
                             '',
                            ['class' => 'form-control selectpicker' ,
                            'required'=>'required']
                        )); ?></div>
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