<?php 
    include "../../path.php";
    include "../../app/controllers/topics.php";
?>

<!-- header -->
<?php include '../../app/include/header-admin.php'; ?>

<div class="container">
    <?php include '../../app/include/sidebar-admin.php'; ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/topics/index.php"; ?>" class="col-3 btn btn-success">Вернуться в Категории</a>
            </div>
            <div class="row title-table">
                <h2>Изменение категории(1)</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <p><?=$errMsg?></p>
                </div>
                <form action="edit.php" method="post">
                    <input name="id" value="<?=$id;?>" type="hidden">
                    <div class="col">
                        <input name="name" value="<?=$name;?>" type="text" class="form-control" placeholder="Название категории" aria-label="Название категории">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Описание категории</label>
                        <textarea name="description" class="form-control" id="content" rows="3"><?=$description;?></textarea>
                    </div>
                    <div class="col">
                        <button name="topic-edit" class="btn btn-primary" type="submit">Сохранить изменения</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- footer-->
<?php include("../../app/include/footer.php"); ?>
