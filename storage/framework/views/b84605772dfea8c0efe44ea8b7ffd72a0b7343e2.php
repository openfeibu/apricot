
    <div class="main-nav-title">标本馆导航</div>
    <div class="main-nav-list fb-clearfix">
        <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="main-nav-item <?php echo e(active_class($item->active)); ?>"><a href="<?php echo e($item->url); ?>"><?php echo e($item->name); ?></a></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
