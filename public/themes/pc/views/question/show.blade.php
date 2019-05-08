<div class="main">
    {!! Theme::partial('search') !!}
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            {!! Theme::widget('nav')->render() !!}
        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：种植资源标本馆 > <a href="{{ route('pc.question.index') }}">植物问答</a> > 问答内容
        </div>

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
                    <div class="interlocutionCon-common-item">
                        <div class="img"><img src="{!! avatar($comment->avatar) !!}" alt=""></div>
                        <div class="test">
                            <div class="test-top">
                                <p>{!! $comment->user_name !!}</p>
                                <span>{{ $comment->created_at }}</span>
                            </div>
                            <div class="test-con">
                                {!! nl2br($comment->content) !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {!! $comments->links('common.pagination') !!}
                </div>
                <div class="interlocutionCon-answer">
                    <h3>我来回答</h3>
                    @if(Auth::guest())
                    <div class="interlocutionCon-answer-des">
                        回答前请先 <a class="loginBtn">登录</a>，或者 <a class="regBtn">注册</a>
                    </div>
                    @endif
                    <div class="interlocutionCon-answer-form">
                        <form action=""  id="answerForm">
                            <div class="answer-textarea">
                                <textarea name="content" placeholder="说说你的答案，说不定会对他人有帮助哦..."></textarea>
                            </div>
                            <div class="answer-form-btn">
                                <input type="submit" value="发送" @if(Auth::guest()) disabled @endif>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="main-interlocution-right">
                <dl>
                    <dt><p>精选问答</p></dt>
                    <?php $hot_questions = app('question_repository')->getQuestions(); ?>
                    @foreach($hot_questions as $key => $hot_question)
                    <dd><a href="{{ route('pc.question.show',['id' => $hot_question->id]) }}">
                            <div class="img fb-inlineBlock"><img src="{!! avatar($hot_question->avatar) !!}" alt=""></div>
                            <div class="test fb-inlineBlock">{{ $hot_question->title }}</div>
                        </a></dd>
                    @endforeach
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
            url : "{{ route('pc.question.store_comment') }}",
            data : {'_token':"{!! csrf_token() !!}","content":content,'question_id':"{{ $question->id }}"},
            type : 'post',
            dataType : "json",
            success : function (data) {
                $fb.closeLoading();
                $fb.fbNews({content:data.msg});
                if(data.code == 200)
                {
                    window.location.href = "{{ route('pc.question.show',['id' => $question->id]) }}";
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

