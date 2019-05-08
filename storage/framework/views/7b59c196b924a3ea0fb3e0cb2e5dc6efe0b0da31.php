
<div class="main">
    <?php echo Theme::partial('search'); ?>

    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            <?php echo Theme::widget('nav')->render(); ?>

        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：种植资源标本馆 > 标本馆概况
        </div>

        <div class="main-detail w1100 fb-clearfix">
            <div class="main-left">
                <?php echo Theme::widget('nav',['slug' => 'left','template' => 'left_nav'])->render(); ?>

            </div>
            <div class="main-right">
                <div class="herbarium-con">
                    <div class="title"><?php echo e($page['title']); ?></div>
                    <?php echo $page['content']; ?>

                </div>
            </div>

        </div>
    </div>
</div>
