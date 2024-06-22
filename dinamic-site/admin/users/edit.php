<?php
        include '../../path.php';
        include '../../app/controllers/users.php';
?>

<!-- header -->
<?php include '../../app/include/header-admin.php'; ?>

<div class="container">
    <?php include '../../app/include/sidebar-admin.php'; ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/users/index.php"; ?>" class="col-3 btn btn-success">Вернуться в Пользователи</a>
            </div>
            <div class="row title-table">
                <h2>Редактировать пользователя</h2>
            </div>
            <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
                    <!-- Вывод массива с ошибками -->
                    <?php include "../../app/helps/errorInfo.php"; ?>
                </div>
                <form action="edit.php" method="post">
                <input name="id" value="<?=$id;?>" type="hidden" >
                    <div class="col">
                        <label for="formGroupExampleInput" class="form-label">Логин</label>
                        <input name="login" value="<?=$username;?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="введите логин...">
                    </div>
                <h1></h1>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input name="mail" value="<?=$user['email'];?>" type="email" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите email...">
                    </div>
                <h1></h1>
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Введите пароль (можете задать новый или ввести текущий пароль)</label>
                        <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="введите пароль...">
                    </div>
                <h1></h1>
                    <div class="col">
                        <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                        <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="повторите пароль...">
                    </div>
                <h2></h2>
                    <input name="admin" class="form-check-input" value="1" type="checkbox" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                        Администратор
                        </label>
                <h2></h2>
                    <div class="col">
                        <button name="update-user" class="btn btn-primary" type="submit">Сохранить изменения</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- footer-->
<?php include("../../app/include/footer.php"); ?>


