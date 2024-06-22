<?php
    include 'path.php';
    include 'app/controllers/users.php';
?>

<?php include 'app/include/header.php'; ?>

<!--END HEADER-->
<!--FORM START-->
<div class="container reg_form">
    <form class="row justify-content-md-center" method="post" action="log.php">
        <h2 class="col-12">Авторизация</h2>
        <!-- <div class="mb-3 col-12 col-md-4 err">
            <p><?=$errMsg?></p>
        </div> -->
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Ваш email</label>
            <input name="mail" value="<?=$email;?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите ваш email...">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="введите ваш пароль...">
        </div>
        <div class="w-100"></div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <div class="mb-3 col-12 col-md-4">
            <button type="submit" name="button-log" class="btn btn-warning">Войти</button>
            <a href="reg.php">Зарегистрироваться</a>
        </div>
    </form>
</div>
<!-- FORM END-->
<!-- footer START -->
<?php include("app/include/footer.php"); ?>
