
<div class="main">
    <?php echo Theme::partial('search'); ?>

    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            <?php echo Theme::widget('nav')->render(); ?>

        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：种植资源标本馆 > 植物问答
        </div>

        <div class="interlocution-detail w1100 fb-clearfix">
            <div class="main-interlocution-left">
                <div class="interlocution-tab fb-clearfix">
                    <div class="interlocution-tab-item  <?php if(!$order): ?> active <?php endif; ?>"><a href="<?php echo e(route('pc.question.index')); ?>">全部</a></div>
                    <div class="interlocution-tab-item <?php if($order == 'new'): ?> active <?php endif; ?>"><a href="<?php echo e(route('pc.question.index',['order' => 'new'])); ?>">最新的</a></div>
                    <div class="interlocution-tab-item <?php if($order == 'hot'): ?> active <?php endif; ?>"><a href="<?php echo e(route('pc.question.index',['order' => 'hot'])); ?>">热门的</a></div>
                    <div class="interlocution-tab-btn"><a href="<?php echo e(route('pc.question.create')); ?>">我要提问</a></div>
                </div>
                <div class="interlocution-list">
                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="interlocution-list-item">
                        <a href="<?php echo e(route('pc.question.show',['id' => $question->id])); ?>">
                            <div class="num hasNum">
                                <p><?php echo e($question->comment_num); ?></p>
                                <span>回答</span>
                            </div>
                            <div class="test">
                                <div class="test-top fb-clearfix">
                                    <div class="name fb-float-left"><?php echo e($question->user_name); ?></div><div class="date fb-float-left"><?php echo e($question->created_at); ?></div>
                                </div>
                                <div class="title"><?php echo e($question->title); ?></div>
                                <div class="img fb-clearfix">
                                    <?php $__currentLoopData = $question->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image_key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img src="<?php echo $image; ?>" alt="">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php echo $questions->links('common.pagination'); ?>


            </div>
            <div class="main-interlocution-right">

                <dl>
                    <dt><p>精选问答</p></dt>
                    <?php $hot_questions = app('question_repository')->getQuestions(); ?>
                    <?php $__currentLoopData = $hot_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $hot_question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <dd><a href="<?php echo e(route('pc.question.show',['id' => $hot_question->id])); ?>">
                                <div class="img fb-inlineBlock"><img src="<?php echo avatar($hot_question->avatar); ?>" alt=""></div>
                                <div class="test fb-inlineBlock"><?php echo e($hot_question->title); ?></div>
                            </a></dd>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </dl>
            </div>
        </div>
    </div>
</div>