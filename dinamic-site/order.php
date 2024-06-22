<?php
    include 'path.php';
    include 'app/controllers/order.php';
?>

<?php include("app/include/header.php"); ?>

<!-- ORDER START -->
    <div class="container reg_form">
        <form class="row justify-content-md-center" action="order.php" method="post" enctype="multipart/form-data">
            <div class="posts col-8">
                <div class="row title-table">
                    <h2>Создать заказ</h2>
                </div>
                <!-- <div class="mb-12 col-12 col-md-12 err">
                    <p><?=$errMsg?></p>
                </div> -->
                <div class="row add-post"></div>
                    <h5>О Вас</h5>
                        <div class="col mb-8">
                            <input value="<?=$name; ?>" name="name" type="text" class="form-control" placeholder="ФИО" aria-label="ФИО">
                        </div>
                        <div class="input-group">
                            <input type="<?=$phone; ?>" aria-label="phone" name="phone" class="form-control" placeholder="Номер">
                            <input type="<?=$email; ?>" aria-label="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    <h4> </h4>

                    <h5>О заказе</h5>
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
                        <input type="<?=$width; ?>" name="width" aria-label="width" class="form-control"placeholder="Ширина гравировки">
                        <input type="<?=$length; ?>" name="length" aria-label="length" class="form-control"placeholder="Высота гравировки">
                    </div>

                    <!-- <div class="input-group col mb-4 mt-4">
                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Загрузить</label>
                    </div> -->
                <h4></h4>
                    <div class="col">
                        <label for="comment" class="form-label"></label>
                        <textarea name="comment" class="form-control" id="comment" rows="3" placeholder="Комментарий (Пожалуйста, расскажите, чего бы вы хотели)"><?=$comment;?></textarea>
                    </div>
                <h4></h4>

                    <!-- <div class="input-group">
                        <input type="<?=$price; ?>" name="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                    </div> -->
                <h4></h4>
                    <div class="col col-6">
                        <button name="user_order" class="btn btn-primary" type="submit">Сохранить и отправить</button>
                    </div>
                </form>
                <h1></h1>
            </div>

        </div>
    </div>
</div>
<!-- ORDER END -->
<!-- footer START -->
<?php include("app/include/footer.php"); ?>
