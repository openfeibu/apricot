<div class="main-left">
    <div class="main-nav-title">个人中心</div>
    <div class="main-nav-list fb-clearfix">
        <div class="main-nav-item @if(if_route('pc.user.index')) active @endif"><a href="{{ route('pc.user.index') }}">个人信息</a></div>
        <div class="main-nav-item @if(if_route('pc.user.questions')) active @endif"><a href="{{ route('pc.user.questions') }}">我的提问</a></div>
        <div class="main-nav-item @if(if_route('pc.password')) active @endif"><a href="{{ route('pc.password') }}">修改密码</a></div>
    </div>
</div>