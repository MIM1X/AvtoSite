<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />

  <title>ЗапчастьCAR</title>

  <link rel="stylesheet" href="index.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" />
</head>
<body class="body">
  <div class="car">
    <section class="brand-banner">
      <div class="frame-parent">
        <header class="frame-group">
          <div class="frame-wrapper">
            <div class="frame-container">
              <div class="parent">
                <a class="a">Санкт-Петербург</a>
                <a class="a">Серебристый б-р, д. 34</a>
                <a class="norm">+7 (937) 913-81-50</a>
              </div>
              <?php
              if (!empty($_SESSION['user']))
                echo '
                <div class="auth-buttons">
                  <a class="a2">' . $_SESSION['user']['email'] . '</a>
                  <a class="a1" href="./Auth/vendor/logout.php">Выйти</a>
                </div>';
              else
                echo '
                              <div class="auth-buttons">
                                <a class="a1" onClick="window.location.href = \'./Auth/Register.php\'">Регестрация</a>
                                <a class="a2" onClick="window.location.href = \'./Auth/Auth1.php\'">Войти</a>
                              </div>
                ';
              ?>
            </div>
          </div>
          <div class="header-separator">
            <img onClick="window.location.href = 'http://localhost/AvtoSite/'" class="logo-icon" loading="lazy"
              src="./public/logo.svg" />
            <img class="icon" alt="" src="./public/@2x.png" />
          </div>
          <div class="navigation">
            <div class="nav-items">
              <a class="car1">
                <span onClick="window.location.href = 'http://localhost/AvtoSite/'"
                  class="span">запчасть<b>CAR</b></span>
              </a>
              <div class="nav-links">
                <a class="a4">КАТАЛОГ</a>
                <a class="a4">МАСЛА И ЖИДКОСТИ</a>
                <a class="a4">АВТОТОВАРЫ</a>
                <a class="a4">АКЦИИ</a>
                <a class="a4">ЮРИДИЧЕСКИМ ЛИЦАМ</a>
                <a class="a8">Корзина</a>
                <a class="a8">Заказы</a>
              </div>
            </div>
          </div>
        </header>
        <div class="wrapper">
          <div class="div1">
            <div class="div2"></div>
            <div class="car-selectors">
              <div class="div3">
                <div class="selector-buttons">
                  <div class="div4">Марка</div>
                  <div class="div5">▼</div>
                </div>
              </div>
              <div class="div3">
                <div class="item"></div>
                <div class="group">
                  <div class="div7">Модель</div>
                  <div class="div8">▼</div>
                </div>
              </div>
              <div class="div3">
                <div class="item"></div>
                <div class="group">
                  <div class="div7">Модификация</div>
                  <div class="div8">▼</div>
                </div>
              </div>
              <button class="rectangle-parent">Перейти</button>
            </div>
            <form action="./Auth/vendor/searchItem.php" method="post">
              <div class="search-input">
                <div class="vin-container">
                  <p class="p">Поиск по:</p>
                  <p class="p1">номеру запчати</p>
                  <p class="vin">VIN автомобиля</p>
                  <p class="p2">названию запчасти</p>
                </div>
                <div class="search-bar">
                  <div class="div13">
                    <input name="searchTovar" class="sjnaan16u177457"placeholder="Пример: 4134400К00 / SJNAAN16U177457 / Бензонасос 2107" type="text"/>
                  </div>
                  <button type="submit" class="rectangle-parent" id="buttonSearch">Поиск</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="spisoktovar" id="SpisokTovarov">
      <?php

      if (!empty($_SESSION['tovar'])) {
        for ($i = 0; $i < count($_SESSION['tovar']); $i++) {
          $tovar_query = http_build_query(array('tovar' => $_SESSION['tovar'][$i]));
          echo
            '
              <div class="tovar" onclick= window.location.href="./Tovar/tovar.php?'.$tovar_query.'">
                <div class="div53">
                  <a class="a11">'.$_SESSION['tovar'][$i]['Name'].'</a>
                  <a class="a11">'.$_SESSION['tovar'][$i]['Price'].' RUB</a>
                </div>
              <img class="icon2" loading="lazy" src="./public/zaza.svg"/>
              </div>
            ';
        }
        unset($_SESSION['tovar']);
      } else {
        //сообщение о пустоте результатов
        if (!empty($_SESSION['message']))
          echo '<a class = "a2">'.$_SESSION['message'].'</a>';
        unset($_SESSION['message']);
      }
      ?>
    </section>

    <footer class="footer">
      <div class="footer-columns">
        <div class="about-column">
          <div class="div17">О компании</div>
          <div class="about-links">
            <div class="div18">О компании</div>
            <div class="car2">О ЗапчастьCAR</div>
            <div class="div19">Адреса офисов</div>
            <div class="div20">Связаться с нами</div>
            <div class="div21">Вакансии</div>
            <div class="div22">Новости</div>
            <div class="div23">Статистика</div>
            <div class="div24">Правовая информация</div>
          </div>
        </div>
        <div class="about-column">
          <div class="div25">Интернет магазин</div>
          <div class="about-links">
            <div class="div26">Поиск автозапчастей и аксессуаров</div>
            <div class="div27">Доставка заказа</div>
            <div class="div28">Как оплатить заказ</div>
            <div class="div29">Условия возврата и гарантии</div>
            <div class="div30">Стать клиентом</div>
            <div class="div31">Восстановить пароль</div>
            <div class="div32">Форумы</div>
            <div class="div33">Помощь</div>
          </div>
        </div>
        <div class="about-column">
          <div class="catalog">
            <div class="div34">Каталог товаров</div>
          </div>
          <div class="about-links">
            <div class="div35">Каталоги автозапчастей</div>
            <div class="div36">Все для автосервиса</div>
            <div class="div37">Шины, диски</div>
            <div class="div38">Масла и ГСМ</div>
            <div class="div39">Аккумуляторы</div>
            <div class="div40">Аксессуары</div>
            <div class="div41">Мотокаталоги</div>
            <div class="div42">Автоэлектроника</div>
          </div>
        </div>

        <div class="about-column">
          <div class="partnership-links">
            <div class="div43">Партнерство</div>
            <div class="partnership-types">
              <div class="div44">Как стать партнером</div>
              <div class="div45">Таблица скидок</div>
              <div class="div46">Регионам</div>
              <div class="partner-programs">
                <div class="div47">Поставщикам</div>
                <div class="div48">Юридическим лицам</div>
                <div class="div49">Производителям</div>
                <div class="div50">Партнерские программы</div>
              </div>
            </div>
          </div>
          <div class="ad-column">
            <div class="div51">Реклама</div>
            <div class="ad-types">
              <div class="direct">@DIRECT продажи</div>
              <div class="div52">Реклама на сайте</div>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom-separator">
        <img class="icon1" loading="lazy" alt="" src="./public/2.svg" />
      </div>
      <div class="copyright">
        <div class="copyright-info">
          <div class="car-2024">© ЗапчастьCAR 2024</div>
          <div class="links">
            <div class="s41bkru">41s41@bk.ru</div>
            <div class="mimx-mk2">@MIMX_Mk2</div>
            <div class="link-items">+7 (937) 913-81-50</div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</body>
</html>