<div class="footer">
    <div class="footer_nav w980 fb-clearfix">
        <dl class="fb-float-left">
            <dt>杏子资讯</dt>
            <dd><a href="{{ route('pc.culture.index') }}">杏子文化</a></dd>
            <dd><a href="{{ route('pc.news.index') }}">杏界新闻</a></dd>
        </dl>
        <dl class="fb-float-left">
            <dt>杏子种植</dt>
            <dd><a href="{{ route('pc.xinjiang_apricot.index') }}#x1">区域分布</a></dd>
            <dd><a href="{{ route('pc.xinjiang_apricot.index') }}#x2">育种</a></dd>
            <dd><a href="{{ route('pc.xinjiang_apricot.index') }}#x3">栽培</a></dd>
            <dd><a href="{{ route('pc.xinjiang_apricot.index') }}#x4">果园管理</a></dd>
            <dd><a href="{{ route('pc.xinjiang_apricot.index') }}#x5">采收及储藏</a></dd>
        </dl>

        <dl class="fb-float-left">
            <dt>种植资源标本馆</dt>
            <dd><a href="{{ route('pc.about') }}">标本馆概况</a></dd>
            <dd><a href="{{ route('pc.specimen.index') }}">标本鉴赏</a></dd>
            <dd><a href="{{ route('pc.question.index') }}">植物问答</a></dd>
        </dl>
        <dl class="fb-float-left">
            <dt>杏子加工</dt>
            <dd><a href="{{ route('pc.firm.index') }}">杏子企业</a></dd>
            <dd><a href="{{ route('pc.process_flow.index') }}">加工工艺流程</a></dd>
        </dl>
        <dl class="fb-float-left">
            <dt><a href="{{ route('pc.research.index') }}">科研动态</a></dt>
        </dl>
        <dl class="fb-float-left">
            <dt><a href="{{ route('pc.contact.index') }}">联系我们</a></dt>
            <dd>{{ setting('address') }}</dd>
            <dd>{{ setting('tel') }}</dd>
        </dl>
    </div>
    <div class="copy"><i><img src="{!! theme_asset('images/safe.png') !!}" alt=""></i>{{ setting('right') }}</div>
</div>