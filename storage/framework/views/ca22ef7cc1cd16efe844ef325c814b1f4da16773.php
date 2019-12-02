<?php $__env->startSection('title'); ?>
    Report
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Report form</h4>

            <?php echo e(Form::open([
               'url'	=>'admin/reports/show',
               'method'	=>  	'get',
               'class'=>"forms-sample"
           ])); ?>

            <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <div class="form-group">

                <?php echo e(Form::label('start', 'start')); ?>

                <?php echo e(Form::text('start',  '2018-12-01', ["class" => "form-control"])); ?>


            </div>
            <div class="form-group">
                <?php echo e(Form::label('stop', 'stop')); ?>

                <?php echo e(Form::text('stop',  '2022-12-02', ["class" => "form-control"])); ?>


            </div>

            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   <?php echo e(Form::label('ts', 'Beacon')); ?></label>
                <div class="col-sm-9">
                    <?php echo e(Form::select('ts',$ts ,'',
                            ['class' => 'form-control selectpicker' ,
                            'required'=>'required']
                        )); ?></div>
            </div>



            <div class="form-group">
                <a href="<?php echo e(url('admin/reports')); ?>" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/reports/form.blade.php ENDPATH**/ ?>