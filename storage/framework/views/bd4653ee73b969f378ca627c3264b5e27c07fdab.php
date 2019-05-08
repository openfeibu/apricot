<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="./">主页</a><span lay-separator="">/</span>
            <a><cite>植物问答</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <?php echo Theme::partial('message'); ?>

            <div class="fb-main-table">

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
                                <div class="interlocutionCon-common-item" id="<?php echo e($comment->id); ?>">
                                    <div class="img"><img src="<?php echo avatar($comment->avatar); ?>" alt=""></div>
                                    <div class="test">
                                        <div class="test-top">
                                            <p><?php echo $comment->user_name; ?></p>
                                            <span><?php echo e($comment->created_at); ?></span>
                                        </div>
                                        <div class="test-con">
                                            <?php echo nl2br($comment->content); ?>

                                        </div>
                                        <div class="test-delete">
                                            <button class="layui-btn layui-btn-danger delete_comment_btn">删除评论</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $comments->links('common.pagination'); ?>

                        </div>
                        <div class="interlocutionCon-answer">
                            <h3>我来回答</h3>
                            <div class="interlocutionCon-answer-form">
                                <form action=""  id="answerForm">
                                    <div class="answer-textarea">
                                        <textarea name="content" placeholder="说说你的答案，说不定会对他人有帮助哦..." required  lay-verify="required"></textarea>
                                    </div>
                                    <div class="answer-form-btn">
                                        <button type="button" value="发送" id="answer_btn" class="layui-btn">立即提交</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
<script>
    layui.use(['jquery','element','table'], function() {
        var $ = layui.$;
        $("#answer_btn").click(function(){
            $form = $("#answerForm");
            var content = $($form).find("textarea[name='content']").val();
            var index = layer.load(1);
            $.ajax({
                url: "<?php echo e(route('question.store_comment')); ?>",
                data: {'_token': "<?php echo csrf_token(); ?>", "content": content, 'question_id': "<?php echo e($question->id); ?>"},
                type: 'post',
                dataType: "json",
                success: function (data) {
                    layer.close(index);
                    if (data.code == 200) {
                        layer.msg(data.msg, {icon: 6});
                        window.location.href = "<?php echo e(route('question.show',['id' => $question->id])); ?>";
                    }else{
                        layer.msg(data.msg, {icon: 5});
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    layer.close(index);
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message = responseText.msg;
                    if (!message) {
                        message = "服务器出错了！";
                    }
                    layer.msg(message, {icon: 5});
                }
            });
            return false;
        });
        $(".delete_comment_btn").click(function(){
            var id = $(this).parents(".interlocutionCon-common-item").attr("id");
            var index = layer.load(1);
            $.ajax({
                url: "<?php echo e(guard_url('question/destroy_comment')); ?>/"+id,
                data: {'_token': "<?php echo csrf_token(); ?>"},
                type: 'delete',
                dataType: "json",
                success: function (data) {
                    layer.close(index);
                    if (data.code == 200) {
                        layer.msg(data.msg, {icon: 6});
                        window.location.reload();
                    }else{
                        layer.msg(data.msg, {icon: 5});
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    layer.close(index);
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message = responseText.msg;
                    if (!message) {
                        message = "服务器出错了！";
                    }
                    layer.msg(message, {icon: 5});
                }
            });
            return false;
        })
    })
</script>