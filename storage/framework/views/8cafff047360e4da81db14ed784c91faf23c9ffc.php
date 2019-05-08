<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="﻿<?php echo e(route('home')); ?>">主页</a><span lay-separator="">/</span>
            <a><cite>添加<?php echo e(trans("nav.name")); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('nav/nav')); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属上级导航</label>
                        <div class="layui-input-inline">
                            <select name="parent_id">
                                <option value="0">顶级导航</option>
                                <?php $__currentLoopData = $top_navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $top_navs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($top_navs->id); ?>" ><?php echo e($top_navs->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" lay-verify="title" autocomplete="off" placeholder="请输入名称" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">链接</label>
                        <div class="layui-input-inline">
                            <input type="text" name="url" lay-verify="title" autocomplete="off" placeholder="请输入链接" class="layui-input" >
                        </div>
                    </div>
                    
                        
                        
                        
                        
                    
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类</label>
                        <div class="layui-input-block">
                            <?php $i=0; ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $i++; ?>
                            <input type="radio" name="category_id" value="<?php echo e($category['id']); ?>" title="<?php echo e($category['name']); ?>" <?php if($i==1): ?> checked <?php endif; ?>>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" value="0" lay-verify="title" autocomplete="off" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    <?php echo Form::token(); ?>

                </form>
            </div>

        </div>
    </div>
</div>
