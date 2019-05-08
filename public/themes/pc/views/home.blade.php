<div class="main">

    {!! Theme::partial('search') !!}
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            {!! Theme::widget('nav')->render() !!}
        </div>
    </div>
    <div class="banner w1100">
        <div class="swiper-container swiper-container-banner">
            <div class="swiper-wrapper">
                @foreach($banners as $key => $banner_item)
                    <div class="swiper-slide"><a href="@if($banner_item['url']){{ $banner_item['url'] }}@else javascript:;@endif"><img src="{{ url('image/original/'.$banner_item['image']) }}" alt=""></a></div>
                @endforeach
            </div>
            <!-- 如果需要分页器 -->
            <div class="swiper-pagination swiper-pagination-banner"></div>

        </div>

    </div>
    <div class="bbSee">
        <div class="w1100">
            <div class="bbSee_con fb-clearfix">
                <?php $plants = app('plant_repository')->getPlantsBySlug('specimen',4); ?>
                @foreach($plants as $key => $plant)
                <div class="bbSee_con_item fb-transition fb-float-left">
                    <a href="{{ route('pc.specimen.show',['id' => $plant['id']]) }}">
                        <div class="img"><img class="fb-transition-1000" src="{{$plant['image'] }}" alt=""></div>
                        <div class="text">
                            <p>{{ $plant['name'] }}</p>
                            <span class="fb-overflow-2">{{ $plant['popularity'] }}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="more"><a href="{{ route('pc.specimen.index') }}">查看更多</a></div>
        </div>
    </div>
    <div class="news">
        <div class="w1100">
            <div class="imgNews fb-clearfix">
                <?php $recommend_news_list = app('page_repository')->getHomeRecommendPages('news',3);$i = 1;?>
                 @foreach($recommend_news_list as $key => $news)
                <div class="imgNews_item imgNews_item{{ $i }} fb-position-relative @if($i==1) fb-float-left @else fb-float-right @endif">
                    <a href="{{ route('pc.news.show',['id' => $news['id']]) }}">
                        <img class="fb-transition-1000" src="{{ url('image/original/'.$news['image']) }}" alt="">
                        <p class="fb-position-absolute fb-overflow-1">[新闻] {{ $news['title'] }}</p>
                    </a>
                </div>
                <?php $i++;?>
                @endforeach
            </div>
            <div class="news_con">

                <div class="swiper-container swiper-container-new">
                    <div class="swiper-wrapper">
                        <?php $new_news_list = app('page_repository')->getPages('news',12);?>
                        @foreach($new_news_list as $key => $news)
                        <div class="swiper-slide">
                            <div class="news_con_item fb-transition">
                                <a href="{{ route('pc.news.show',['id' => $news['id']]) }}">
                                    <div class="date">{{ date('Y-m-d',strtotime($news['created_at'])) }}</div>
                                    <div class="name fb-overflow-2">[新闻] {{ $news['title'] }}</div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination swiper-pagination-new"></div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var mySwiper = new Swiper ('.swiper-container-banner', {
        loop: true,

        // 如果需要分页器
        pagination: '.swiper-pagination-banner',
        paginationClickable :true,
    })
    if($(window).width() > 1100){
        var mySwiper = new Swiper ('.swiper-container-new', {

            slidesPerView :'4',
            slidesPerGroup:4,
            paginationClickable :true,
            // 如果需要分页器
            pagination: '.swiper-pagination-new',

        })
    }else{
        var mySwiper = new Swiper ('.swiper-container-new', {

            slidesPerView :'1',
            slidesPerGroup:1,
            paginationClickable :true,
            // 如果需要分页器
            pagination: '.swiper-pagination-new',

        })
    }

</script>