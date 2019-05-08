$(function(){
	$(".nav ul li").hover(function(){
		$(this).find("dl").slideDown(200)
	},function(){
		$(this).find("dl").stop().slideUp(200)

	})
	$(".mMenu .mMenu-btn").on("click",function(){

		$(".mMenu ol").slideDown(200)
	})
	$(".closeBtn").on("click",function(){
		$(".mMenu ol").slideUp(200)

	})
	$(".alertBox .close").on("click",function(){
		$(".alertBox").fadeOut(200)
	})
	$(".loginBtn").on("click",function(){
		$(".alertBox").fadeIn(200)
		$(".alert-login").fadeIn(200)
		$(".alert-reg").hide()
		$(".alert-reget").hide()
	})
	$(".regBtn").on("click",function(){
		$(".alertBox").fadeIn(200)
		$(".alert-reg").fadeIn(200)
		$(".alert-login").hide()
		$(".alert-reget").hide()
	})
	$(".getPass").on("click",function(){
		$(".alert-reget").fadeIn(200)
		$(".alert-login").hide()
		$(".alert-reg").hide()
	})
	$(".toLogin").on("click",function(){
		$(".alert-login").fadeIn(200)
		$(".alert-reget").hide()
		$(".alert-reg").hide()
	})
	$(".toReg").on("click",function(){
		$(".alert-reg").fadeIn(200)
		$(".alert-reget").hide()
		$(".alert-login").hide()
	})
})

       //获取字符串长度（汉字算1个字符，字母数字算半个）
	   function getByteLen(val) {
        var len = 0;
        for (var i = 0; i < val.length; i++) {
            var a = val.charAt(i);
            if (a.match(/[^\x00-\xff]/ig) != null) {
            len += 1;
            }
            else {
            len += 0.5;
            }
        }

        return Math.round(len);
        }