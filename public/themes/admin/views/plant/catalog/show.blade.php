<div id="add-catalogue-content">
    <div class="layui-col-md12">
        <div class="fb-main-table">
            <form class="layui-form" action="{{guard_url('culture/catalog/update/'.$catalog['id'])}}" method="post" method="post" lay-filter="fb-form">

                <div class="layui-form-item">
                    <label class="layui-form-label">所属目录：</label>
                    <div class="layui-input-block" style="z-index: 9999">
                        <select name="parent_id">
                            <option value="0">顶级目录</option>
                            @foreach($top_catalogs as $key => $top_catalog)
                            <option value="{{ $top_catalog['id'] }}" @if($top_catalog['id'] == $catalog['parent_id']) selected @endif>{{ $top_catalog['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">目录标题</label>
                    <div class="layui-input-inline">
                        <input type="text" name="title" autocomplete="off" placeholder="请输入标题" class="layui-input" value="{{ $catalog['title'] }}">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">内容</label>
                    <div class="layui-input-block">
                        <script type="text/plain" id="catalogue_content" name="content" style="width:1000px;height:240px;">{!! $catalog['content'] !!}</script>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">排序</label>
                    <div class="layui-input-inline">
                        <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input" value="{{ $catalog['order'] }}" lay-verify="required">
                    </div>
                    <div class="layui-form-mid layui-word-aux">按升序排序</div>
                </div>
                {!!Form::token()!!}
            </form>
        </div>
    </div>
</div>
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var catalogue_content = getUeCopy('catalogue_content');
    function getContent()
    {
        return catalogue_content.getContent();
    }
</script>