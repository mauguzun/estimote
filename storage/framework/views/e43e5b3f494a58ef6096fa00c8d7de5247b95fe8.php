<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav" id="l_sidebar">
        <li class="nav-item nav-category">Main Menu</li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'raport.view')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url(route('admin::index'))); ?>">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Reports</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'aircraft.view')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('admin/aircrafts/')); ?>">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Aircrafts</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'device.view')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('admin/devices/')); ?>">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Devices</span>
                </a>
            </li>
        <?php endif; ?>  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'userdevice.view')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('admin/userdevice/')); ?>">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Pick up / Drop off device </span>
                </a>
            </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'apron.view')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('admin/aprons/')); ?>">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Aprons</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'stand.view')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('admin/stands/')); ?>">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Stands</span>
                </a>
            </li> <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'status.view')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('admin/statuses/')); ?>">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Statuses</span>
                </a>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#auth" aria-expanded="false"
               aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Users & Roles</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth" style="">
                <ul class="nav flex-column sub-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'role.view')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url(route('admin::user.index'))); ?>">Users Management</a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-content', 'role.view')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url(route('admin::role.index'))); ?>">Roles Management</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    </ul>
</nav><?php /**PATH /home/vagrant/code/resources/views/admin/includes/sibebar.blade.php ENDPATH**/ ?>