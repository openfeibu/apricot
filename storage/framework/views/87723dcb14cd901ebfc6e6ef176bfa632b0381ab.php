<div class="main">
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="layui-card">
                <!-- <div class="layui-card-header">待办事项</div> -->

                <div class="layui-card-body">

                    <div class="fb-carousel fb-backlog " lay-anim="" lay-indicator="inside" lay-arrow="none" >
                        <div carousel-item="">
                            <ul class="layui-row fb-clearfix ">
                                <li class="layui-col-xs3">
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>用户量</h3>
                                        <p><cite><?php echo e($user_count); ?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-xs3">
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>标本量</h3>
                                        <p><cite><?php echo e($plant_count); ?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-xs3">
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>标本访问量</h3>
                                        <p><cite><?php echo e($plant_views_count); ?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-xs3">
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>新闻动态量</h3>
                                        <p><cite><?php echo e($news_count); ?></cite></p>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
                <div class="layui-card-body">

                    <div class="fb-carousel fb-backlog " lay-anim="" lay-indicator="inside" lay-arrow="none" >
                        <div carousel-item="">
                            <ul class="layui-row fb-clearfix ">
                                <li class="layui-col-xs3">
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>新闻动态访问量</h3>
                                        <p><cite><?php echo e($news_views_count); ?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-xs3">
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>问题量</h3>
                                        <p><cite><?php echo e($question_count); ?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-xs3">
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>用户回答量</h3>
                                        <p><cite><?php echo e($user_question_comment_count); ?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-xs3">
                                    <a lay-href="" class="fb-backlog-body">
                                        <h3>管理员回答量</h3>
                                        <p><cite><?php echo e($admin_question_comment_count); ?></cite></p>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>