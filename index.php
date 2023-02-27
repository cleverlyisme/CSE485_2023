<?php 
            include './includes/database-connection.php';  
           include './includes/functions.php';  
          
            $sql = "SELECT * FROM `baiviet`";
            $arr = pdo($pdo, $sql)->fetchAll();  
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <na class="nab3">
            <div class="container-fluid">
                <div class="my-logo">
                    <a class="nabar-brand" href="#">
                        <img src="images/logo2.png" alt="" class="img-fluid">
                    </a>
                </div>
                <button class="nt" type="button" data-bs-toggle="collapse" data-bs-target="#nabarSupportedContent" aria-controls="nabarSupportedContent" aria-expanded="false" aria-label="Toggle naigation">
                <span class="nt-icon"></span>
                </button>
                <div class="collapse nabar-collapse" id="nabarSupportedContent">
                <ul class="nabar-na me-auto mb-2 mb-lg-0">
                    <li class="na-item">
                    <a class="na-link active" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="na-item">
                    <a class="na-link" href="./login.php">Đăng nhập</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control" type="search" placeholder="Nội dung cần tìm" aria-label="Search">
                    <button class="btn-outline" type="submit">Tìm</button>
                </form>
                </div>
            </div>
        </na>

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
            <button class="ccontrol-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="ccontrol-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="ccontrol-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="ccontrol-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
    </header>

    <main class="container-fluid mt-3">
        <h3 class="text-center">TOP bài hát yêu thích</h3>
        <div class="row">
        <?php 
                foreach($arr as $key => $item){
                    ?>
                        <div class="col-sm-3">
                            <a href="detail.php?id=<?php echo $item['ma_bviet'] ?>"><div class="card mb-2" style="width: 100%;">
                                <img src="images/songs/<?php echo !empty($item['hinhanh']) ? $item['hinhanh'] : (str_replace('-','',create_slug($item['ten_bhat'])).".jpg")  ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <a href="detail.php?id=<?php echo $item['ma_bviet'] ?>" class="text-decoration-none"><?php echo $item['ten_bhat'] ?></a>
                                    </h5>
                                </div>
                            </div></a>
                        </div>
                    <?php
                }
            ?>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>