<?php
    include("path.php");
    include "app/controllers/topics.php";

    $post = selectPostFromPostsWithUsersOnSingle('posts', 'users', $_GET['post']);
?>

<?php include("app/include/header.php"); ?>


<!-- блок main START -->
<div class="container">
    <div class="container row">
        <!-- Main Content -->
        <div class="main-content col-md-9 col-12">
            <h2><?php echo $post['title']; ?></h2>

            <div class="single_post">
                <div class="img col-12">
                    <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?= $post['title'] ?>" class="img-thumbnail">
            </div>
            <div class="info">
                <i class="far fa-user"> <?=$post['username']; ?></i>
                <i class="far fa-calendar"> <?=$post['created_date']; ?></i>
            </div>
            <div class="single_post_text col-12">
                <?=$post['content']; ?>
            </div>
            </div>


        </div>
        <!-- sidebar Content -->
        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите значение...">
                </form>
            </div>

            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <?php foreach ($topics as $key => $topic): ?>
                    <li>
                        <a href="<?=BASE_URL . 'category.php?id=' . $topic ['id']; ?>"><?=$topic ['name']; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</div>

<!-- блок main END -->
<!-- footer -->
<?php include("app/include/footer.php"); ?>
