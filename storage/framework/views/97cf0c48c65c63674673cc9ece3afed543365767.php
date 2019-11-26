<?php $__currentLoopData = ['success','danger']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(Session::has($value)): ?>
        <div class="alert alert-<?php echo e($value); ?> alert-dismissable form-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo e(Session::get($value)); ?>

        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/vagrant/code/resources/views/admin/includes/_form_response_messages.blade.php ENDPATH**/ ?>