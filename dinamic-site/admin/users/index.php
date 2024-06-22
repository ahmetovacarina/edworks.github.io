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
                <a href="<?php echo BASE_URL . "admin/users/create.php"; ?>" class="col-3 btn btn-success">Создать</a>
            </div>
            <div class="row title-table">
                <h2>Пользователи</h2>
                <div class="col-1">ID</div>
                <div class="col-2">Роль</div>
                <div class="col-3">Логин</div>
                <div class="col-4">Email</div>
                <div class="col-2">Управление</div>
            </div>
            <?php foreach ($users as $key => $user): ?>
            <div class="row post">
                <div class="col-1"><?=$user['id'];?></div>
                <?php if ($user['admin'] == 1): ?>
                    <div class="col-2">Админ</div>
                <?php else: ?>
                    <div class="col-2">Гость</div>
                <? endif; ?>
                <div class="col-3"><?=$user['username'];?></div>
                <div class="col-4"><?=$user['email'];?></div>
                <div class="red col-1"><a href="edit.php?edit_id=<?=$user['id'];?>">edit</a></div>
                <div class="del col-1"><a href="index.php?delete_id=<?=$user['id'];?>">delete</a></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<!-- footer-->
<?php include("../../app/include/footer.php"); ?>
