<?php session_start();
require_once '../Auth/vendor/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tovar.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" />
    <title><?php echo $_GET['tovar']['Name'] . ' - ' . $_GET['tovar']['Price'] . ' RUB'; ?></title>
</head>

<body>
    <div class="tovar">
        <section class="tovar-inner">
            <div class="header-parent">
                <header class="header">
                    <img onClick="window.location.href = '../index.php'" class="logo-icon" loading="lazy" alt=""
                        src="../public/logo.svg" />
                    <div class="header1">
                        <div class="div">
                            <nav class="location">
                                <a>Санкт-Петербург</a>
                                <a> Серебристый б-р, д. 34</a>
                                <a>+7 (937) 913-81-50</a>
                            </nav>
                            <?php
                            if (!empty($_SESSION['user']))
                                echo '
                                    <div class="auth-buttons">
                                    <a class="a1">' . $_SESSION['user']['email'] . '</a>
                                    <a href="../Auth/vendor/logout.php">Выйти</a>
                                    </div>';
                            else
                                echo '
                                    <div class="auth-buttons">
                                        <a class="a" onClick="window.location.href = \'../Auth/Register.php\'">Регестрация</a>
                                        <a class="a1" onClick="window.location.href = \'../Auth/Auth1.php\'">Войти</a>
                                    </div>';
                            ?>
                        </div>
                        <img class="icon" loading="lazy" alt="" src="../public/@2x.png" />
                    </div>
                </header>
                <div class="sectiontovar-wrapper">
                    <div class="sectiontovar">
                        <div class="border"></div>
                        <div class="nametovar"> <?php echo $_GET['tovar']['Name'] ?> </div>
                        <div class="product-details">
                            <div class="details-container">
                                <div class="main-details">
                                    <div class="price-stock">
                                        <div class="price">
                                            <a class="a1">Цена:</a>
                                            <a><?php echo $_GET['tovar']['Price'] ?> RUB</a>
                                        </div>
                                        <div class="price">
                                            <a class="a1">Номер запчасти:</a>
                                            <a> <?php echo $_GET['tovar']['Part_Num'] ?></a>
                                        </div>
                                        <div class="price">
                                            <a class="a1">В наличии:</a>
                                            <a><?php  echo $_GET['tovar']['Stock'] ?>
                                                шт.</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="additional-details">
                                    <div class="characteristics-container">
                                        <div class="charact">Описание:</div>
                                        <div class="textcharact">
                                            <?php echo $_GET['tovar']['Description'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="zaza">
                                <div class="descrip">Характеристики:</div>
                                <p class="full-description">
                                    <?php echo $_GET['tovar']['Characteristics'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="buttonsBuy">
            <?php 
            if(!empty($_SESSION['user'])){
                echo'
                <form method="POST" action="../Cart/cart.php?id='.$_GET['tovar']['ProductID'].'&name='.$_GET['tovar']['Name'].'">
                <input name="count" placeholder="Кол-во" type="number" min="1" max="'.$_GET['tovar']['Stock'].'" required></input>
                    <button>В корзину</button>
                </form>
            ';
            }else echo 'Что-бы сделать заказ, нужно войти в аккаунт';

            ?>

        </section>
        <footer class="footer">
            <div class="div2"></div>
            <div class="footer-content">
                <div class="company-info">
                    <div class="div3">О компании</div>
                    <div class="company-links">
                        <div class="div4">О компании</div>
                        <div class="car">О ЗапчастьCAR</div>
                        <div class="div5">Адреса офисов</div>
                        <div class="div6">Связаться с нами</div>
                        <div class="div7">Вакансии</div>
                        <div class="div8">Новости</div>
                        <div class="div9">Статистика</div>
                        <div class="div10">Правовая информация</div>
                    </div>
                </div>
                <div class="shop-info">
                    <div class="shop-content">
                        <div class="div11">Интернет магазин</div>
                        <div class="shop-links">
                            <div class="div12">Поиск автозапчастей и аксессуаров</div>
                            <div class="div13">Доставка заказа</div>
                            <div class="div14">Как оплатить заказ</div>
                            <div class="div15">Условия возврата и гарантии</div>
                            <div class="div16">Стать клиентом</div>
                            <div class="div17">Восстановить пароль</div>
                            <div class="div18">Форумы</div>
                            <div class="div19">Помощь</div>
                        </div>
                    </div>
                    <div class="catalog-info">
                        <div class="catalog-content">
                            <div class="div20">Каталог товаров</div>
                        </div>
                        <div class="catalog-links">
                            <div class="div21">Каталоги автозапчастей</div>
                            <div class="div22">Все для автосервиса</div>
                            <div class="div23">Шины, диски</div>
                            <div class="div24">Масла и ГСМ</div>
                            <div class="div25">Аккумуляторы</div>
                            <div class="div26">Аксессуары</div>
                            <div class="div27">Мотокаталоги</div>
                        </div>
                        <div class="div28">Автоэлектроника</div>
                    </div>
                </div>
                <div class="partnership-info">
                    <div class="partnership-content">
                        <div class="div29">Партнерство</div>
                        <div class="partnership-links">
                            <div class="div30">Как стать партнером</div>
                            <div class="div31">Таблица скидок</div>
                            <div class="div32">Регионам</div>
                            <div class="more-partnership">
                                <div class="div33">Поставщикам</div>
                                <div class="div34">Юридическим лицам</div>
                                <div class="div35">Производителям</div>
                                <div class="div36">Партнерские программы</div>
                            </div>
                        </div>
                    </div>
                    <div class="advertisement">
                        <div class="div37">Реклама</div>
                        <div class="ads-links">
                            <div class="direct">@DIRECT продажи</div>
                            <div class="div38">Реклама на сайте</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-divider">
                <img class="icon1" loading="lazy" alt="" src="../public/2.svg" />
            </div>
            <div class="copyright-content-wrapper">
                <div class="copyright-content">
                    <div class="car-2024">© ЗапчастьCAR 2024</div>
                    <div class="legal-info">
                        <div class="s41bkru">41s41@bk.ru</div>
                        <div class="mimx-mk2">@MIMX_Mk2</div>
                        <div class="div39">+7 (937) 913-81-50</div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>