<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"E:\web\tp5\public/../application/index\view\user\register.html";i:1481505863;}*/ ?>
 <!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <title>从前慢 注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSS -->
    <link rel='stylesheet' href='__STATIC__/css/bac.css'>
    <link rel="stylesheet" href="__STATIC__/css/reset.css">
    <link rel="stylesheet" href="__STATIC__/css/supersized.css">
    <link rel="stylesheet" href="__STATIC__/css/style.css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
</head>

<body>
    <div class="page-container">
        <h1>注册</h1>
        <ul>
            <form method="post">
                <input type="text" name="username" class="username" placeholder="用户名"><span></span>
                <input type="password" name="password" class="password" placeholder="密码"><span></span>
                <input type="password" name="repassword" class="repassword" placeholder="重复密码"><span></span>
                <input type="text" name="tel" class="tel" placeholder="手机号"><span></span>
                <input type="text" name="code" class="code" placeholder="验证码"><span></span>
                <div style="height:20px;width:60px;">
                    <img style="padding-left: 100px; margin-top:3px;" src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>'" />
                </div>
                <br/>
                <button type="submit" id="button">Sign me in</button>
                <div class="error"><span>+</span></div>
            </form>
    </div>
    <!-- Javascript -->
    <script src="__STATIC__/js/jquery-1.8.2.min.js"></script>
    <script src="__STATIC__/js/supersized.3.2.7.min.js"></script>
    <script src="__STATIC__/js/supersized-init.js"></script>
    <script src="__STATIC__/js/scripts.js"></script>
    <script src="__STATIC__/js/jquery-1.11.3.js"></script>
</body>
<div class="loading" style="width:300px;height:300px;position:absolute;z-index:999px;
margin-top:350px;top:-150px;background:#ffffff;left:-150px;margin-left:700px;display:none;border:1px solid #eeeeee">
    <img src="" alt="" id="regcg" style="margin-left:120px;margin-top:20px; width:60px;height:60px">
         <div style="margin-left:110px;margin-top:20px; font-size:25px;" id ="cg">是哦后</div>
         <span id="sec" style="float:left;margin-left:100px;margin-top:80px;font-size:15px;">计算机世</span>
         <span style="float:left;margin-top:80px;font-size:15px ;"><a href="" id="reg">会员登陆</a></span>
         </div>
<script type="text/javascript">
$(function() {

    //判断用户名
    function checkUsername() {
        var reg = /\w{6,18}/;

        if (reg.test($(".username").val())) {
            $(".username").next().html('<font color="red">合法的用户名</font>');
            return true;
        } else {
            $(".username").next().html('<font color="green">用户名必须为6~18位的字符</font>');
            return false;

        }

    }
    //判断密码
    function checkPassword() {
        var reg = /^(\w){6,20}$/;
        if (reg.test($(".password").val())) {
            $(".password").next().html('<font color="red">合法的密码</font>');
            return true;
        } else {
            $(".password").next().html('<font color="red">密码必须为6-20个字符</font>');
            return false;
        }
    }
    //判断repassword
    function checkRepassword() {
        var reg = /\w{6,20}/;

        if (reg.test($(".repassword").val())) {
            $(".repassword").next().html('<font color="green">合法的密码</font>');
            if ($(".password").val() == $(".repassword").val()) {
                $(".repassword").next().html('<font color="green">两次密码相同</font>');
                return true;
            } else {
                $(".repassword").next().html('<font color="red">两次密码输入请保持相同</font>');
                return false;
            }
        } else {
            $(".repassword").next().html('<font color="red">密码必须是6~20位的字符</font>');
            return false;
        }
    }
    //判断手机号
    function checkTel() {

        var reg = /^1[34578]\d{9}$/;


        if ($(".tel").val() == '') {
            $(".tel").next().html('<font color="red">手机号不能为空</font>');
            return false;
        }

        if (reg.test($(".tel").val())) {
            $(".tel").next().html('<font color="red">合法的手机号</font>');
            return true;
        } else {
            $(".tel").next().html('<font color="red">手机号不合法</font>');
            return false;
        }
    }

    function ajax() {

        $.post('doRegister', {
                username: $(".username").val(),
                password: $(".password").val(),
                tel: $(".tel").val(),
                code: $(".code").val()


            }, function(data) {


                //alert(data);

                //var a = eval('('+ data +')');
                //console.log(a);

                if (data == 0) {
                    $(".code").next().html('<font color="red">验证码不正确</font>')
                }
                //console.log(a.status);  
                
                if(data == 2) {
                    window.location.href = 'login';
                 } 

                
            }


        );

    };

   

    $(".password").focus(function() {

        checkUsername();
    });

    $(".repassword").focus(function() {
     
        checkPassword();
    });

    $(".tel").focus(function() {

        checkRepassword();
    });
    $(".code").focus(function() {
        //ajax();

        checkTel();
    });
    $(".code").blur(function() {
        ajax();
       
        //checkTel();
    });


    // $(".username").blur(function() {

        //ajax();

    //     //checkUsername();
    // });

    $("#button").click(function() {

            
        $.post('doRegister', {
                username: $(".username").val(),
                password: $(".password").val(),
                tel: $(".tel").val(),
                code: $(".code").val()


            }, function(data) {



                var a = JSON.parse(data);
                //alert(a.status);
                     
              if (data == 2) {

                    window.location.href = 'www.tp5.com/index/user/login';
                
               }
       
                
            }


        );
       

    });




});
</script>

</html>
