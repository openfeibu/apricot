
<div class="main">
    <div class="search">
        <div class="w1100 fb-position-relative">
            <p class="mineTitle">个人中心</p>
        </div>
    </div>
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">

            <?php echo Theme::widget('nav')->render(); ?>

        </div>
    </div>
    <div class="main-detail w1100 fb-clearfix">

        <?php echo $__env->make('user.left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="main-right">
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

    </div>
</div>
