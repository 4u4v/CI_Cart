<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="utf-8">
<head>
<title>后台管理登录</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link href="<?php echo base_url()?>css/login.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo base_url()?>js/jquery.js"></script>
<script language="JavaScript"> var base_url = '<?php echo base_url()?>'; </script>
<script language="javascript">
//刷新验证码
function change_yzm(obj)
{

    $(obj).attr('src','<?php echo site_url('login/captcha')?>'+'/'+Math.random());
}

//表单提交前验证
function beforeSubmit()
{
  $(':input.x-form-required').trigger('blur');
  var numWarnings = $('.x-form-invalid').length;
  if (numWarnings) {
    return false;
  }
  return true;
};

$(document).ready(function() {

  $('#name').focus();

  var $loadingIndicator = $('<img/>')
      .attr({
        'src': base_url+'images/large-loading.gif', 
        'alt': 'Loading. Please wait.'
      })
      .addClass('wait')
      .appendTo($('body'))
	  .hide();

  $('#sbm').click( function(){
	if (beforeSubmit()){
      $.post("<?php echo site_url('login/signin')?>", $('#form').serialize(), function(data) {
          if(data==1){
		    $loadingIndicator.show();
	        window.location.href = "<?php echo site_url('frameset')?>";
	      }else if(data==2){
            $('.error-msg').show();
		  }
      });
	}
  });

  var $tooltip = $('<div id="tooltip"></div>').appendTo('body').hide();  
  var positionTooltip = function(event) {
    var tPosX = event.pageX;
    var tPosY = event.pageY + 3;
    $tooltip.css({top: tPosY, left: tPosX});
  };
  var showTooltip = function(event,errorMessage) {
    $tooltip
      .text(errorMessage)
      .show();
    positionTooltip(event);
  };
  var hideTooltip = function() {
    $tooltip.hide();
  };
  $('form :input')
    .focus(function() {
      $(this).addClass('x-form-focus');
    })
    .blur(function() {
      $(this).removeClass('x-form-focus x-form-invalid');
	  if ($(this).hasClass('x-form-required') && this.value == '') {		
        $(this).addClass('x-form-invalid');
		$('.error-msg').hide()
		
	  }
    }).hover(
    function (event) {
	  if ($(this).hasClass('x-form-invalid')){
	    var errorMessage = '该项不能为空';
        showTooltip(event,errorMessage);
	  }
    },
    function (event) {
      hideTooltip();
    }
  );
});

</script>

</head>

<body  class=" x-border-layout-ct" style="background: #278296">
<div id="login">
  <div class="left">
  </div>
  <div class="right">
    <form id="form" method="post" action="<?php echo site_url('login/signin')?>" >
      <div class="x-form-item" >
		  <label  style="width: 55px;color:white;" class="x-form-item-label">用 户 名:</label>
		  <div class="x-form-element"  style="padding-left: 30px;">
		  <input style="width: 122px;" class="x-form-text x-form-field x-form-required" size="20"  name="name" id="name" type="text" />
		  </div>
		  <div class="x-form-clear-left"></div>
	  </div>
	  <div class="x-form-item" >
		  <label  style="width: 55px;color:white;" class="x-form-item-label">密&nbsp; &nbsp; 码:</label>
		  <div class="x-form-element"  style="padding-left: 30px;">
		  <input style="width: 122px;" class="x-form-text x-form-field x-form-required" size="20"  name="password" id="password" type="password" />
		  </div>
		  <div class="x-form-clear-left"></div>
	  </div>
    <div class="x-form-item" >
      <label  style="width: 55px;color:white;" class="x-form-item-label">验 证 码:</label>
      <div class="x-form-element"  style="padding-left: 30px;">
      <input style="width: 122px;" class="x-form-text x-form-field x-form-required" size="20" name="login_captcha" maxlength="5" id="login_captcha" autocomplete="off" type="text">
      <div class="x-form-clear-left"></div>
      <label  style="width: 35px;color:white;" class="x-form-item-label"> </label>
      <div class="yzm_img" style="margin-top:3px">
      <img src="<?php echo site_url('login/captcha')?>" style="cursor: pointer;" id="captcha" onclick="change_yzm(this)" title="刷新验证码" />
    </div>
      </div>
      <div class="x-form-clear-left"></div>
    </div>
	  <div style="text-align:center;width:100%;">
	      <input id="sbm" value="进入后台管理" class="sbm"  type="button">
	  </div>
	  <input type="hidden" name="act" value="signin" />
    </form>
	<div class="error-msg">用户名或者密码错误</div>
  </div>
</div>

</body>
</html>
