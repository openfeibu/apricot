
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
        @include('user.left')
        <div class="main-right">

            <div class="mine">
                <form action="{{ route('pc.post_password') }}" class="passForm"  onSubmit="return password_form()" id="password_form">
                    <div class="name">
                        <label for="">旧密码:</label>
                        <input type="text" name="old_password" value="">
                    </div>
                    <div class="name">
                        <label for="">新密码:</label>
                        <input type="text" name="password" value="">
                    </div>
                    <div class="name">
                        <label for="">重复新密码:</label>
                        <input type="text" name="password_confirmation" value="">
                    </div>
                    <div class="submit">
                        <input type="submit" value="确定">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    function password_form()
    {
        var old_password = $("#password_form").find("[name='old_password']").val();
        var password = $("#password_form").find("[name='password']").val();
        var password_confirmation = $("#password_form").find("[name='password_confirmation']").val();

        if(isEmpty(old_password) || isEmpty(password) || isEmpty(password_confirmation)){
            $fb.fbNews({content:"请完善信息后提交",type:'warning'});
            return false;
        }else{
            $fb.loading({content:"请求中"});
            $.ajax({
                url : "{{ route('pc.post_password') }}",
                data : {'_token':"{!! csrf_token() !!}","old_password":old_password,"password":password,"password_confirmation":password_confirmation},
                type : 'post',
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
            })
        }
        return false;
    }

</script>


