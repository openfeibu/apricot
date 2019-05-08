<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="﻿{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>添加{{ trans("nav.name") }}</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('nav/nav')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属上级导航</label>
                        <div class="layui-input-inline">
                            <select name="parent_id">
                                <option value="0">顶级导航</option>
                                @foreach($top_navs as $key => $top_navs)
                                    <option value="{{ $top_navs->id }}" >{{ $top_navs->name }}</option>
                                @endforeach

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
                    {{--<div class="layui-form-item">--}}
                        {{--<label class="layui-form-label">图标</label>--}}
                        {{--{!! $nav->files('image')--}}
                        {{--->url($nav->getUploadUrl('image'))--}}
                        {{--->uploader()!!}--}}
                    {{--</div>--}}
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类</label>
                        <div class="layui-input-block">
                            <?php $i=0; ?>
                            @foreach($categories as $key => $category)
                            <?php $i++; ?>
                            <input type="radio" name="category_id" value="{{$category['id']}}" title="{{$category['name']}}" @if($i==1) checked @endif>
                            @endforeach
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
                    {!!Form::token()!!}
                </form>
            </div>

        </div>
    </div>
</div>
