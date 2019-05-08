<?php $__currentLoopData = $news_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="news-list-item fb-clearfix" >

        <?php echo date_html($news['created_at']); ?>

        <div class="test">
            <div class="name"><?php echo e($news['title']); ?></div>
            <div class="time"><?php echo e(date('Y-m-d',strtotime($news['created_at']))); ?></div>
            <div class="con">
                <?php echo cut_html_str(strip_tags($news['content'],'<img>'),300); ?>

            </div>
            <a href="<?php echo e(route('pc.news.show',['id' => $news['id']])); ?>">阅读全文</a>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>