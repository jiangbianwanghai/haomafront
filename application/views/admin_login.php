<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>系统管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        font-family:"Microsoft YaHei",Arial,Helvetica,sans-serif,"宋体";
      }
      input,button {
        font-family:"Microsoft YaHei",Arial,Helvetica,sans-serif,"宋体";
      }
      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 14px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
      .form-signin button[type="submit"] {
        font-size: 14px;
        padding: 7px 18px;
      }
    </style>
  </head>
  <body>
    <div class="container">

      <?php 
        $attr = array(
          'class' => 'form-signin', 
          'id'    => 'login-form'
        );
        echo form_open('admin/signin', $attr);
      ?>
      <h4 class="form-signin-heading">系统管理</h4>
      <?php
        $data = array(
          'name'        => 'username',
          'maxlength'   => '100',
          'class'       => 'input-block-level',
          'placeholder' => '账号',
        );
        echo form_input($data);
        echo form_error('username', '<span class="error">', '</span>');
        $data = array(
          'name'        => 'password',
          'maxlength'   => '100',
          'class'       => 'input-block-level',
          'placeholder' => '密码',
        );
        echo form_password($data);
        echo form_error('password', '<span class="error">', '</span>');
        $data = array(
          'name'        => 'captcha',
          'maxlength'   => '100',
          'class'       => 'input-block-level',
          'placeholder' => '验证码',
        );
        echo form_input($data);
        echo form_error('captcha', '<span class="error">', '</span>');
      ?>
      <img src="http://www.zz10086.com/admin/captcha?<?php echo time(); ?>" />
      <label class="checkbox">
        <?php
          $data = array(
            'name'    => 'save_login',
            'value'   => '1',
            'checked' => TRUE,
          );
          echo form_checkbox($data);
        ?> 记住我的登陆信息
      </label>
      <?php
        $data = array(
          'name'    => 'button',
          'id'      => 'button',
          'value'   => 'true',
          'type'    => 'submit',
          'content' => '登录',
          'class'   => 'btn btn-large btn-primary'
        );
        echo form_button($data);
        echo form_close();
      ?>
    </div>
    <script src="/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>