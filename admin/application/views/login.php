<?php $this->load->view('header');?>

<body>
<p>后台管理登录系统</p>
<div class="login">
<?php //echo form_open('form'); ?>
<form name="login_form" action="<?php echo site_url('login/check_login');?>" accept-charset="utf-8" method="post">
管理员：<input type="text" name="user_name"><br>
密 码： <input type="password" name="password"><br>
验证码：<input type="text" name="captcha"><br>
<?php echo $captcha_code;?>
<br><input type="submit" value="登录">
</form>
</div>

<?php $this->load->view('footer');?>
