<div class="main">
    {!! Theme::partial('search') !!}
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            {!! Theme::widget('nav')->render() !!}
        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：<a href="">杏子资讯</a> > <a href="">杏界新闻</a> > 山杏种子的快速处理技术
        </div>
        <div class="new-list-detail w1100 fb-clearfix">
            <div class="new-list-left">
                <div class="name">{{ $news['title'] }}</div>
                <div class="date">日期：{!! date('Y-m-d',strtotime($news['created_at'])) !!}</div>
                <div class="content">
                    {!! $news['content']  !!}
                </div>
            </div>

            <div class="new-list-right">
                <dl>
                    <dt><p>杏界热点新闻</p></dt>
                    <?php $hot_news_list = app('page_repository')->getPages('news'); $i=1;?>
                    @foreach($hot_news_list as $key => $news)
                        <dd><a href="{{ route('pc.news.show',['id' => $news['id']]) }}">{{ $i }}. {{ $news['title'] }}</a></dd>
                        <?php $i++; ?>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
</div>
