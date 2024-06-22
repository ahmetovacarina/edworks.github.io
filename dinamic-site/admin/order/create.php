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
                <h2>Создать заказ</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <!-- Вывод массива с ошибками -->
                    <?php include "../../app/helps/errorInfo.php"; ?>
                </div>
                <form action="create.php" method="post" enctype="multipart/form-data">
                <h5>Информация о заказчике</h5>
                    <div class="col mb-8">
                        <input value="<?=$name; ?>" name="name" type="text" class="form-control" placeholder="ФИО" aria-label="ФИО">
                    </div>
                    <div class="input-group">
                        <input type="<?=$phone; ?>" aria-label="phone" name="phone" class="form-control" placeholder="Номер">
                        <input type="<?=$email; ?>" aria-label="email" name="email" class="form-control" placeholder="Email">
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
                        <input type="<?=$sum; ?>" name="sum" aria-label="sum" class="form-control"placeholder="Количество">
                        <input type="<?=$width; ?>" name="width" aria-label="width" class="form-control"placeholder="Ширина">
                        <input type="<?=$length; ?>" name="length" aria-label="length" class="form-control"placeholder="Высота">
                    </div>

                    <!-- <div class="input-group col mb-4 mt-4">
                        <input value="<?=$img; ?>" name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Загрузить</label>
                    </div> -->
                <h4></h4>
                    <div class="col">
                        <label for="comment" class="form-label">Комментарий:</label>
                        <textarea name="comment" class="form-control" id="comment" rows="3"><?=$comment;?></textarea>
                    </div>
                <h4></h4>
                    <div class="input-group">
                        <input type="<?=$price; ?>" name="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text">Руб.</span>
                    </div>
                <h4></h4>
                    <!-- <div class="form-check">
                        <input name="status" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                        Открытый
                        </label>
                    </div> -->
                <h4></h4>
                    <div class="col col-6">
                        <button name="add_order" class="btn btn-primary" type="submit">Создать заказ</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- footer-->
<?php include("../../app/include/footer.php"); ?>


<script src="../../assets/js/script.js"></script>