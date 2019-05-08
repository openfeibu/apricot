<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="./">主页</a><span lay-separator="">/</span>
            <a><cite>植物问答</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            {!! Theme::partial('message') !!}
            <div class="fb-main-table">

                <div class="interlocution-detail w1100 fb-clearfix">
                    <div class="main-interlocution-left">
                        <div class="interlocutionCon-detail">
                            <div class="interlocutionCon-title">
                                <span>问</span> {{ $question->title }}
                            </div>
                            <div class="interlocutionCon-des">
                                <span>来自：{{ $question->user_name }}</span>
                                <span>时间：{{ $question->created_at }}</span>
                            </div>
                            <div class="interlocutionCon-con">
                                <p>{!! nl2br($question->content) !!}</p>
                                @foreach($question->images as $image_key => $image)
                                    <img src="{!! $image !!}" alt="">
                                @endforeach
                            </div>
                        </div>
                        <div class="interlocutionCon-common">
                            @foreach($comments as $key => $comment)
                                <div class="interlocutionCon-common-item" id="{{ $comment->id }}">
                                    <div class="img"><img src="{!! avatar($comment->avatar) !!}" alt=""></div>
                                    <div class="test">
                                        <div class="test-top">
                                            <p>{!! $comment->user_name !!}</p>
                                            <span>{{ $comment->created_at }}</span>
                                        </div>
                                        <div class="test-con">
                                            {!! nl2br($comment->content) !!}
                                        </div>
                                        <div class="test-delete">
                                            <button class="layui-btn layui-btn-danger delete_comment_btn">删除评论</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {!! $comments->links('common.pagination') !!}
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
                url: "{{ route('question.store_comment') }}",
                data: {'_token': "{!! csrf_token() !!}", "content": content, 'question_id': "{{ $question->id }}"},
                type: 'post',
                dataType: "json",
                success: function (data) {
                    layer.close(index);
                    if (data.code == 200) {
                        layer.msg(data.msg, {icon: 6});
                        window.location.href = "{{ route('question.show',['id' => $question->id]) }}";
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
                url: "{{ guard_url('question/destroy_comment') }}/"+id,
                data: {'_token': "{!! csrf_token() !!}"},
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