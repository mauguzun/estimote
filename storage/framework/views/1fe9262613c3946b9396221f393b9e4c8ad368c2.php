<?php $__env->startSection('title'); ?>
    <?php echo e($item ? "Manage raport" : "New raport"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Report form</h4>

            <?php echo e(Form::open([
               'url'	=> $item ? 	['admin/raports',$item->getId()]:['admin/raports'],
               'method'	=>  	$item ? 'put' : 'post',
                'class'=>"forms-sample"
           ])); ?>

            <?php echo $__env->make('admin.includes._form_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.includes._form_response_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">ETA</label>
                <div class="col-sm-9">
                    <input type="text" name="eta"
                           value=" <?=  $item ? $item->getEta() : date('H:i') ?>"
                           class="form-control timepicker" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   <?php echo e(Form::label('tail', 'Aircraft')); ?></label>
                <div class="col-sm-9">
                    <?php echo e(Form::select('tail', $aircrafts,
                            $item && $item->getTail() ? $item->getTail()->getId() : '',
                            [
                                'class' => 'form-control selectpicker' ,
                                'data-live-search'=>'true',
                                'required'=>'required'
                            ]
                        )); ?></div>
            </div>

            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   <?php echo e(Form::label('status', 'Status')); ?></label>
                <div class="col-sm-9">
                    <?php echo e(Form::select('status', $statuses,
                            $item && $item->getStatus() ? $item->getStatus()->getId() : '',
                            ['class' => 'form-control selectpicker' ,
                            'required'=>'required']
                        )); ?></div>
            </div>

            <div class="form-group row">
                <label for="exampleInputPassword2"
                       class="col-sm-3 col-form-label">   <?php echo e(Form::label('stand', 'Stand')); ?></label>
                <div class="col-sm-9">
                    <?php echo e(Form::select('stand', $stands,
                            $item && $item->getStand() ? $item->getStand()->getId() : '',
                            ['class' => 'form-control selectpicker' ,
                            'required'=>'required']
                        )); ?></div>
            </div>


            <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Comment</label>
                <div class="col-sm-9">
                    <textarea class="form-group" rows="3" name="comment"></textarea>
                </div>
            </div>
            <div class="form-group">
                <a href="<?php echo e(url('admin/raports')); ?>" class="btn btn-default">Cancel</a>
                <button type="SUBMIT" class="btn btn-success">Submit</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('admin.base_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/raports/form.blade.php ENDPATH**/ ?>