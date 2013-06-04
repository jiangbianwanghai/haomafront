	<div id="footer">
		<div class="layout">
			<p>客服电话：13683810086&nbsp;&nbsp;&nbsp;15837110086&nbsp;&nbsp;&nbsp;&nbsp;QQ:13683810086&nbsp;&nbsp;&nbsp;15837110086</p>
			<p>&copy; Copyright 2013 zz10086.com</p>
		</div>
	</div>
</div>
<script type="text/javascript" src="http://cn-style.gcimg.net/v6/js/common/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url("static/js/main.js");?>"></script>
<script type="text/javascript">
function changeImg(){
	document.getElementById("Image1").src="http://www.zz10086.cn/shouye/captcha?"+Math.random();
}
$("#captcha").blur(function(){ 
	$.post("/shouye/checkcaptcha", { captcha: $("#captcha").val()}, function(data){
		if (data == 0) {
			changeImg();
			$("#captcha").val('');
			$("#captcha").focus();
			$("#yzm").text('验证码错误，请重新输入');
		} else {
			$("#yzm").text('验证码正确');
		}
	});
});
</script>
</body>
</html>