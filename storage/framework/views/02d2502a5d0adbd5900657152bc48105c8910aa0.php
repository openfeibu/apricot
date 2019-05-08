<?php echo Theme::asset()->container('webuploader')->styles(); ?>

<?php echo Theme::asset()->container('webuploader')->scripts(); ?>

<?php echo Theme::asset()->container('upload_js')->scripts(); ?>

<div class="main">
    <?php echo Theme::partial('search'); ?>

    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            <?php echo Theme::widget('nav')->render(); ?>

        </div>
    </div>
    <div class="pageMain">
        <div class="mainNav w1100">
            当前位置：种植资源标本馆 > <a href="<?php echo e(route('pc.question.index')); ?>">植物问答</a> > 提问
        </div>
        <div class="quiz w1100">
            <div class="quiz-con">
                <div class="quiz-title">
                    提问
                </div>
                <div class="quiz-form">
                    <form action="" id="quizForm">
                        <div class="quiz-form-title">
                            <input type="text" name="title" placeholder="标题：写下你的问题" name="title" />
                            <div class="quiz-form-test">
                                <span>0</span>/40
                            </div>
                        </div>
                        <div class="quiz-form-con">
                            <textarea name="content" id="" placeholder="选填，详细说明你的问题，以便获得更好的答案"></textarea>
                            <div class="quiz-form-photo">
                                <div class="quiz-form-photo-title">
                                    添加优质配图将会得到更多人回答
                                </div>
                                
                                    

                                    
                                    
                                        
                                    
                                
                                
                                    
                                        
                                        
                                    
                                

                                <div id="uploader">
                                    <div class="queueList">
                                        <div id="dndArea" class="placeholder">
                                            <div id="filePicker"></div>
                                        </div>
                                    </div>
                                    <div class="statusBar" style="display:none;">
                                        <div class="progress">
                                            <span class="text">0%</span>
                                            <span class="percentage"></span>
                                        </div><div class="info"></div>
                                        <div class="btns">
                                            <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="quiz-form-btn">
                            <input type="submit" value="提交">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $fb("#quizForm").formValidator([
        {
            name:'title',
            rules:'required',
            display:"标题不可为空",
            maxLength:40,
            maxdisplay:"标题长度不可大于40"
        }
    ],function($form){
        var title = $($form).find("input[name='title']").val();
        var content = $($form).find("textarea[name='content']").val();
        var images_obj = $($form).find("input[name='images[]']");
        var images = {};
        for( var i=0;i<images_obj.length;i++ )
        {
            images[i] = images_obj.eq(i).val();
        }
        $fb.loading({content:"提交中"});
        $.ajax({
            url : "<?php echo e(route('pc.question.store')); ?>",
            data : {'_token':"<?php echo csrf_token(); ?>","title":title,"content":content,'images':images},
            type : 'post',
            dataType : "json",
            success : function (data) {
                $fb.closeLoading();
                $fb.fbNews({content:data.msg});
                if(data.code == 200)
                {
                    window.location.href = "<?php echo e(route('pc.question.index')); ?>";
                }
            },
            error : function (jqXHR, textStatus, errorThrown) {
                $fb.closeLoading();
                responseText = $.parseJSON(jqXHR.responseText);
                var message =  responseText.msg;
                if(!message)
                {
                    message = "服务器出错了！";
                }
                $fb.fbNews({content:message,type:'warning'});
            }
        });
        return false;
    });

    $('.quiz-form-title input').on('input propertychange', function() {
        var con = $(this).val();
        var len =getByteLen(con);
        var num =$(".quiz-form-test span");
        num.text(len)
        if(len > 40 ){
            if(!num.hasClass("on"))
                num.addClass("on");
        }else{
            if(num.hasClass("on"))
                num.removeClass("on");
        }


        $("[data-name='num']").text(len);
    });


</script>
