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
                <a href="<?php echo BASE_URL . "admin/posts/index.php"; ?>" class="col-3 btn btn-success">Вернуться в Записи</a>
            </div>
            <div class="row title-table">
                <h2>Редактирвоание записи</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <!-- Вывод массива с ошибками -->
                    <?php include "../../app/helps/errorInfo.php"; ?>
                </div>
                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$id; ?>">
                    <div class="col mb-4">
                        <input value="<?=$post['title']; ?>" name="title" type="text" class="form-control" placeholder="Название изделия" aria-label="Название изделия">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Содержимое записи</label>
                        <textarea name="content" id="editor" class="form-control" rows="6"><?=$post['content']; ?></textarea>
                    </div>
                    <div class="input-group col mb-4 mt-4">
                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <select name="topic" class="form-select mb-2" aria-label="Default select example">
                        <?php foreach ($topics as $key => $topic): ?>
                            <option value="<?=$topic['id']; ?>"><?=$topic['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-check">
                        <?php if (empty($publish) && $publish == 0): ?>
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                            Опубликовать
                            </label>
                        <?php else: ?>
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                            Опубликовать
                            </label>
                        <?php endif; ?>
                    </div>
                    <div class="col col-6">
                        <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- footer-->
<?php include("../../app/include/footer.php"); ?>

<!-- добавление редактора к текстовому полю админки-->
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script>

<script src="../../assets/js/script.js"></script>