<?php
    include 'path.php';
    include 'app/controllers/users.php';
?>

<?php include("app/include/header.php"); ?>

<!--END HEADER-->
<!--FORM START-->
<div class="container reg_form">
    <form class="row justify-content-md-center" method="post" action="reg.php">
        <h2 class="col-12">Форма регистрации</h2>
        <!-- <div class="mb-12 col-12 col-md-12 err">
            <p><?=$errMsg?></p>
        </div> -->
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Логин</label>
            <input name="login" value="<?=$login;?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="введите ФИО...">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="mail" value="<?=$email;?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите ваш email...">
        <div id="emailHelp" class="form-text">Ваш email будет использоваться для авторизации</div>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="введите пароль...">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
            <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="повторите пароль...">
        </div>
        <div class="w-100"></div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <div class="mb-3 col-12 col-md-4">
            <button type="submit" class="btn btn-warning" name="button-reg">Зарегистрироваться</button>
            <a href="log.php">Войти</a>
        </div>
    </form>
</div>
<!-- FORM END-->
<!-- footer  -->
<?php include("app/include/footer.php"); ?>
