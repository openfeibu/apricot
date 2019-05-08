<ul class="fb-float-left">
    
    <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="fb-float-left <?php echo e(active_class($item->active)); ?>">
        <a href="<?php echo e($item->url); ?>"><?php echo e($item->name); ?></a>
        <?php if(isset($item->sub) && count($item->sub) > 0): ?>
        <dl>
            <?php $__currentLoopData = $item->sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_key => $sub_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <dd><a href="<?php echo e($sub_item->url); ?>"><?php echo e($sub_item->name); ?></a></dd>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </dl>
        <?php endif; ?>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<div class="mMenu">
    <div class="mMenu-btn"></div>
    <ol class="fb-float-left">
        <div class="mMenu-title">
            <div class="logo">
                <img src="<?php echo url("/image/original".setting('logo')); ?>" alt="">
            </div>
            <div class="closeBtn">

            </div>
        </div>
        
        <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class=" <?php echo e(active_class($item->active)); ?>"><a href="<?php echo e($item->url); ?>"><?php echo e($item->name); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
</div>
<div class="fb-float-right state">

    <?php if(auth()->guard('user.web')->check()): ?>
    <div class="loginSuccess" style="display: block">
        <p><a href="<?php echo e(route('pc.user.index')); ?>"><?php echo e(Auth::user()->name); ?></a></p>
        <a href="<?php echo e(route('pc.logout')); ?>" class="exitBtn">退出</a>
    </div>
    <?php endif; ?>
    <?php if(auth()->guard('user.web')->guest()): ?>
    <a  class="loginBtn">登录</a>
    <a  class="regBtn">注册</a>
    <?php endif; ?>


</div>