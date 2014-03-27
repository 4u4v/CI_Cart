<?php $this->load->view('header'); ?>

<body>
<p>欢迎加注册加入...</p>
<div class="register">
<form name="reg_form" action="<?php echo site_url('register/save');?>" method="post">
用户名：<input type="text" name="user_name"><br>
密 码： <input type="password" name="password"><br>
确认密码：<input type="password" name="confirm_pwd"><br>
邮 箱：<input type="text" name="email"><br>
验证码：<input type="text" name="captcha"><br>
<?php echo $captcha_code;?>
<br><input type="submit" value="提交注册">
</form>
</div>

<?php $this->load->view('footer'); ?>