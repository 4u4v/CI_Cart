<?php $this->load->view('header'); ?>

<body>
<p>欢迎加注册加入...</p>
<div class="register">
<?php //echo form_open('form'); ?>
<form name="reg_form" action="<?php echo site_url('register/save');?>" accept-charset="utf-8" method="post">
用户名：<input type="text" name="user_name"><br>
密 码： <input type="password" name="password"><br>
确认密码：<input type="password" name="confirm_pwd"><br>
邮 箱：<input type="text" name="email"><br>
验证码：<input type="text" name="captcha"><br>
<?php //echo $captcha_code;?>
<img src="<?php echo site_url('register/code');?>" alt="" onclick= this.src="<?php echo site_url('register/code').'/'?>"+Math.random() style="cursor: pointer;" title="看不清？点击更换另一个验证码。"/>
<br><input type="submit" value="提交注册">
</form>
</div>

<?php $this->load->view('footer'); ?>