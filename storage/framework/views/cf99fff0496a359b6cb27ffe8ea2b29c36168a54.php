<div class="main">
    <?php echo Theme::partial('search'); ?>

    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            <?php echo Theme::widget('nav')->render(); ?>

        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：种植资源标本馆 > <a href="<?php echo e(route('pc.question.index')); ?>">植物问答</a> > 问答内容
        </div>

        <div class="interlocution-detail w1100 fb-clearfix">
            <div class="main-interlocution-left">
                <div class="interlocutionCon-detail">
                    <div class="interlocutionCon-title">
                        <span>问</span> <?php echo e($question->title); ?>

                    </div>
                    <div class="interlocutionCon-des">
                        <span>来自：<?php echo e($question->user_name); ?></span>
                        <span>时间：<?php echo e($question->created_at); ?></span>
                    </div>
                    <div class="interlocutionCon-con">
                        <p><?php echo nl2br($question->content); ?></p>
                        <?php $__currentLoopData = $question->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image_key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo $image; ?>" alt="">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="interlocutionCon-common">
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="interlocutionCon-common-item">
                        <div class="img"><img src="<?php echo avatar($comment->avatar); ?>" alt=""></div>
                        <div class="test">
                            <div class="test-top">
                                <p><?php echo $comment->title; ?></p>
                                <span><?php echo e($comment->created_at); ?></span>
                            </div>
                            <div class="test-con">
                                <?php echo nl2br($comment->content); ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $comments->links('common.pagination'); ?>

                </div>
                <div class="interlocutionCon-answer">
                    <h3>我来回答</h3>
                    <?php if(Auth::guest()): ?>
                    <div class="interlocutionCon-answer-des">
                        回答前请先 <a class="loginBtn">登录</a>，或者 <a class="regBtn">注册</a>
                    </div>
                    <?php endif; ?>
                    <div class="interlocutionCon-answer-form">
                        <form action=""  id="answerForm">
                            <div class="answer-textarea">
                                <textarea name="content" placeholder="说说你的答案，说不定会对他人有帮助哦..."></textarea>
                            </div>
                            <div class="answer-form-btn">
                                <input type="submit" value="发送" <?php if(Auth::guest()): ?> disabled <?php endif; ?>>
                            </div>
                        </form>
                    </div>
                </div>
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

<script>
    $fb("#answerForm").formValidator([
        {
            name:'content',
            rules:'required',
            display:"内容不可为空",
        }
    ],function($form){
        var content = $($form).find("textarea[name='content']").val();
        $fb.loading({content:"提交中"});
        $.ajax({
            url : "<?php echo e(route('pc.question.store_comment')); ?>",
            data : {'_token':"<?php echo csrf_token(); ?>","content":content,'question_id':"<?php echo e($question->id); ?>"},
            type : 'post',
            dataType : "json",
            success : function (data) {
                $fb.closeLoading();
                $fb.fbNews({content:data.msg});
                if(data.code == 200)
                {
                    window.location.href = "<?php echo e(route('pc.question.show',['id' => $question->id])); ?>";
                }
            },
            error : function (jqXHR, textStatus, errorThrown) {
                $fb.closeLoading();
                responseText = $.parseJSON(jqXHR.responseText);
                var message =  responseText.msg;
                if(!message)
                {
                    message = "服务器出错了！";
                }
                $fb.fbNews({content:message,type:'warning'});
            }
        });
        return false;
    })
</script>

