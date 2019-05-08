<div class="main">

    <?php echo Theme::partial('search'); ?>

    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            <?php echo Theme::widget('nav')->render(); ?>

        </div>
    </div>
    <div class="banner w1100">
        <div class="swiper-container swiper-container-banner">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide"><a href="<?php if($banner_item['url']): ?><?php echo e($banner_item['url']); ?><?php else: ?> javascript:;<?php endif; ?>"><img src="<?php echo e(url('image/original/'.$banner_item['image'])); ?>" alt=""></a></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- 如果需要分页器 -->
            <div class="swiper-pagination swiper-pagination-banner"></div>

        </div>

    </div>
    <div class="bbSee">
        <div class="w1100">
            <div class="bbSee_con fb-clearfix">
                <?php $plants = app('plant_repository')->getPlantsBySlug('specimen',4); ?>
                <?php $__currentLoopData = $plants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bbSee_con_item fb-transition fb-float-left">
                    <a href="<?php echo e(route('pc.specimen.show',['id' => $plant['id']])); ?>">
                        <div class="img"><img class="fb-transition-1000" src="<?php echo e($plant['image']); ?>" alt=""></div>
                        <div class="text">
                            <p><?php echo e($plant['name']); ?></p>
                            <span class="fb-overflow-2"><?php echo e($plant['popularity']); ?></span>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="more"><a href="<?php echo e(route('pc.specimen.index')); ?>">查看更多</a></div>
        </div>
    </div>
    <div class="news">
        <div class="w1100">
            <div class="imgNews fb-clearfix">
                <?php $recommend_news_list = app('page_repository')->getHomeRecommendPages('news',3);$i = 1;?>
                 <?php $__currentLoopData = $recommend_news_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="imgNews_item imgNews_item<?php echo e($i); ?> fb-position-relative <?php if($i==1): ?> fb-float-left <?php else: ?> fb-float-right <?php endif; ?>">
                    <a href="<?php echo e(route('pc.news.show',['id' => $news['id']])); ?>">
                        <img class="fb-transition-1000" src="<?php echo e(url('image/original/'.$news['image'])); ?>" alt="">
                        <p class="fb-position-absolute fb-overflow-1">[新闻] <?php echo e($news['title']); ?></p>
                    </a>
                </div>
                <?php $i++;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="news_con">

                <div class="swiper-container swiper-container-new">
                    <div class="swiper-wrapper">
                        <?php $new_news_list = app('page_repository')->getPages('news',12);?>
                        <?php $__currentLoopData = $new_news_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="news_con_item fb-transition">
                                <a href="<?php echo e(route('pc.news.show',['id' => $news['id']])); ?>">
                                    <div class="date"><?php echo e(date('Y-m-d',strtotime($news['created_at']))); ?></div>
                                    <div class="name fb-overflow-2">[新闻] <?php echo e($news['title']); ?></div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination swiper-pagination-new"></div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var mySwiper = new Swiper ('.swiper-container-banner', {
        loop: true,

        // 如果需要分页器
        pagination: '.swiper-pagination-banner',
        paginationClickable :true,
    })
    if($(window).width() > 1100){
        var mySwiper = new Swiper ('.swiper-container-new', {

            slidesPerView :'4',
            slidesPerGroup:4,
            paginationClickable :true,
            // 如果需要分页器
            pagination: '.swiper-pagination-new',

        })
    }else{
        var mySwiper = new Swiper ('.swiper-container-new', {

            slidesPerView :'1',
            slidesPerGroup:1,
            paginationClickable :true,
            // 如果需要分页器
            pagination: '.swiper-pagination-new',

        })
    }

</script>