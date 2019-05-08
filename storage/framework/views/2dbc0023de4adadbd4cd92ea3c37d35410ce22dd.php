<?php if($paginator->hasPages()): ?>
    <div class="page">
        
        <?php if($paginator->onFirstPage()): ?>
            <div class="page-item layui-inline"><a href="javascript:;">第一页</a></div>
        <?php else: ?>
            <div class="page-prev layui-inline"><a href="<?php echo e($paginator->previousPageUrl()); ?>">上一页</a></div>
        <?php endif; ?>
        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <div class="page-item layui-inline active"><a href="javascript:;"><?php echo e($element); ?></a></div>
            <?php endif; ?>
            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <div class="page-item layui-inline active"><a href="javascript:;"><?php echo e($page); ?></a></div>
                    <?php else: ?>
                        <div class="page-item layui-inline "><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($paginator->hasMorePages()): ?>
            <div class="page-next  layui-inline"><a href="<?php echo e($paginator->nextPageUrl()); ?>">下一页</a></div>
        <?php else: ?>
            <div class="page-item  layui-inline"><a href="javascript:;">最后一页</a></div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<!--
<div class="page">
    <div class="page-prev layui-inline"><a href="">上一页</a></div>
    <div class="page-item layui-inline active"><a href="">1</a></div>
    <div class="page-item layui-inline"><a href="">2</a></div>
    <div class="page-item layui-inline"><a href="">3</a></div>
    <div class="page-item layui-inline">...</div>
    <div class="page-item layui-inline"><a href="">16</a></div>
    <div class="page-next layui-inline"><a href="">下一页</a></div>
</div>
-->
