
<div class="main">
    {!! Theme::partial('search') !!}
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            {!! Theme::widget('nav')->render() !!}
        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：种植资源标本馆 > 标本鉴赏
        </div>
        <div class="list_con fb-waterfall-con fb-position-relative" >

        </div>

    </div>
</div>

<script>

    var goods_list = {};
    var page = 1;
    @foreach($plants as $key => $plant)
     goods_list["{{$plant['id']}}"] = {
        "name":"{{ $plant['name'] }}",
        "img":"{{ $plant['image'] }}",
        "href": "{{ route('pc.specimen.show',['id' => $plant['id']]) }}",
        "width": "{{ $plant['width'] }}",
        "height": parseFloat("{{ $plant['height'] }}") + 130,
        "popularity": "{{ $plant['popularity'] }}",
    };
    @endforeach

    $fb.waterfall({
        "el":".list_con",
        "margin":32,
        'width':252,
        'maxColumn':4,
        'data':goods_list
    });
    $fb.monitorBottom({
        bottom:100,
        arriveFun:function(){
            page++;
            $fb.loading({content:"加载中"});
            $.ajax({
                url : "{{ route('pc.specimen.index') }}",
                data : {'page':page},
                type : 'get',
                dataType : "json",
                success : function (data) {
                    $fb.closeLoading();
                    var goods_list2 = {};
                    var list = data.data;
                    for ( var i = 0; i <list.length; i++){
                        goods_list2[list[i].id] = {
                            "name":list[i].name,
                            "img":list[i].image,
                            "href": "{{ url('specimen/show') }}"+"/"+list[i].id,
                            "width": list[i].width,
                            "height": parseFloat(list[i].height)+130,
                            "popularity": list[i].popularity
                        };
                    }
                    if(!$.isEmptyObject(goods_list2))
                    {
                        $fb.waterfall({
                            "el":".list_con",
                            "margin":32,
                            'width':252,
                            'maxColumn':4,
                            'data':goods_list2
                        });
                        $fb.monitorBottom.again();
                    }else{
                        $fb.fbNews({content:"已经到底了"});
                        return false;
                    }

                },
                error : function (jqXHR, textStatus, errorThrown) {
                    $fb.closeLoading();
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                    $fb.fbNews({content:message,type:'warning'});
                }
            });
        }
    });
</script>

