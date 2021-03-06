<?php
session_start(); //должно находиться до первого вывода в браузер
$user = null;
if (!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
$passwordRepeat = "yes";
if(!empty($_SESSION["passwordRepeat"])){
    $passwordRepeat = $_SESSION["passwordRepeat"];
}
$userExist = 'no';
if(!empty($_SESSION["user_exist"])){
    $userExist = $_SESSION["user_exist"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/../css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <?php if (empty($user)): ?>
                  <li><a href="authorization">Авторизация</a></li>
                  <li class="active"><a href="reg">Регистрация</a></li>
              <?php else : ?>
                  <li><a href="list">Личный кабинет</a></li>
              <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
            <?php if ($passwordRepeat == "no"): ?>  <p>Пароли не совпадают. Попробуйте еще раз.</p>
            <?php elseif ($userExist == "yes") : ?> <p>Такой пользователь уже существует.</p>
            <?php endif; ?>
      <div class="form-container">
        <form class="form-horizontal" action="reg/reg" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
              <input name="login" type="text" class="form-control" id="inputEmail3" placeholder="Логин">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
              <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Пароль">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword4" class="col-sm-2 control-label">Пароль (Повтор)</label>
            <div class="col-sm-10">
              <input name="passwordRepeat" type="password" class="form-control" id="inputPassword4" placeholder="Пароль">
            </div>
          </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" id="inputEmail3" placeholder="Имя">
                </div>
            </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Зарегистрироваться</button>
              <br><br>
              Зарегистрированы? <a href="authorization">Авторизируйтесь</a>
            </div>
          </div>

        </form>
      </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
