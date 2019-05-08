<!-- PC头部 -->
<div class="main">
    <?php echo Theme::partial('search'); ?>

    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            <?php echo Theme::widget('nav')->render(); ?>

        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            <?php echo Theme::widget('current')->render(); ?>

        </div>
        <div class="new-list-detail w1100 fb-clearfix">
            <div class="new-list-left">
                <div class="aName"><?php echo e($plant['name']); ?><?php if($plant['intro']): ?><span>（<?php echo e($plant['intro']); ?>）</span><?php endif; ?></div>
                <div class="content">
                    <div class="content-p">
                        <?php echo $plant['content']; ?>

                    </div>

                    <div class="content-table fb-clearfix">
                        <div class="content-table-item">
                            <label for="">中文学名</label>
                            <span><?php echo e($plant['chinese_name']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">目</label>
                            <span><?php echo e($plant['order']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">拉丁学名</label>
                            <span><?php echo e($plant['latin_name']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">亚	目</label>
                            <span><?php echo e($plant['suborder']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">别	称</label>
                            <span><?php echo e($plant['another_name']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">科</label>
                            <span><?php echo e($plant['family']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">界</label>
                            <span><?php echo e($plant['kingdom']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">亚	科</label>
                            <span><?php echo e($plant['subfamily']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">门</label>
                            <span><?php echo e($plant['phylum']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">属</label>
                            <span><?php echo e($plant['genus']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">纲</label>
                            <span><?php echo e($plant['class']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">种</label>
                            <span><?php echo e($plant['seed']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">亚纲</label>
                            <span><?php echo e($plant['subclass']); ?></span>
                        </div>
                        <div class="content-table-item">
                            <label for="">分布区域</label>
                            <span><?php echo e($plant['distribution_area']); ?></span>
                        </div>
                    </div>
                    <div class="content-ml">
                        <div class="content-ml-item content-ml-item1 fb-inlineBlock">
                            目录
                        </div>
                        <?php $parent_i = 1;$i = 1;  $start = 0;$list_count=0;?>
                        <?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_key => $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $list_count++;?>
                        <?php if(($list_count!=1&&($list_count-1)%4==0)): ?>
                        </div>
                        <?php endif; ?>
                        <?php if(($list_count==1||($list_count-1)%4==0)): ?>
                        <div class="content-ml-item fb-inlineBlock" list_count="<?php echo e($list_count); ?>" is="1">
                        <?php endif; ?>
                            <p><a href="#x<?php echo e($i); ?>" list_count="<?php echo e($list_count); ?>"><?php echo e($parent_i); ?>.<?php echo e($parent['title']); ?></a></p>
                            <?php if($parent['child']): ?>
                            <?php $__currentLoopData = $parent['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_key => $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $i++;$list_count++; ?>
                                    <?php $bool = true;?>
                            <?php if($list_count!=1 && ($list_count-1)%4==0 ): ?>
                            </div>
                            <div class="content-ml-item fb-inlineBlock" list_count="<?php echo e($list_count); ?>" is="2">
                                <?php $bool == false;?>
                            <?php endif; ?>


                            <a href="#x<?php echo e($i); ?>" list_count="<?php echo e($list_count); ?>">- <?php echo e($child['title']); ?></a>
                            

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endif; ?>

                        <?php $parent_i++;$i++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                    </div>
                    <div class="content-con">
                        <?php $i = 1; ?>
                        <?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_key => $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h2 id="x<?php echo e($i); ?>"><?php echo e($parent['title']); ?></h2>
                            <?php if($parent['content']): ?>
                            <div class="x-con">
                                <?php echo $parent['content']; ?>

                            </div>
                            <?php endif; ?>
                            <?php $__currentLoopData = $parent['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_key => $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="x-title" id="x<?php echo e($i); ?>">- <?php echo e($child['title']); ?></div>
                            <div class="x-con">
                                <?php echo $child['content']; ?>

                            </div>
                            <?php $i++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $i++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="new-list-right">
                <div class="proImg">
                    <img src="<?php echo e('/image/original/'.$plant['image']); ?>" alt="">
                </div>
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
