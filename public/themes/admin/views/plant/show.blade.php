<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="./">主页</a><span lay-separator="">/</span>
            <a><cite>{{ $title }}</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            {!! Theme::partial('message') !!}
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url($slug.'/'.$plant['id'])}}" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name"  required  lay-verify="required" autocomplete="off" placeholder="请输入标题" class="layui-input" value="{{ $plant['name'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">简单描述</label>
                        <div class="layui-input-inline">
                            <input type="text" name="intro" autocomplete="off" placeholder="" class="layui-input" value="{{ $plant['intro'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">图片</label>
                        {!! $plant->files('image')
                        ->url($plant->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">中文学名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="chinese_name" autocomplete="off" placeholder="" class="layui-input" value="{{ $plant['chinese_name'] }}">
                        </div>
                        <label class="layui-form-label">目</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input" value="{{ $plant['order'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">拉丁学名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="latin_name" autocomplete="off" placeholder="" class="layui-input" value="{{ $plant['latin_name'] }}">
                        </div>
                        <label class="layui-form-label">亚	目</label>
                        <div class="layui-input-inline">
                            <input type="text" name="suborder" autocomplete="off" placeholder="" class="layui-input" value="{{ $plant['suborder'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">别	称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="another_name" autocomplete="off" placeholder="" class="layui-input" value="{{ $plant['another_name'] }}">
                        </div>
                        <label class="layui-form-label">科</label>
                        <div class="layui-input-inline">
                            <input type="text" name="family" autocomplete="off" placeholder="" class="layui-input" value="{{ $plant['family'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">界</label>
                        <div class="layui-input-inline">
                            <input type="text" name="kingdom" autocomplete="off" placeholder="" class="layui-input" value="{{ $plant['kingdom'] }}">
                        </div>
                        <label class="layui-form-label">亚	科</label>
                        <div class="layui-input-inline">
                            <input type="text" name="subfamily" autocomplete="off" placeholder="" class="layui-input" value="{{ $plant['subfamily'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">门</label>
                        <div class="layui-input-inline">
                            <input type="text" name="phylum" autocomplete="off" placeholder="" class="layui-input" value="{{ $plant['phylum'] }}">
                        </div>
                        <label class="layui-form-label">属</label>
                        <div class="layui-input-inline">
                            <input type="text" name="genus" autocomplete="off" placeholder="" class="layui-input" value="{{ $plant['genus'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">纲</label>
                        <div class="layui-input-inline">
                            <input type="text" name="class" autocomplete="off" placeholder="请输入标题" class="layui-input" value="{{ $plant['class'] }}">
                        </div>
                        <label class="layui-form-label">种</label>
                        <div class="layui-input-inline">
                            <input type="text" name="seed" autocomplete="off" placeholder="请输入标题" class="layui-input" value="{{ $plant['seed'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">亚纲</label>
                        <div class="layui-input-inline">
                            <input type="text" name="subclass" autocomplete="off" placeholder="请输入标题" class="layui-input" value="{{ $plant['subclass'] }}">
                        </div>
                        <label class="layui-form-label">分布区域</label>
                        <div class="layui-input-inline">
                            <input type="text" name="distribution_area" autocomplete="off" placeholder="请输入标题" class="layui-input" value="{{ $plant['distribution_area'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">内容</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="width:1000px;height:240px;">{!! $plant['content'] !!}</script>
                        </div>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                    {!!Form::token()!!}
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                </form>

                    <div class="layui-form-item layui-form-text">

                        <div class="layui-row">
                            <fieldset class="layui-elem-field layui-field-title">
                                <legend>目录</legend>
                            </fieldset>
                            <div class="layui-form-item">
                                <div class="layui-input-inline">
                                    <button type="button" class="layui-btn add-catalogue-btn"  id="add-catalogue-btn">添加目录</button>
                                </div>
                            </div>
                        </div>

                        <div class="layui-collapse"  id="catalogue">
                            @foreach($catalogs as $parent_key => $parent)
                                <div class="layui-colla-item layui-colla-item-parent" style="position: relative">
                                    <h2 class="layui-colla-title layui-colla-top ">
                                        目录名称：{{ $parent['title'] }}
                                    </h2>
                                    <div class="layui-inline" style="position: absolute;right:2px;top:2px;" catalog_id="{{ $parent['id'] }}">
                                        <button type="button" class="layui-btn layui-btn-normal add-catalogue-btn add-catalogue-child-btn" catalog_id="{{ $parent['id'] }}">添加子目录</button>
                                        <button type="button" class="layui-btn layui-btn-normal edit-catalogue-btn" catalog_id="{{ $parent['id'] }}">编辑目录</button>
                                        <button type="button" class="layui-btn layui-btn-warm delete-catalogue-btn" >删除目录</button>
                                    </div>
                                    <div class="layui-colla-content layui-show">
                                        <div class="layui-collapse" >
                                            @if($parent['content'])
                                            <div class="layui-colla-content layui-show">
                                                <div class="parent_content">
                                                    {!! $parent['content'] !!}
                                                </div>
                                            </div>
                                            @endif
                                            @foreach($parent['child'] as $child_key => $child)
                                            <div class="layui-colla-item layui-colla-item-child"  style="position: relative">
                                                <h2 class="layui-colla-title">
                                                    目录名称：{{ $child['title'] }}
                                                </h2>
                                                <div class="layui-inline" style="position: absolute;right:2px;top:2px;" catalog_id="{{ $child['id'] }}" parent_catalog_id="{!! $parent['id'] !!}">
                                                    <button type="button" class="layui-btn layui-btn-normal edit-catalogue-btn" >编辑目录</button>
                                                    <button type="button" class="layui-btn layui-btn-warm delete-catalogue-btn">删除目录</button>
                                                </div>
                                                @if($child['content'])
                                                <div class="layui-colla-content layui-show">
                                                    <div class="child-content">
                                                        {!! $child['content'] !!}
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>



            </div>

        </div>

    </div>
</div>

{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var ue = getUe();
    var catalogue_content = getUeCopy('catalogue_content');
    layui.use(['form','jquery'], function() {
        var form = layui.form;
        var $ = layui.$;
        $(".add-catalogue-btn").click(function(){
            var parent_id = $(this).parent().attr('catalog_id');
            if(!parent_id)
            {
                parent_id = 0;
            }
            layer.open({
                type: 2,
                area: ['1200px','580px'],
                title: '添加目录',
                btn: ['提交', '取消'],
                content: "{{ guard_url($slug.'/catalog/create') }}?parent_id="+parent_id,
                yes: function(index,layero) {
                    var form = layer.getChildFrame('form', index);
                    var title = form.find("input[name='title']").val();
                    var order = form.find("input[name='order']").val();
                    var parent_id = form.find("input[name='parent_id']").val();
                    if(!parent_id)
                    {
                        parent_id = 0;
                    }
                    var iframeWin = window[layero.find('iframe')[0]['name']];
                    var content = iframeWin.getContent();

                    if(title.length <= 0)
                    {
                        layer.msg('目录名称不能为空');
                        return false;
                    }
                    var load = layer.load();
                    $.ajax({
                        url : "{{guard_url($slug.'/catalog/store')}}",
                        data :  {'parent_id':parent_id,'title':title,'content':content,'order':order,'_token':"{!! csrf_token() !!}"},
                        type : 'POST',
                        success : function (data) {
                            layer.close(load);
                            layer.msg('添加成功');
                            window.location.reload();
                        },
                        error : function (jqXHR, textStatus, errorThrown) {
                            layer.close(load);
                            layer.close(index);
                            layer.msg('服务器出错');
                        }
                    });
                },
            });
        });
        $(".edit-catalogue-btn").click(function() {
            var id = $(this).parent().attr('catalog_id');
            layer.open({
                type: 2,
                area: ['1200px', '580px'],
                title: '编辑目录',
                btn: ['提交', '取消'],
                content: "{{ guard_url($slug.'/catalog/show') }}?id=" + id,
                yes: function(index,layero) {
                    var form = layer.getChildFrame('form', index);
                    var title = form.find("input[name='title']").val();
                    var order = form.find("input[name='order']").val();
                    var parent_id = form.find("select[name='parent_id']").val();
                    if(!parent_id)
                    {
                        parent_id = 0;
                    }
                    var iframeWin = window[layero.find('iframe')[0]['name']];
                    var content = iframeWin.getContent();

                    if(title.length <= 0)
                    {
                        layer.msg('目录名称不能为空');
                        return false;
                    }
                    var load = layer.load();
                    $.ajax({
                        url : "{{guard_url($slug.'/catalog/update')}}/"+id,
                        data :  {'parent_id':parent_id,'title':title,'content':content,'order':order,'_token':"{!! csrf_token() !!}"},
                        type : 'POST',
                        success : function (data) {
                            layer.close(load);
                            layer.msg('编辑成功');
                            window.location.reload();
                        },
                        error : function (jqXHR, textStatus, errorThrown) {
                            layer.close(load);
                            layer.close(index);
                            layer.msg('服务器出错');
                        }
                    });
                },

            });
        });
        $(".delete-catalogue-btn").click(function(){
            var id = $(this).parent().attr('catalog_id');
            var parent_catalog_id = $(this).parent().attr('parent_catalog_id');
            if(parent_catalog_id)
            {
                var text = '将删除该目录？';
            }else{
                var text ='将删除该目录及子目录？';
            }

            layer.confirm(text, {icon: 3, title:'提示'}, function(index){
                var load = layer.load();
                $.ajax({
                    url : "{{guard_url($slug.'/catalog/destroy')}}/"+id,
                    data :  {'_token':"{!! csrf_token() !!}"},
                    type : 'delete',
                    success : function (data) {
                        layer.close(load);
                        layer.msg('删除成功');
                        window.location.reload();
                    },
                    error : function (jqXHR, textStatus, errorThrown) {
                        layer.close(load);
                        layer.close(index);
                        layer.msg('服务器出错');
                    }
                });
            });
        });

    });

</script>