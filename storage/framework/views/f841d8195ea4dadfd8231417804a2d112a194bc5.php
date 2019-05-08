
<div class="main">
    <?php echo Theme::partial('search'); ?>

    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            <?php echo Theme::widget('nav')->render(); ?>

        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：科研动态
        </div>
        <div class="research w1100">
            <table>
                <thead>
                <tr>
                    <th style="width: 5%">序号</th>
                    <th style="width: 35%">文献题名</th>
                    <th style="width: 15%">作者</th>
                    <th style="width: 15%">来源</th>
                    <th style="width: 15%">时间</th>
                    <th style="width: 15%">查看文献</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $researches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $research): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td ><?php echo e($research['id']); ?></td>
                    <td ><?php echo e($research['title']); ?></td>
                    <td ><?php echo e($research['author']); ?></td>
                    <td ><?php echo e($research['source']); ?></td>
                    <td ><?php echo e($research['date']); ?></td>
                    <td ><a href="<?php echo e($research['url']); ?>" target="_blank">点击查看</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo $researches->links('common.pagination'); ?>

        </div>

    </div>
</div>

