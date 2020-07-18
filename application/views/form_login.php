<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <!-- style dari login -->
    <link href="<?=base_URL()?>AdminLTE/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 200px;
        padding-bottom: 60px;
        background-color: black;
      }

      .form-signin {
        background-color: green;
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #6ea1cc;
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
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="<?=base_URL()?>AdminLTE/css/bootstrap-responsive.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <form class="form-signin" action="<?=base_URL()?>Auth/do_login" method="post">
        <legend>Form Login</legend>
        <!-- pemanggilan flashdata untuk nama flashdata yang bernama k di controller auth-->
        <?=$this->session->flashdata("k")?>
        <!-- name "isi sesuai dengan nama field di database" -->
        <input type="text" class="input-block-level" placeholder="Username" name="username" autofocus required>
        <input type="password" class="input-block-level" placeholder="Password" name="password" required>
        <button class="btn btn-large btn-primary" type="submit">Login</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>
