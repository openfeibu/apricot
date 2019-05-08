
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
                <div class="main-nav-title">标本馆导航</div>
                <div class="main-nav-list fb-clearfix">
                    <div class="main-nav-item active"><a href="aboutHerbarium.html">标本馆概况</a></div>
                    <div class="main-nav-item"><a href="apricotEnterprises.html">杏子企业</a></div>
                    <div class="main-nav-item"><a href="apricotTechnology.html">加工工艺流程</a></div>
                    <div class="main-nav-item"><a href="contact.html">联系我们</a></div>
                </div>
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
