<div class="main">
    <?php echo Theme::partial('search'); ?>

    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            <?php echo Theme::widget('nav')->render(); ?>

        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：<a href="">杏子资讯</a> > <a href="">杏界新闻</a> > 山杏种子的快速处理技术
        </div>
        <div class="new-list-detail w1100 fb-clearfix">
            <div class="new-list-left">
                <div class="name"><?php echo e($news['title']); ?></div>
                <div class="date">日期：<?php echo date('Y-m-d',strtotime($news['created_at'])); ?></div>
                <div class="content">
                    <?php echo $news['content']; ?>

                </div>
            </div>

            <div class="new-list-right">
                <dl>
                    <dt><p>杏界热点新闻</p></dt>
                    <?php $hot_news_list = app('page_repository')->getPages('news'); $i=1;?>
                    <?php $__currentLoopData = $hot_news_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <dd><a href="<?php echo e(route('pc.news.show',['id' => $news['id']])); ?>"><?php echo e($i); ?>. <?php echo e($news['title']); ?></a></dd>
                        <?php $i++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </dl>
            </div>
        </div>
    </div>
</div>
