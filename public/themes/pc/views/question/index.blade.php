
<div class="main">
    {!! Theme::partial('search') !!}
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            {!! Theme::widget('nav')->render() !!}
        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：种植资源标本馆 > 植物问答
        </div>

        <div class="interlocution-detail w1100 fb-clearfix">
            <div class="main-interlocution-left">
                <div class="interlocution-tab fb-clearfix">
                    <div class="interlocution-tab-item  @if(!$order) active @endif"><a href="{{ route('pc.question.index') }}">全部</a></div>
                    <div class="interlocution-tab-item @if($order == 'new') active @endif"><a href="{{ route('pc.question.index',['order' => 'new']) }}">最新的</a></div>
                    <div class="interlocution-tab-item @if($order == 'hot') active @endif"><a href="{{ route('pc.question.index',['order' => 'hot']) }}">热门的</a></div>
                    <div class="interlocution-tab-btn"><a href="{{ route('pc.question.create') }}">我要提问</a></div>
                </div>
                <div class="interlocution-list">
                    @foreach($questions as $key => $question)
                    <div class="interlocution-list-item">
                        <a href="{{ route('pc.question.show',['id' => $question->id]) }}">
                            <div class="num hasNum">
                                <p>{{ $question->comment_count }}</p>
                                <span>回答</span>
                            </div>
                            <div class="test">
                                <div class="test-top fb-clearfix">
                                    <div class="name fb-float-left">{{ $question->user_name }}</div><div class="date fb-float-left">{{ $question->created_at }}</div>
                                </div>
                                <div class="title">{{ $question->title }}</div>
                                <div class="img fb-clearfix">
                                    @foreach($question->images as $image_key => $image)
                                    <img src="{!! $image !!}" alt="">
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                {!! $questions->links('common.pagination') !!}

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