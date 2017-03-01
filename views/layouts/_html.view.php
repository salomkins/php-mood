<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="libraries/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="navigation-container" id="top">
        <!-- <div class="main-site-width"> -->

            <div class="logo-info">
                <a href="#header">
                    <img src="media/logo_vertikali.png" alt="logo">
                    <div class="logo-text">
                        dizaina darbnīca
                    </div>
                </a>
            </div>

            <nav class="main-nav">
                <?php echo HtmlLib::render_nav($menu_lang, $menu_cfg) ?>
            </nav>
            <div class="language-nav">
                <nav class="translate">
                    <?php foreach($app->getSupportedLocales() as $locale) : ?>
                    <a class="lang-btn" href="/?lang=<?= $locale; ?>"><?= $locale; ?></a>
                        <?php endforeach; ?>
                </nav>
              <!--<nav class="translate">
                <a class="lang-btn" href="">lv</a>
                <a class="lang-btn" href="">en</a>
                <a class="lang-btn" href="">ru</a>
              </nav>-->
            </div>
        <!-- </div> -->
    </div>

    <?php
    include '../views/layouts/header.view.php'
     ?>


    <?php
    include '../views/layouts/offersSection.view.php'
     ?>

     <?php
     include '../views/layouts/workSection.view.php'
      ?>

      <?php
      include '../views/layouts/pricelistSection.view.php'
       ?>

       <?php
       include '../views/layouts/teamSection.view.php'
        ?>

        <?php
        include '../views/layouts/contactFormSection.view.php'
         ?>

         <?php
         include '../views/layouts/mapSection.view.php'
          ?>





        <!-- ========================PAGE FOOTER======================================== -->
        <div class="copyright cf">
            <div class="main-site-width">
                &copy; Copyright tekstam ir jābūt šeit, 2016
            </div>
        </div>
        <!-- ========================PAGE FOOTER END======================================== -->
        <script src="js/helper.js"></script>
        <script src="js/smoothScroll.js"></script>
        <script src="js/formValidation.js"></script>
        <script src="js/slider.js"></script>
        <script src="js/workGallery.js"></script>
</body>

</html>
