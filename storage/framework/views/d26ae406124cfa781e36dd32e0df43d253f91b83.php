<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="﻿<?php echo e(route('home')); ?>">主页</a><span lay-separator="">/</span>
            <a><cite><?php echo e(trans('research.name')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <?php echo Theme::partial('message'); ?>

            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('research/'.$research->id)); ?>" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">文献题名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title"  required  lay-verify="required"  autocomplete="off" placeholder="请输入文献题名" class="layui-input" value="<?php echo e($research['title']); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">作者</label>
                        <div class="layui-input-inline">
                            <input type="text" name="author" required  lay-verify="required"  autocomplete="off" placeholder="请输入作者" class="layui-input" value="<?php echo e($research['author']); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">来源</label>
                        <div class="layui-input-inline">
                            <input type="text" name="source" required  lay-verify="required" autocomplete="off" placeholder="请输入来源" class="layui-input" value="<?php echo e($research['source']); ?>">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">链接</label>
                        <div class="layui-input-inline">
                            <input type="text" name="url" required  lay-verify="required" autocomplete="off" placeholder="请输入来源" class="layui-input" value="<?php echo e($research['url']); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">时间</label>
                        <div class="layui-input-inline">
                            <input type="text" name="date" id="date" required  lay-verify="required" autocomplete="off" placeholder="请输入来源" class="layui-input" value="<?php echo e($research['date']); ?>">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>

                    <?php echo Form::token(); ?>

                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>
<?php echo Theme::asset()->container('ueditor')->scripts(); ?>

<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        laydate.render({
            elem: '#date'
        });

    });
</script>