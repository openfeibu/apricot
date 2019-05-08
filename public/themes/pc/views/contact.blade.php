<div class="main">
    {!! Theme::partial('search') !!}
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            {!! Theme::widget('nav')->render() !!}
        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">

            当前位置：联系我们
        </div>

        <div class="main-detail w1100 fb-clearfix">
            <div class="main-left">
                {!! Theme::widget('nav',['slug' => 'left','template' => 'left_nav'])->render() !!}
            </div>
            <div class="main-right">
                <div class="herbarium-con">
                    <div class="title">联系我们</div>
                    <p>地址：{{ setting('address') }}</p>
                    <p>联系电话：{{ setting('tel') }}</p>
                    <p>邮箱：{{ setting('email') }}</p>
                    <p>联系人：{{ setting('contact') }}</p>
                    <div id="allmap"></div>
                </div>
            </div>

        </div>
    </div>
</div>
<script  src="http://api.map.baidu.com/api?v=2.0&amp;ak=5jCnjnCesElvVDufg6yjGMrlYimVXk5f"></script>
<script>
    var sContent =
            `<h4 style='margin:0 0 5px 0;padding:0.2em 0;font-size:18px'>新疆杏种质资源标本馆</h4>
        <p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em;color:#bbb'>新疆杏种质资源标本馆是一个搭建新疆杏种质资源信息化平台。</p>
        </div>`;
    var map = new BMap.Map("allmap");
    var point = new BMap.Point("{{ setting('longitude') }}","{{ setting('latitude') }}");
    var marker = new BMap.Marker(point);
    map.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
    map.enableScrollWheelZoom();                            //启用滚轮放大缩小
    var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
    map.centerAndZoom(point, 16);
    map.addOverlay(marker);
    map.disable3DBuilding();
    map.centerAndZoom(point, 16);
    // map.setMapStyle({style:'hardedge'});
    marker.openInfoWindow(infoWindow);
</script>

