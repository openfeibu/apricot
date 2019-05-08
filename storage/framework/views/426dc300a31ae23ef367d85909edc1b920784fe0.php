<div id="add-catalogue-content">
    <div class="layui-col-md12">
        <div class="fb-main-table">
            <form class="layui-form" action="<?php echo e(guard_url('culture/storeCatalogue')); ?>" method="post" method="post" lay-filter="fb-form">
                <?php if($parent_catalog): ?>
                <div class="layui-form-item">
                    <label class="layui-form-label">所属目录：</label>
                    <div class="layui-form-mid layui-word-aux"><?php echo e($parent_catalog['title']); ?></div>
                    <div class="layui-input-inline">
                        <input type="hidden" name="parent_id" class="layui-input" value="<?php echo e($parent_catalog['id']); ?>">
                    </div>
                </div>
                <?php endif; ?>
                <div class="layui-form-item">
                    <label class="layui-form-label">目录标题</label>
                    <div class="layui-input-inline">
                        <input type="text" name="title" autocomplete="off" placeholder="请输入标题" class="layui-input" value="">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">内容</label>
                    <div class="layui-input-block">
                        <script type="text/plain" id="catalogue_content" name="content" style="width:1000px;height:240px;"></script>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">排序</label>
                    <div class="layui-input-inline">
                        <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input" value="50" lay-verify="required">
                    </div>
                    <div class="layui-form-mid layui-word-aux">按升序排序</div>
                </div>
                <?php echo Form::token(); ?>

            </form>
        </div>
    </div>
</div>
<?php echo Theme::asset()->container('ueditor')->scripts(); ?>

<script>
    var catalogue_content = getUeCopy('catalogue_content');
    function getContent()
    {
        return catalogue_content.getContent();
    }
</script>