@foreach($news_list as $key=> $news)
    <div class="news-list-item fb-clearfix" >

        {!! date_html($news['created_at']) !!}
        <div class="test">
            <div class="name">{{ $news['title'] }}</div>
            <div class="time">{{ date('Y-m-d',strtotime($news['created_at'])) }}</div>
            <div class="con">
                {!! cut_html_str(strip_tags($news['content'],'<img>'),300) !!}
            </div>
            <a href="{{ route('pc.news.show',['id' => $news['id']]) }}">阅读全文</a>
        </div>
    </div>
@endforeach