<?php

    include '../../path.php';
    include '../../app/controllers/order.php';
?>

<!-- header -->
<?php include '../../app/include/header-admin.php'; ?>

<div class="container">
    <?php include '../../app/include/sidebar-admin.php'; ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/order/index.php"; ?>" class="col-3 btn btn-success">Вернуться в Заказы</a>
            </div>
            <div class="row title-table">
                <h2>Заказ </h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <!-- Вывод массива с ошибками -->
                    <?php include "../../app/helps/errorInfo.php"; ?>
                </div>
                <form action="create.php" method="post" enctype="multipart/form-data">
                <h5>Информация о заказчике</h5>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="col mb-8">
                        <input value="<?=$name; ?>" name="name" type="text" class="form-control" placeholder="ФИО" aria-label="ФИО">
                    </div>
                    <div class="input-group">
                        <input value="<?=$phone; ?>" name="phone" type="text" aria-label="phone" class="form-control"placeholder="Номер">
                        <input value="<?=$email; ?>" name="email" type="text" aria-label="email" class="form-control"placeholder="Email">
                    </div>
                <h4> </h4>
                <h5>Данные о заказе</h5>

                <div class="input-group">
                            <input value="<?=$object; ?>" name="object" type="text" class="form-control" placeholder="Изделие" aria-label="Изделие">
                            <!-- <select name="topic" class="form-select mb-2" aria-label="Default select example">
                                <option selected>Категория:</option>
                                <?php foreach ($topics as $key => $topic): ?>
                                    <option value="<?=$topic['id']; ?>"><?=$topic['name']; ?></option>
                                <?php endforeach; ?>
                            </select> -->
                    </div>
                    <div class="input-group">
                        <input value="<?=$sum; ?>" name="sum" type="text" aria-label="sum" class="form-control"placeholder="Количество">
                        <input value="<?=$width; ?>" name="width" type="text" aria-label="width" class="form-control"placeholder="Ширина">
                        <input value="<?=$length; ?>" name="length" type="text" aria-label="length" class="form-control"placeholder="Высота">
                    </div>

                    <!-- <div class="input-group col mb-4 mt-4">
                        <input value="<?=$img; ?>" name="img" type="file" aria-label="img" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Загрузить</label>
                    </div> -->
                <h4></h4>
                <div class="col">
                        <label for="comment" class="form-label">Комментарий:</label>
                        <textarea name="comment" class="form-control" id="comment" rows="3"><?=$comment;?></textarea>
                    </div>
                <h4></h4>
                    <div class="input-group">
                        <input value="<?=$price; ?>" name="price" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text">Руб.</span>
                    </div>
                <h4></h4>
                    <!-- <div class="form-check">
                        <input name="publish" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                        Открытый
                        </label>
                    </div> -->
                <h4></h4>
                    <div class="col col-6">
                        <button name="edit_order" class="btn btn-primary" type="submit">Сохранить изменения</button>
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