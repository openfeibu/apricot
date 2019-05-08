<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="./">主页</a><span lay-separator="">/</span>
            <a><cite><?php echo e($title); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url($slug)); ?>" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name"  required  lay-verify="required" autocomplete="off" placeholder="请输入标题" class="layui-input" value="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">图片</label>
                        <?php echo $plant->files('image')
                        ->url($plant->getUploadUrl('image'))
                        ->uploader(); ?>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">中文学名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="chinese_name" autocomplete="off" placeholder="" class="layui-input" value="">
                        </div>
                        <label class="layui-form-label">目</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input" value="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">拉丁学名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="latin_name" autocomplete="off" placeholder="" class="layui-input" value="">
                        </div>
                        <label class="layui-form-label">亚	目</label>
                        <div class="layui-input-inline">
                            <input type="text" name="suborder" autocomplete="off" placeholder="" class="layui-input" value="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">别	称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="another_name" autocomplete="off" placeholder="" class="layui-input" value="">
                        </div>
                        <label class="layui-form-label">科</label>
                        <div class="layui-input-inline">
                            <input type="text" name="family" autocomplete="off" placeholder="" class="layui-input" value="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">界</label>
                        <div class="layui-input-inline">
                            <input type="text" name="kingdom" autocomplete="off" placeholder="" class="layui-input" value="">
                        </div>
                        <label class="layui-form-label">亚	科</label>
                        <div class="layui-input-inline">
                            <input type="text" name="subfamily" autocomplete="off" placeholder="" class="layui-input" value="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">门</label>
                        <div class="layui-input-inline">
                            <input type="text" name="phylum" autocomplete="off" placeholder="" class="layui-input" value="">
                        </div>
                        <label class="layui-form-label">属</label>
                        <div class="layui-input-inline">
                            <input type="text" name="genus" autocomplete="off" placeholder="" class="layui-input" value="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">纲</label>
                        <div class="layui-input-inline">
                            <input type="text" name="class" autocomplete="off" placeholder="请输入标题" class="layui-input" value="">
                        </div>
                        <label class="layui-form-label">种</label>
                        <div class="layui-input-inline">
                            <input type="text" name="seed" autocomplete="off" placeholder="请输入标题" class="layui-input" value="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">亚纲</label>
                        <div class="layui-input-inline">
                            <input type="text" name="subclass" autocomplete="off" placeholder="请输入标题" class="layui-input" value="">
                        </div>
                        <label class="layui-form-label">分布区域</label>
                        <div class="layui-input-inline">
                            <input type="text" name="distribution_area" autocomplete="off" placeholder="请输入标题" class="layui-input" value="">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">内容</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="width:1000px;height:240px;">
                            </script>
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
<div id="catalogue_demo" style="display: none;">

    <h2 class="layui-colla-title layui-colla-top">
        目录名称：<input type="text" name="catelog_parent_title[]" value="" class="layui-input layui-input-inline" style="width:200px;">
        <button type="button" class="layui-btn layui-btn-normal add-content-btn">添加内容</button>
        <button type="button" class="layui-btn layui-btn-normal add-catalogue-child-btn">添加子目录</button>
        <button type="button" class="layui-btn layui-btn-warm delete-catalogue-btn">删除目录</button>
    </h2>
    <div class="layui-colla-content layui-show">
        <div class="layui-collapse" lay-accordion="">
        </div>
    </div>


</div>
<div id="catalogue_child_demo" style="display: none;">
        <h2 class="layui-colla-title">
            目录名称：<input type="text" name="catelog_child_title[]" value="" class="layui-input layui-input-inline title" style="width:200px;">
            <button type="button" class="layui-btn layui-btn-normal child-add-content-btn">添加内容</button>
            <button type="button" class="layui-btn layui-btn-warm delete-catalogue-btn">删除目录</button>
        </h2>
        <div class="layui-colla-content layui-show">
        </div>
</div>

<?php echo Theme::asset()->container('ueditor')->scripts(); ?>

<script>
    var ue = getUe();
    /*
    var wh = getUeCopy('wh');
    layui.use(['form','jquery'], function(){
        var form = layui.form;
        var $ = layui.$;
        var parent_i=0;
        var child_i=0;
        var i=0;
        $("#add-catalogue-btn").click(function(){
            var html = '<div class="layui-colla-item layui-colla-item-parent" id="item-parent-'+parent_i+'" parent_i="'+parent_i+'"></div>';
            $("#catalogue").append(html);
            $("#item-parent-"+parent_i).html($("#catalogue_demo").html());
            $("#item-parent-"+parent_i).append('<input type="hidden" name="parent_i[]" value="'+parent_i+'">');
            var html = '<div class="content" style="display: none;"><script type="text/plain" id="content_'+i+'" name="catelog_parent_content_"'+parent_i+
                    ' style="width:1000px;height:240px;"><\/script></div>';
            $("#item-parent-"+parent_i).find(".layui-colla-content").prepend(html);
            getUeCopy('content_'+i);
            parent_i++;
            i++;
        });
        $("body").on('click',".delete-catalogue-btn",function () {
            $(this).closest('.layui-colla-item').remove();
        });
        $("body").on('click',".add-content-btn",function () {
            var parent_i = $(this).parents('.layui-colla-item-parent').attr('parent_i');
            $("#item-parent-"+parent_i).find(".content").show();
            $(this).removeClass("add-content-btn").removeClass('layui-btn-normal').addClass('delete-content-btn').addClass('layui-btn-danger').text('删除内容');
        })
        $("body").on('click',".delete-content-btn",function () {
            var parent_i = $(this).parents('.layui-colla-item-parent').attr('parent_i');
            $("#item-parent-"+parent_i).find(".content").hide();
            $(this).removeClass("delete-content-btn").removeClass('layui-btn-danger').addClass('add-content-btn').addClass('layui-btn-normal').text('添加内容');
        })
        $("body").on('click',".add-catalogue-child-btn",function () {
            var parent_i = $(this).parents('.layui-colla-item-parent').attr('parent_i');
            var html = '<div class="layui-colla-item layui-colla-item-child" id="item-child-'+child_i+'" parent_i="'+parent_i+'" child_i="'+child_i+'"></div>';
            $(this).closest('.layui-colla-item').find('.layui-collapse').append(html);
            $("#item-child-"+child_i).html($("#catalogue_child_demo").html());
            $("#item-child-"+child_i).find(".title").prop("name","catelog_child_title_"+parent_i+"[]");
            var html = '<div class="child-content" style="display: none;"><script type="text/plain" id="content_'+i+'" name="catelog_child_content_"'+parent_i+'_'+child_i+
                    ' style="width:1000px;height:240px;"><\/script></div>';
            $("#item-child-"+child_i).find(".layui-colla-content").prepend(html);
            getUeCopy('content_'+i);
            i++;
            child_i++;
        })
        $("body").on('click',".child-add-content-btn",function () {
            var child_i = $(this).closest('.layui-colla-item-child').attr('child_i');
            $("#item-child-"+child_i).find(".child-content").show();
            $(this).removeClass("child-add-content-btn").removeClass('layui-btn-normal').addClass('child-delete-content-btn').addClass('layui-btn-danger').text('删除内容');
        })
        $("body").on('click',".child-delete-content-btn",function () {
            var child_i = $(this).closest('.layui-colla-item-child').attr('child_i');
            $("#item-child-"+child_i).find(".child-content").hide();
            $(this).removeClass("child-delete-content-btn").removeClass('layui-btn-danger').addClass('child-add-content-btn').addClass('layui-btn-normal').text('添加内容');
        })


    });
    */
</script>