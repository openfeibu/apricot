
<div class="main">
    <div class="search">
        <div class="w1100 fb-position-relative">
            <p class="mineTitle">个人中心</p>
        </div>
    </div>
    <div class="nav mPadding">
        <div class="w1100 fb-clearfix">
            {!! Theme::widget('nav')->render() !!}
        </div>
    </div>
    <div class="main-detail w1100 fb-clearfix">

        @if(Auth::check() && !Auth::user()->verified)
            @if(isset($status) && $status = 'error')
            <article class="message is-warning">
                <div class="message-body">
                    邮箱激活失败！请点击 <a class="verification-required" href="javascript:;">重发邮件</a> 。
                </div>
            </article>
            @else
            <article class="message is-warning">
                <div class="message-body">
                    邮箱未激活，请前往 {{ Auth::user()->email }} 查收激活邮件。未收到邮件？请点击 <a class="verification-required" href="javascript:;">重发邮件</a> 。
                </div>
            </article>
            @endif
        @endif



    </div>
</div>
<script>
    $(".verification-required").click(function(){
        $fb.loading({content:"发送邮件中"});

        $.ajax({
            url : "{{ route('pc.email-verification.required') }}",
            data : {'_token':"{!! csrf_token() !!}"},
            type : 'get',
            dataType : "json",
            success : function (data) {
                $fb.closeLoading();
                $fb.fbNews({content:data.msg});
            },
            error : function (jqXHR, textStatus, errorThrown) {
                $fb.closeLoading();
                responseText = $.parseJSON(jqXHR.responseText);
                var message =  responseText.msg;
                if(!message)
                {
                    message = '服务器错误';
                }
                $fb.fbNews({content:message,type:'warning'});
            }
        });
        return false;
    })
</script>
