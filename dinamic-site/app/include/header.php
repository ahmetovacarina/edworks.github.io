<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootsrap CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/818693f802.js" crossorigin="anonymous"></script>

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Fonts Google шрифты -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <title>Edworks</title>
</head>
<body>

<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="<?php echo BASE_URL ?>">Edworks</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>">Наши работы</a></li>
                    <li><a href="<?php echo BASE_URL . 'order.php'; ?>"> Заказать</a></li>
                    <!-- <li><a href="<?php echo BASE_URL . 'about.php'; ?>"> О нас</a></li> -->

                    <li>
                        <?php if (isset($_SESSION['id'])): ?>
                        <a href="<?php echo BASE_URL . 'log.php'; ?>">
                            <i class="fa-solid fa-user"></i>
                            <?php echo $_SESSION['login']; ?>
                        </a>
                        <ul>
                            <?php if ($_SESSION['admin']): ?>
                                <li><a href="<?php echo BASE_URL . 'admin/posts/index.php'; ?>">Админ панель</a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo BASE_URL . 'logout.php'; ?>">Выход</a></li>
                        </ul>
                        <?php else: ?>
                            <a href="<?php echo BASE_URL . 'log.php'; ?>">
                                <i class="fa fa-user"></i>
                                Войти
                            </a>
                            <ul>
                            <li><a href="<?php echo BASE_URL . 'reg.php'; ?>">Регистрация</a></li>
                        </ul>
                        <?php endif; ?>


                    </li>

                </ul>
            </nav>
        </div>
    </div>
</header>