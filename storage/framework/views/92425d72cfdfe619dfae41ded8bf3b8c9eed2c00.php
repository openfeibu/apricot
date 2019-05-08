
<div class="main">
    <?php echo Theme::partial('search'); ?>

    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            <?php echo Theme::widget('nav')->render(); ?>

        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：<a href="">杏子资讯</a> > 杏界新闻
        </div>
        <div class="news-list w1100">
            <?php echo $__env->make('news.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="clicKMore">
            点击加载更多
        </div>
    </div>
</div>


<script>
    var page = 1;
    $(".clicKMore").on("click",function(){
        $fb.loading({content:"加载中"});
        var html="";
        page++;
        $.ajax({
            url : "<?php echo e(route('pc.news.index')); ?>",
            data : {'page':page},
            type : 'get',
            dataType : "json",
            success : function (data) {
                var html = data.data.content;
                console.log(html);
                $fb.closeLoading();
                if(html)
                {
                    $(".news-list").append(html);
                }else{
                    $(".clicKMore").text("没有更多了");
                }
            },
            error : function (jqXHR, textStatus, errorThrown) {
                responseText = $.parseJSON(jqXHR.responseText);
                var message =  responseText.msg;
                if(!message)
                {
                    message = '服务器错误';
                }
                $fb.fbNews({content:message,type:'warning'});
            }
        });

    })
</script>
