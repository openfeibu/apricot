{!! Theme::asset()->container('webuploader')->styles() !!}
{!! Theme::asset()->container('webuploader')->scripts() !!}
<style>
    #avatar_file {
        position: absolute;
        width: 100px;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
    }
</style>
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

                <div class="portrait">
                    <img src="{!! avatar($user->avatar) !!}" alt="" id="avatar">
                    <p>
                        更换头像
                        <!--<input type="button" id="avatar_file">-->
                        <buttion type="button" id="avatar_file">
                    </p>

                </div>
                <form action="" onSubmit="return update_info()" id="update_info_form">
                    <div class="name">
                        <label for="">邮箱:</label>
                        <input type="text" disabled value="{{ $user->email }}" style="border:none">
                    </div>
                    <div class="name">
                        <label for="">昵称:</label>
                        <input type="text" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="submit">
                        <input type="submit" value="确定" >
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
<script>
    $(function(){

        avatar_uploader = WebUploader.create({
            pick: {
                id: '#avatar_file',
                label: '点击选择文件',
                multiple:false
            },
            formData: {
                _token: csrf_token
            },
            swf: "{{ config('app.url') }}/lib/webuploader/Uploader.swf",
            chunked: true,
            chunkSize: 0.5 * 1024 * 1024,
            server: '/user/upload_avatar',
            method:'POST',
            // runtimeOrder: 'flash',

            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },

            compress:{
                width: 500,
                height: 500,

                // 是否允许放大，如果想要生成小图的时候不失真，此选项应该设置为false.
                allowMagnify: false,
                // 是否允许裁剪。
                crop: true,
                // 是否保留头部meta信息。
                preserveHeaders: true,
                // 如果发现压缩后文件大小比原来还大，则使用原来图片
                // 此属性可能会影响图片自动纠正功能
                noCompressIfLarger: false,
                // 单位字节，如果图片大小小于此值，不会采用压缩。
                compressSize: 0.2 * 1024 * 1024 //200 KB
            },

            auto:true,
            // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
            disableGlobalDnd: true,
            fileNumLimit: 1,
            fileSingleSizeLimit: 10 * 1024 * 1024
        });

        avatar_uploader.on('uploadSuccess', function (file, response) {
            $("#avatar").attr('src',"{{ url('image/original/') }}"+response.data);
            $fb.fbNews({content:"更新成功",type:'warning'});
        });

        avatar_uploader.on('error', function( type ) {
            switch (type)
            {
                case 'F_EXCEED_SIZE':
                    text = '文件大小超出10M';
                    break;
                default:
                    text = '上传失败，请重试';
                    break;
            }
            $fb.fbNews({content:text,type:'warning'});
        });



    })
    function update_info()
    {
        var name = $("#update_info_form").find("[name='name']").val();
        if(isEmpty(name)){
            $fb.fbNews({content:"请完善信息后提交",type:'warning'});
            return false;
        }else{
            $fb.loading({content:"请求中"});
            $.ajax({
                url : "{{ route('pc.user.update') }}",
                data : {'_token':"{!! csrf_token() !!}","name":name},
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
            });
        }
        return false;
    }
</script>