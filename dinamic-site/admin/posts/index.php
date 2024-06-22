<?php
        include '../../path.php';
        include '../../app/controllers/posts.php';
?>

<!-- header -->
<?php include '../../app/include/header-admin.php'; ?>

<div class="container">
    <?php include '../../app/include/sidebar-admin.php'; ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/posts/create.php"; ?>" class="col-3 btn btn-success">Создать</a>
            </div>
            <div class="row title-table">
                <h2>Управление записями</h2>
                <div class="col-1">ID</div>
                <div class="col-4">Название</div>
                <div class="col-2">Автор</div>
                <!-- <div class="col-2">Цена</div> -->
                <div class="col-3">Управление</div>
            </div>
            <?php foreach ($postsAdm as $key => $post): ?>
            <div class="row post">
                <div class="id col-1"><?=$key + 1; ?></div>
                <div class="title col-4"><?=mb_substr($post['title'], 0, 50, 'UTF-8').'...'; ?></div>
                <div class="author col-2"><?=$post['username']; ?></div>
                <!-- <div class="author col-2">3400</div> -->
                <div class="red col-1"><a href="edit.php?id=<?=$post['id'];?>">edit</a></div>
                <div class="del col-1"><a href="edit.php?delete_id=<?=$post['id'];?>">detete</a></div>
                <?php if ($post['status']): ?>
                    <div class="status col-1"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">unpublish</a></div>
                <?php else: ?>
                    <div class="status col-1"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">publish</a></div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<!-- footer-->
<?php include("../../app/include/footer.php"); ?>
