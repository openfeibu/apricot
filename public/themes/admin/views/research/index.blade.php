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
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="{{guard_url('research/create')}}">{{ trans('app.add') }}{{ trans('research.name') }}</a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">{{ trans('app.delete') }}</button>
                </div>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>
<script type="text/html" id="imageTEM">
    <img src="@{{d.image}}" alt="" height="28">
</script>

<script>
    var main_url = "{{guard_url('research')}}";
    var delete_all_url = "{{guard_url('research/destroyAll')}}";
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'title',title:'文献题名', width:200,edit:'text'}
                ,{field:'author',title:'作者',edit:'text'}
                ,{field:'source',title:'来源',edit:'text'}
                ,{field:'date',title:'时间',edit:'text'}
                ,{field:'url',title:'链接',edit:'text'}
                ,{field:'score',title:'操作', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 10
            ,height: 'full-200'
        });


    });
</script>
{!! Theme::partial('common_handle_js') !!}