<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/common.css"/>
</head>

<body>
<p>欢迎回来...</p>
<div class="login">
<?php echo validation_errors(); ?>
<?php //echo form_open('form'); ?>
<form name="login_form" action="<?php echo site_url('login/check_login');?>" accept-charset="utf-8" method="post">
用户名：<input type="text" name="user_name"><br>
密 码： <input type="password" name="password"><br>
验证码：<input type="text" name="captcha"><br>
<?php echo $captcha_code;?>
<br><input type="submit" value="登录">
</form>
</div>

<div class="footer">
<p>Copyright &copy; <?php echo "水木商城"; ?> All Rights Reserved.</p>
<span>Powered by <a href="http://Studio.js.cn/"  target="_blank">水木工作室</a> | Designed by <a href="http://www.4u4v.cn/" target="_blank">水木</a> </span>
</div>
</body>
</html>
