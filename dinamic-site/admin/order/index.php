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
                <a href="<?php echo BASE_URL . "admin/order/create.php"; ?>" class="col-3 btn btn-success">Создать новый</a>
            </div>
            <div class="row title-table">
                <h2>Заказы</h2>
                <div class="col-1">ID</div>
                <div class="col-4">Название</div>
                <div class="col-2">ФИО</div>
                <div class="col-2">Номер</div>
                <div class="col-3">Управление</div>
            </div>
            <?php foreach ($orders as $key => $order): ?>
            <div class="row post">
                <div class="id col-1"><?=$key + 1; ?></div>
                <div class="title col-4"><?=mb_substr($order['object'], 0, 50, 'UTF-8'); ?></div>
                <div class="author col-2"><?=$order['name']; ?></div>
                <div class="number col-2"><?=$order['phone']; ?></div>
                <div class="red col-1"><a href="edit.php?id=<?=$order['id'];?>">prev</a></div>
                <div class="del col-1"><a href="edit.php?delete_id=<?=$order['id'];?>">delete</a></div>
                <?php if ($order['status']): ?>
                    <div class="status col-1"><a href="edit.php?publish=0&pub_id=<?=$order['id'];?>">закрыть</a></div>
                <?php else: ?>
                    <div class="status col-1"><a href="edit.php?publish=1&pub_id=<?=$order['id'];?>">открыть</a></div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<!-- footer-->
<?php include("../../app/include/footer.php"); ?>
