<?php
    include "path.php";
    include "app/controllers/topics.php";

    $page = isset($_GET['page']) ? $_GET['page']: 1;
    $limit = 2;
    $offset = $limit * ($page - 1);
    $total_pages = round (countRow('posts') / $limit, 0);

    $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users', $limit, $offset);
    $topTopic = selectTopTopicFromPostsOnIndex('posts');
?>

<?php include 'app/include/header.php'; ?>

<div class="footer container-fluid">
    <div class="footer-content container">
        <div class="row">

            <div class="footer-section links col-md-4 col-12">
                <h3>Edworks</h3>
                <h4>Студия лазерной гравировки</h4>
                <br>
                <!-- <ul>
                    <a href="#">
                        <li>Галлерея</li>
                    </a>
                    <a href="#">
                        <li>Что-то</li>
                    </a>
                </ul> -->
            </div>

            <div class="footer-section about col-md-4 col-12">
                <h4 class="logo-text">г.Казань, ул. Баумана, д.62</h4>
                <!-- <p>
                    Свяжитесь с нами
                </p> -->
                <div class="contact">
                    <span><i class="fas fa-phone"></i> &nbsp; +7(919)1596567</span>
                    <!-- <span><i class="fas fa-envelope"></i> &nbsp; e-mail</span> -->
                </div>
                <div class="socials">
                    <a href="#"><i class="fab fa-telegram"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; edworks.com
            </div>
            
        </div>
    </div>
</div>

