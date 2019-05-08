<!-- PC头部 -->
<div class="main">
    {!! Theme::partial('search') !!}
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            {!! Theme::widget('nav')->render() !!}
        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            {!! Theme::widget('current')->render() !!}
        </div>
        <div class="new-list-detail w1100 fb-clearfix">
            <div class="new-list-left">
                <div class="aName">{{ $plant['name'] }}@if($plant['intro'])<span>（{{ $plant['intro'] }}）</span>@endif</div>
                <div class="content">
                    <div class="content-p">
                        {!! $plant['content'] !!}
                    </div>

                    <div class="content-table fb-clearfix">
                        <div class="content-table-item">
                            <label for="">中文学名</label>
                            <span>{{ $plant['chinese_name'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">目</label>
                            <span>{{ $plant['order'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">拉丁学名</label>
                            <span>{{ $plant['latin_name'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">亚	目</label>
                            <span>{{ $plant['suborder'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">别	称</label>
                            <span>{{ $plant['another_name'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">科</label>
                            <span>{{ $plant['family'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">界</label>
                            <span>{{ $plant['kingdom'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">亚	科</label>
                            <span>{{ $plant['subfamily'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">门</label>
                            <span>{{ $plant['phylum'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">属</label>
                            <span>{{ $plant['genus'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">纲</label>
                            <span>{{ $plant['class'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">种</label>
                            <span>{{ $plant['seed'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">亚纲</label>
                            <span>{{ $plant['subclass'] }}</span>
                        </div>
                        <div class="content-table-item">
                            <label for="">分布区域</label>
                            <span>{{ $plant['distribution_area'] }}</span>
                        </div>
                    </div>
                    <div class="content-ml">
                        <div class="content-ml-item content-ml-item1 fb-inlineBlock">
                            目录
                        </div>
                        <?php $parent_i = 1;$i = 1;  $start = 0;$list_count=0;?>
                        @foreach($catalogs as $parent_key => $parent)
                        <?php $list_count++;?>
                        @if(($list_count!=1&&($list_count-1)%4==0))
                        </div>
                        @endif
                        @if(($list_count==1||($list_count-1)%4==0))
                        <div class="content-ml-item fb-inlineBlock" list_count="{{ $list_count }}" is="1">
                        @endif
                            <p><a href="#x{{$i}}" list_count="{{ $list_count }}">{{ $parent_i }}.{{ $parent['title'] }}</a></p>
                            @if($parent['child'])
                            @foreach($parent['child'] as $child_key => $child)
                                    <?php $i++;$list_count++; ?>
                                    <?php $bool = true;?>
                            @if($list_count!=1 && ($list_count-1)%4==0 )
                            </div>
                            <div class="content-ml-item fb-inlineBlock" list_count="{{ $list_count }}" is="2">
                                <?php $bool == false;?>
                            @endif


                            <a href="#x{{$i}}" list_count="{{ $list_count }}">- {{ $child['title'] }}</a>


                            @endforeach

                            @endif

                        <?php $parent_i++;$i++; ?>
                        @endforeach
                                </div>
                    </div>
                    <div class="content-con">
                        <?php $i = 1; ?>
                        @foreach($catalogs as $parent_key => $parent)
                            <h2 id="x{{$i}}">{{ $parent['title'] }}</h2>
                            @if($parent['content'])
                            <div class="x-con">
                                {!! $parent['content'] !!}
                            </div>
                            @endif
                            @foreach($parent['child'] as $child_key => $child)
                            <div class="x-title" id="x{{$i}}">- {{ $child['title'] }}</div>
                            <div class="x-con">
                                {!! $child['content'] !!}
                            </div>
                            <?php $i++; ?>
                            @endforeach
                        <?php $i++; ?>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="new-list-right">
                <div class="proImg">
                    <img src="{{ '/image/original/'.$plant['image'] }}" alt="">
                </div>
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
