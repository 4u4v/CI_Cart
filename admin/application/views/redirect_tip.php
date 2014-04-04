<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title> <?php echo $title; ?> </title>
        <!--
        <link type="text/css" href="" rel="stylesheet" />
        <script type="text/javascript" src=""></script>
        -->
        <style type="text/css">
            body{
                margin: 0;
                line-height: 30px;
                font-size: 12px; 
            }
            a{
                text-decoration: none;
                color: #E13300;
            }
            ul{
                list-style: none;
                margin: 0;
                padding: 0;
            }
            #container{
                width: 900px;
                margin: 20px auto
            }
            #message{
                width: 500px;
                margin: 200px auto;
                border: 1px dotted #DDD;
            }
            #message .msg_title{
                text-align: center;
                font-weight: bold;
                font-size: 14px;
                padding: 5px;
                border-bottom: 1px dotted #DDD;
            }
            #message .msg_content{
                padding: 20px;
            }
            #message .notice{
                padding: 0 10px;
                text-align: right;
            }
        </style>
    </head>

    <body>
        <div id="container">
            <div id="message">
                <ul>
                    <li class="msg_title"><?php echo $title; ?></li>
                    <li class="msg_content"><?php echo $content; ?></li>
                    <li class="notice"><?php echo $delay_time; ?>秒后自动跳转，<?php echo anchor($target_url, '不想等待请猛戳此处'); ?></li>
                </ul>
            </div>
        </div>
    </body>

    <script type="text/javascript">
        setTimeout(function() {
            window.location = "<?php echo $target_url; ?>";
        }, <?php echo ($delay_time * 1000); ?>);
    </script>
</html>
