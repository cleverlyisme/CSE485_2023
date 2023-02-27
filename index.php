<?php 
            include './includes/database-connection.php';  
            include './includes/functions.php';  
            include './includes/header.php';
            include './services/article.service.php';
          
            if (isset($_POST['search'])) $data=$_POST['search'] != '' ? getArticleByName($pdo, $_POST['search']) : getAllArticles($pdo);
            else $data = getAllArticles($pdo);
    ?>
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/slideshow/slide01.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="images/slideshow/slide02.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="images/slideshow/slide03.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
    </header>

    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 text-primary">TOP bài hát yêu thích</h3>
        <div class="row">
        <?php 
                foreach($data as $baiviet){
                    ?>
                        <div class="col-sm-3">
                              <div class="card mb-2" style="width: 100%;">
                                <img src="images/songs/<?= $baiviet['hinhanh'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <a href="detail.php?id=<?= $baiviet['ma_bviet'] ?>" class="text-decoration-none"><?= $baiviet['tieude'] ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </main>
    <?php include "./includes/footer.php" ?>
    
