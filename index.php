<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="mobile.css">
    <link rel="shortcut icon" href="/assets/img/barber.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Каприз</title>
</head>
<body>
                    <!-- ### HEADER ### -->
    <header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="#">Каприз</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Главная</a>
            </li>
            <li class="nav-item">
            <?php session_start(); if(isset($_SESSION['user'])){?>
                    <a class="nav-link" href="/barber/barber.php">Записаться</a>
                    
                <?} else{?>
                    <a class="nav-link" href="/account/index.php">Записаться </a>
                    <?}?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about_us">О нас</a>
            </li>
        </ul>
        <?php
            session_start();
            if (isset($_SESSION['user'])) {?>
        <a class="h5 navbar-brand " href="/account/profile.php" style=" z-index:4; position:absolute;font-size:24px !important; top:55px !important; width:250px !important;right:10px !important;" >
           <?=$_SESSION['user']['client_name']?>
        </a>                
            <?
            }
            elseif (isset($_SESSION['admin'])) {?>
                    <a class="navbar-brand " href="/admin_panel/index.php">
                        Админ-панель
                    </a>
            <?}
            else{?>
                    <a class="navbar-brand me-5" href="/account/index.php">
                        <img src="/assets/img/image 1 (1).png"  style="width:40px;" class=" img-fliud rounded-pill profile_icon"> 
                    </a>
                <?
            }

        ?>

    </div>

    </nav>

    <div>
        <h2 class="slogan">
            Исполним любой Ваш каприз
        </h2>
        <button class="more" >
            <a href="#slider">Подробнее</a> 
        </button>


            <img src="/assets/img/welcome.png" class="barber-header" alt="">


        <img class="wave" src="/assets/img/Vector.png" alt="">
    </div>
    </header>
                    <!-- ### MAIN ### -->
    <main>
        <section class="slider" id="slider">
            <!-- добавь в бд таблицу для фото и в админку для изменения -->

            <!-- карусель из бустстрапа -->
<!-- Carousel -->
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>
            <?php
                
            ?>
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="/assets/img/u-parikmahera.jpg"   class=" img-fliud d-block">
                </div>
                <div class="carousel-item">
                <img src="/assets/img/IMG_4865 1.png"  class="d-block img-fliud" >
                </div>
                <div class="carousel-item">
                <img src="/assets/img/IyuNe81Ftcg.jpg"  class="d-block img-fliud" >
                </div>
            </div>
            
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
            </div>

        </section>

        <section class="about_us" id="about_us">
            <h2>Наши преимущества</h2>
            <div class="container">
                <div class="row">
                    <div class="col-3 a_u-block">
                        <img src="assets/img/ind_pod.png" alt="" class="img-fluid">
                        <h3 class="text-center">Личный подход</h3>
                    </div>
                    <div class="col-3 ms-3">
                        <img src="assets/img/exp.png" alt="" class="img-fluid">
                        <h3 class="text-center">Профессионализм</h3>
                    </div>
                    <div class="col-3 ms-3">
                        <img src="assets/img/comfort.png" alt="" class="img-fluid">
                        <h3  class="text-center comfort">Комфорт</h3>
                    </div>
                </div>
            </div>
        </section>



        <section class="go">
            <h3 class="question">
                Стрижки
            </h3>
            <div class="man">
                <img class="man-ph" src="/assets/img/handsome-man-cutting-beard-at-a-barber-shop-salon 1 (1).png" alt="">
                <p class="man-price" >Мужская - 400₽</p>
            </div>

            <div class="woman" >
                <img class="woman-ph" src="/assets/img/woman-getting-her-hair-cut-at-the-beauty-salon 1.png" alt="">
                <p class="woman-price" >Женская - 700₽</p>
            </div>
            
        </section>

    </main>
                    <!-- ### FOOTER ### -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col mt-4 socety">
                    <a href="https://www.flaticon.com/search?word=vk">
                        <img class="vk" src="/assets/img/vk (1).png" alt="">
                    </a>
                    <a href="https://link.2gis.ru/3.2/aHR0cHM6Ly90Lm1lLys3OTE3MDk4MjY3MwpodHRwczovL3MxLmJzcy4yZ2lzLmNvbS9ic3MvMwpbeyJjb21tb24iOnsiZm9ybWF0VmVyc2lvbiI6MywiYXBwVmVyc2lvbiI6IjIwMjMtMDYtMDktMTQiLCJwcm9kdWN0IjozNCwiYXBpa2V5IjoicnVyYmJuMzQ0NiIsImFwaWtleVN0YXR1cyI6MSwidXNlciI6IjBlMzU0OGYwLWU5MDgtNGQ0My1iZmIwLTNhN2UwYzYwYTg4MiIsImlwIjoiMTc2LjEwMC4xMTguMTc2Iiwic2Vzc2lvbklkIjoiYWE2ZGMyMmQtZGE1ZS00MGU3LWFkNTQtNjg3OWQ0NGQxZTI5IiwidXNlckFnZW50IjoiTW96aWxsYS81LjAgKFdpbmRvd3MgTlQgMTAuMDsgV2luNjQ7IHg2NCkgQXBwbGVXZWJLaXQvNTM3LjM2IChLSFRNTCwgbGlrZSBHZWNrbykgQ2hyb21lLzExMi4wLjAuMCBZYUJyb3dzZXIvMjMuNS4xLjcyMSBZb3dzZXIvMi41IFNhZmFyaS81MzcuMzYiLCJkZXZpY2VUeXBlIjoiZGVza3RvcCIsInBlcnNvbmFsRGF0YUNvbGxlY3Rpb25BbGxvd2VkIjp0cnVlfSwidXRjT2Zmc2V0IjoiKzA0OjAwIiwidGFiSWQiOiJmYTA2OGUwMC1mNDAxLTRjM2QtOGRmYy0zOTdmMTc5Y2UwNWEiLCJ0aW1lc3RhbXAiOjE2ODY1ODQ3Njk4OTYsInR5cGUiOjIxMSwiZXZlbnRUeXBlIjoiYWN0aW9uIiwiZXZlbnRJZCI6ImNmN2U2YjExLTk5NTItNDE5Ny05MTA4LWVmNzMyYjM3YzZhMCIsImFjdGlvblR5cGUiOiJleHRlcm5hbExpbmsiLCJldmVudE9yZGluYWwiOjAsInVpRWxlbWVudCI6eyJuYW1lIjoiY29udGFjdCIsIm93bmVyTmFtZSI6ImNhcmRDb250YWN0cyIsInBvc2l0aW9uIjoyLCJmcmFtZVV1aWQiOiJiNWUxZWI0NC0zNzc0LTQ2M2MtYTQyMi0xMjIwYjRkODkwYWMifSwicGF5bG9hZCI6eyJjb250YWN0Ijp7InZhbHVlIjoiaHR0cHM6Ly90Lm1lLys3OTE3MDk4MjY3MyIsInR5cGUiOiJ0ZWxlZ3JhbSIsInBvc2l0aW9uIjoyfSwicGxhY2VJdGVtIjp7ImVudGl0eSI6eyJpZCI6IjExMjY0MjgxODc5ODY5NjkiLCJ0eXBlIjoiYnJhbmNoIiwic2VnbWVudEluZm8iOnsiYmFzZUxvY2FsZSI6InJ1X1JVIiwic2VnbWVudElkIjoiOCJ9fSwiZ2VvUG9zaXRpb24iOnsibG9uIjo0OC4wMTc2NDYsImxhdCI6NDYuMzM1MTIzfSwiYWRzU2VhcmNoIjpmYWxzZSwibWFpblJ1YnJpYyI6IjMwNSIsImlzRGVsZXRlZCI6ZmFsc2UsIm9yZyI6IjExMjY0MzY3Nzc4ODQyMDIiLCJyZXN1bHRDbGFzcyI6MSwiY3VycmVudENvbmdlc3Rpb24iOiJjbG9zZWQifSwiZXh0ZXJuYWxMaW5rIjp7ImZvcmtFdmVudE9yZGluYWwiOjE0OCwicGFyZW50VGFiSWQiOiI0OGJmOTlmNS1jNTZjLTRkZWMtYWM5ZC0zMGNhZTI1NDk0N2UifX19XQ%3D%3D">
                        <img src="/assets/img/telegram.png" alt="">
                    </a>
                    <a href="">
                        <img src="/assets/img/mail 1.png" alt="">
                    </a>
                </div>
            </div>
            <div class="row mt-5">
                <p class="navbar-brand h2 text-white" href="#">Каприз</p>
            </div>
            <div class="row">
                <div class="info">
                    <p class="h3 text-white">Ежедневно с 09:00 до 19:00</p>
                    <h4 class="phone text-white">+7 (8512) 70‒64‒94</h4>
                    <a href="https://2gis.ru/astrakhan/firm/1126428187986969" class="address">Богдана Хмельницкого, 22​цокольный этаж</a>
                    <p class="copyright">
                        © 2023, Каприз. Все права сохранены. Каприз, логотип Каприз  являются товарными знаками или зарегистрированными товарными знаками Каприз. в России. Все прочие марки и наименования продукции являются товарными знаками соответствующих владельцев.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>