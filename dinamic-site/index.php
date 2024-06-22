<?php
    include "path.php";
    include "app/controllers/topics.php";

    $page = isset($_GET['page']) ? $_GET['page']: 1;
    $limit = 4;
    $offset = $limit * ($page - 1);
    $total_pages = round (countRow('posts') / $limit, 0);

    $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users', $limit, $offset);
    $topTopic = selectTopTopicFromPostsOnIndex('posts');
?>

<?php include 'app/include/header.php'; ?>


<!-- блок карусели START -->
<div class="container">
    <div class="row">
        <h2 class="slider-title">Наши работы</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($topTopic as $key => $post): ?>
                    <?php if($key == 0):?>
                    <div class="carousel-item active" data-bs-interval="10000">
                        <?php else: ?>
                        <div class="carousel-item">
                    <?php endif; ?>
                        <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?= $post['title'] ?>" class="d-block w-100">
                        <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                            <h5><a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?>"><?=substr($post['title'], 0, 120) ?></a></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div> 
<!-- блок карусели END -->

<!-- блок main START -->
<div class="container">
    <div class="container row">
        <!-- Main Content -->
        <div class="main-content col-md-9 col-12">
            <h2>Последние работы</h2>
            <?php foreach ($posts as $post): ?>
            <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?= $post['title'] ?>" class="img-thumbnail">
                    </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?>"><?=substr($post['title'], 0, 80) ?></a>
                    </h3>
                    <i class="far fa-user"> <?=$post['username']; ?></i>
                    <i class="far fa-calendar"> <?=$post['created_date']; ?></i>
                    <p class="preview-text">
                    <?=mb_substr($post['content'], 0, 300, 'UTF-8') . '...' ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

<!-- sidebar Content -->
        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Поиск</h3>
                <form action="search.php" method="post">
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
    <!-- pagination -->
    <?php include("app/include/pagination.php"); ?>
<!-- end pagination -->
    </div>
</div>

<!-- блок main END -->

<!-- footer START -->
<?php include("app/include/footer.php"); ?>
<!-- footer END -->
