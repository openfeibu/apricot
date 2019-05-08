<div class="search">
    <div class="w1100 fb-position-relative">
        <div class="search_b fb-position-absolute">
            <form action="<?php echo e(route('pc.specimen.index')); ?>" method="get">
                <input type="text" name="name" placeholder="请输入搜索内容" value="<?php if(isset($search_name) && $search_name): ?><?php echo e($search_name); ?><?php endif; ?>"/>
                <input type="submit" value="" />
            </form>
        </div>
    </div>
</div>