
<div class="main">
    {!! Theme::partial('search') !!}
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            {!! Theme::widget('nav')->render() !!}
        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：科研动态
        </div>
        <div class="research w1100">
            <table>
                <thead>
                <tr>
                    <th style="width: 5%">序号</th>
                    <th style="width: 35%">文献题名</th>
                    <th style="width: 15%">作者</th>
                    <th style="width: 15%">来源</th>
                    <th style="width: 15%">时间</th>
                    <th style="width: 15%">查看文献</th>
                </tr>
                </thead>
                <tbody>
                @foreach($researches as $key => $research)
                <tr>
                    <td >{{ $research['id'] }}</td>
                    <td >{{ $research['title'] }}</td>
                    <td >{{ $research['author'] }}</td>
                    <td >{{ $research['source'] }}</td>
                    <td >{{ $research['date'] }}</td>
                    <td ><a href="{{ $research['url'] }}" target="_blank">点击查看</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {!! $researches->links('common.pagination') !!}
        </div>

    </div>
</div>

