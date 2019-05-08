<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="﻿<?php echo e(route('home')); ?>">主页</a><span lay-separator="">/</span>
            <a><cite>植物问答</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <?php echo Theme::partial('message'); ?>

            <div class="tabel-message layui-form">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del"><?php echo e(trans('app.delete')); ?></button>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">标题：</label>
                    <div class="layui-input-inline">
                        <input type="text" name="search_key" class="layui-input search_key" value="">
                    </div>
                </div>

                <button class="layui-btn" data-type="reload">搜索</button>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">查看及回复</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>
<script type="text/html" id="imageTEM">
    {{#  layui.each(d.images, function(index, item){ }}
    <img src="{{item}}" alt="" height="28">
    {{#  }); }}
</script>

<script>
    var main_url = "<?php echo e(guard_url('question')); ?>";
    var delete_all_url = "<?php echo e(guard_url('question/destroyAll')); ?>";
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
                ,{field:'title',title:'标题'}
                ,{field:'user_name',title:'用户名'}
                ,{field:'image',title:'图片', width:200,toolbar:'#imageTEM',}
                ,{field:'created_at',title:'发表日期'}
                ,{field:'comment_num',title:'评论量', width:80}
                ,{field:'view_num',title:'阅读量', width:80}
                ,{field:'score',title:'操作', align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 10
            ,height: 'full-200'
        });
    });
</script>
<?php echo Theme::partial('common_handle_js'); ?>