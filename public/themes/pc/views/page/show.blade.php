
<div class="main">
    {!! Theme::partial('search') !!}
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            {!! Theme::widget('nav')->render() !!}
        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：种植资源标本馆 > 标本馆概况
        </div>

        <div class="main-detail w1100 fb-clearfix">
            <div class="main-left">
                {!! Theme::widget('nav',['slug' => 'left','template' => 'left_nav'])->render() !!}
            </div>
            <div class="main-right">
                <div class="herbarium-con">
                    <div class="title">{{ $page['title'] }}</div>
                    {!! $page['content'] !!}
                </div>
            </div>

        </div>
    </div>
</div>
