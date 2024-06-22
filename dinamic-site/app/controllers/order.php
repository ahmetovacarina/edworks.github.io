<?php
include SITE_ROOT . '/app/database/db.php';

$errMsg = [];

$name = '';
$phone = '';
$email = '';
$object = '';
// $topic = '';
$sum = '';
$width = '';
$length = '';
$price = '';
// $img = '';
$comment = '';
$status = 1; // По умолчанию заказ считается открытым

// $topics = selectAll('topics');
$orders = selectAll('orders');
// $postsAdm = selectAllFromOrders('orders', 'topics');

// код для формы создания заказа с сайта
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_order'])){

    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $object = trim($_POST['object']);
    $sum = trim($_POST['sum']);
    $width = trim($_POST['width']);
    $length = trim($_POST['length']);
    $comment = trim($_POST['comment']);

    // Проверка на заполненность всех необходимых полей
    if($name === '' || $phone === '' || $object === '' || $sum === ''){
        // Обработка ошибки или вывод сообщения о незаполненных полях
        array_push($errMsg, 'Пожалуйста, заполните все обязательные поля.');
    } else {
        // Создание массива данных для вставки в базу данных
        $order = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'object' => $object,
            'sum' => $sum,
            'width' => $width,
            'length' => $length,
            'price' => $price,
            // 'img' => $img, // Указанное значение или по умолчанию
            'comment' => $comment,
            'status' => $status
        ];

        // Вставка данных в базу данных
        insert('orders', $order);

        // Опционально: вывод сообщения об успешной отправке заявки или редирект на другую страницу
        echo "Заявка успешно отправлена!";
    }
}

// код для формы создания заказа с админки
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_order'])) {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $object = trim($_POST['object']);
    // $topic = trim($_POST['topic']);
    $sum = trim($_POST['sum']);
    $width = trim($_POST['width']);
    $length = trim($_POST['length']);
    $price = trim($_POST['price']);
    // $img = trim($_POST['img']);
    $comment = trim($_POST['comment']);
    if (isset($_POST['status']) && $_POST['status'] == 1) {
        $status = 1;
    } else {
        $status = 0;
    }

    // Запрос к базе данных для вставки нового заказа
    $order = [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'object' => $object,
        // 'topic' => $topic,
        'sum' => $sum,
        'width' => $width,
        'length' => $length,
        'price' => $price,
        'img' => $img,
        'comment' => $comment,
        'status' => $status
    ];

    insert('orders', $order);

    // После сохранения заказа перенаправляем пользователя на другую страницу
    header('location: ' . BASE_URL . 'admin/order/index.php');
}

//код для редактирования заказа
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $order = selectOne('orders', ['id'=> $_GET['id']]);

    $id = $order['id'];
    $name = $order['name'];
    $phone = $order['phone'];
    $email = $order['email'];
    $object = $order['object'];
    // $topic = $order['topic'];
    $sum = $order['sum'];
    $width = $order['width'];
    $length = $order['length'];
    $price = $order['price'];
    // $img = $order['img'];
    $comment = $order['comment'];
    $status = $order['status'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_order'])) {
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $object = trim($_POST['object']);
    // $topic = trim($_POST['topic']);
    $sum = trim($_POST['sum']);
    $width = trim($_POST['width']);
    $length = trim($_POST['length']);
    $price = trim($_POST['price']);
    // $img = trim($_POST['img']);
    $comment = trim($_POST['comment']);
    $status = isset($_POST['status']) && $_POST['status'] == 1 ? 1 : 0;

    // Формирование массива с обновленными данными заказа
    $updatedOrder = [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'object' => $object,
        // 'topic' => $topic,
        'sum' => $sum,
        'width' => $width,
        'length' => $length,
        'price' => $price,
        // 'img' => $img,
        'comment' => $comment,
        'status' => $status
    ];

    update('orders', $id, $updatedOrder);
    header('location: ' . BASE_URL . 'admin/order/index.php');
}


//код удаления заказа в админке
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('orders', $id);
    header('location: ' . BASE_URL . 'admin/order/index.php');
}

