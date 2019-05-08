<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="﻿{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>{{ trans('research.name') }}</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            {!! Theme::partial('message') !!}
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('research/'.$research->id)}}" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">文献题名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title"  required  lay-verify="required"  autocomplete="off" placeholder="请输入文献题名" class="layui-input" value="{{ $research['title'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">作者</label>
                        <div class="layui-input-inline">
                            <input type="text" name="author" required  lay-verify="required"  autocomplete="off" placeholder="请输入作者" class="layui-input" value="{{ $research['author'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">来源</label>
                        <div class="layui-input-inline">
                            <input type="text" name="source" required  lay-verify="required" autocomplete="off" placeholder="请输入来源" class="layui-input" value="{{ $research['source'] }}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">链接</label>
                        <div class="layui-input-inline">
                            <input type="text" name="url" required  lay-verify="required" autocomplete="off" placeholder="请输入来源" class="layui-input" value="{{ $research['url'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">时间</label>
                        <div class="layui-input-inline">
                            <input type="text" name="date" id="date" required  lay-verify="required" autocomplete="off" placeholder="请输入来源" class="layui-input" value="{{ $research['date'] }}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>

                    {!!Form::token()!!}
                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        laydate.render({
            elem: '#date'
        });

    });
</script>