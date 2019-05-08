
<div class="main">
    <div class="search">
        <div class="w1100 fb-position-relative">
            <p class="mineTitle">个人中心</p>
        </div>
    </div>
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">

            {!! Theme::widget('nav')->render() !!}
        </div>
    </div>
    <div class="main-detail w1100 fb-clearfix">

        @include('user.left')
        <div class="main-right">
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

    </div>
</div>
