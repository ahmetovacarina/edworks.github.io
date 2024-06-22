<?php
        include '../../path.php';
        include '../../app/controllers/topics.php';
?>

<!-- header -->
<?php include '../../app/include/header-admin.php'; ?>

<div class="container">
    <?php include '../../app/include/sidebar-admin.php'; ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/topics/create.php"; ?>" class="col-3 btn btn-success">Создать категорию</a>
            </div>
            <div class="row title-table">
                <h2>Управление категориями</h2>
                <div class="col-1">ID</div>
                <div class="col-5">Название</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach ($topics as $key => $topic): ?>
            <div class="row post">
                <div class="id col-1"><?=$key + 1; ?></div>
                <div class="title col-5"><?=$topic ['name']; ?></div>
                <div class="red col-2"><a href="edit.php?id=<?=$topic['id'];?>">edit</a></div>
                <div class="del col-2"><a href="edit.php?del_id=<?=$topic['del_id'];?>">delete</a></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<!-- footer-->
<?php include("../../app/include/footer.php"); ?>
