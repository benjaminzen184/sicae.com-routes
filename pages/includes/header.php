<?php /* include('validate-contact.php') */ ?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    
    <!-- SEO Main Meta Tags -->
    <title></title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Geo Meta Tags -->
    <meta name="geo.placename" content="Cidade - UF, Pais" />
    <meta name="geo.region" content="BR- Estado" />
    <meta name="geo.position" content="-00.0000000; -00.0000000" />
    <meta name="ICBM" content="-00.0000000, -00.0000000" />

    <!-- Dublin Core -->
    <meta name="DC.Title" content="">
    <meta name="DC.Creator" content="">
    <meta name="DC.Subject" content="">
    <meta name="DC.Description" content="">
    <meta name="DC.Publisher" content="Author">
    <meta name="DC.Type" content="Desenvolvimento de Sites">
    <meta name="DC.Language" content="BR">

    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo HTTP; ?>">
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:site_name" content="">
    <meta property="og:image" content="<?php echo HTTP ?>assets/img/..."> 
    <meta property="og:locale" content="pt_BR">
    <meta property="og:image:width" content="1090">
    <meta property="og:image:height" content="950">

    <!-- FavIcons and Theme Color -->
    <link rel="manifest" href="<?php echo HTTP ?>favicon/manifest.json">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo HTTP; ?>favicon/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo HTTP; ?>favicon/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo HTTP; ?>favicon/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo HTTP; ?>favicon/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo HTTP; ?>favicon/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo HTTP; ?>favicon/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo HTTP; ?>favicon/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo HTTP; ?>favicon/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo HTTP; ?>favicon/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo HTTP; ?>favicon/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo HTTP; ?>favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo HTTP; ?>favicon/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo HTTP; ?>favicon/favicon-16x16.png" />
    <meta name="msapplication-TileImage" content="<?php echo HTTP; ?>favicon/ms-icon-144x144.png" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="theme-color" content="#ffffff" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HTTP . 'assets/css/imagenet.css?v=' . filemtime(PATH . 'assets/css/imagenet.css') ?>" />
    <link rel="stylesheet" href="<?php echo HTTP . 'assets/css/imagenet_mobile.css?v=' . filemtime(PATH . 'assets/css/imagenet_mobile.css') ?>" />
    <!-- <link rel="stylesheet" href="<?php echo HTTP . 'assets/js/slick/slick.css' ?>" />
    <link rel="stylesheet" href="<?php echo HTTP . 'assets/js/slick/slick-theme.css' ?>" /> -->

    <!-- JavaScript -->
    <script type="text/javascript" src="assets/icons/js/all.js"></script>
    <script src="<?php echo HTTP . 'assets/js/jquery-2.2.0.min.js?v=' . filemtime(PATH . 'assets/js/jquery-2.2.0.min.js') ?>"></script>
    <script src="<?php echo HTTP . 'assets/js/jquery.mask.js?v=' . filemtime(PATH . 'assets/js/jquery.mask.js') ?>"></script>
    <script src="<?php echo HTTP . 'assets/js/zib-slide.js?v=' . filemtime(PATH . 'assets/js/zib-slide.js') ?>"></script>
    <script src="<?php echo HTTP . 'assets/js/scripts.js?v=' . filemtime(PATH . 'assets/js/scripts.js') ?>"></script>
  </head>

  <body class="<?php echo ($route === 'login') ? 'body__login' : 'body__account' ?>">
    <!-- nav buttons -->
    <?php if($route !== 'login') { ?>
      <!-- <div class="menu__buttons menu__buttons--left">
        <button class="menu__button menu__button--top menu__button--menu"><i class="menu__icon zib zib-bars"></i></button>
        <button class="menu__button menu__button--bottom menu__button--home"><i class="menu__icon zib zib-home"></i></button>
      </div>

      <div class="menu__buttons menu__buttons--right">
        <button class="menu__button menu__button--top menu__button--notify"><i class="menu__icon zib zib-bell"></i></button>
        <button class="menu__button menu__button--bottom menu__button--search"><i class="menu__icon zib zib-magnifying-glass"></i></button>
      </div> -->
    <?php } ?>

    <!-- menu container -->
    <?php if($route !== 'login') { ?>
      <nav class="menu">
        <div class="menu__container menu__container--left">
          <a href="#">
            <img src="" alt="">
          </a>

          <button class="menu__button menu__button--menu"><i class="menu__icon fa-regular fa-bars"></i></button>
          
          <!-- menu -->
          <div class="menu__container--menu">
            <ul class="menu__ul-list menu__ul-list--menu">
              <li class="menu__ul-item"><a class="menu__link menu__ul-link" href="#">Vagas</a></li>
              <li class="menu__ul-item"><a class="menu__link menu__ul-link" href="#">Empresas</a></li>
              <li class="menu__ul-item"><a class="menu__link menu__ul-link" href="#">Notícias</a></li>
            </ul>
          </div>
        </div>

        <div class="menu__container menu__container--right">
          <!-- buttons menu right -->
          <div class="menu__container menu__container--account">
            <button class="menu__button menu__button--user"><i class="fa-regular fa-user-graduate"></i></button>
            <button class="menu__button menu__button--notify"><i class="menu__icon fa-regular fa-bell"></i></button>
            <button class="menu__button menu__button--search"><i class="menu__icon fa-regular fa-magnifying-glass"></i></button>
          </div>

          <!-- menu user -->
          <div class="menu__container--user">
            <figure class="menu__figure menu__figure--user">
              <img class="menu__image menu__image--user" src="<?php echo HTTP ?>assets/img/user-icon.jpg" alt="">
                
              <figcaption class="menu__figcaption menu__figcaption--user">
                <p class="text__medium">Nome do usário</p>
                <p class="text__small text--light-gray">11111</p>
              </figcaption>
            </figure>
            
            <hr class="a-line a-line--w85">

            <ul class="menu__ul-list  menu__ul-list--user">
              <li class="menu__ul-item"><a class="menu__ul-link menu__ul-link--user" href="#">Perfil</a></li>
              <li class="menu__ul-item"><a class="menu__ul-link menu__ul-link--user" href="#">Configurações</a></li>
              <li class="menu__ul-item"><a class="menu__ul-link menu__ul-link--user" href="#">Sair</a></li>
            </ul>
          </div>

          <!-- menu notify -->
          <div class="menu__container--notify a-scroll">
            <div class="menu__header--notify">
              <h2 class="title_large text--center">Notificações</h2>
            </div>
            
            <hr class="a-line a-line--w85">

            <ul class="menu__ul-list  menu__ul-list--notify">
              <li class="menu__ul-item--notify">
                <a class="menu__ul-link menu__ul-link--notify" href="#">
                  <figure class="menu__figure menu__figure--notify">
                    <img class="menu__image menu__image--notify" src="<?php echo HTTP ?>assets/img/user-icon.jpg" alt="">
                      
                    <figcaption class="menu__figcaption menu__figcaption--notify">
                      <p class="text__small text--max-line-1">Nome do usário</p>
                      <p class="text__xsmall text--max-line-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque officiis commodi culpa quidem itaque obcaecati quia nemo eligendi consequuntur ratione repellendus, accusantium adipisci deleniti magni iusto error quas recusandae quibusdam.</p>
                    </figcaption>
                  </figure>  
                  <div class="menu__footer--notify">
                    <p class="text__xsmall text--right text--light-gray text--max-line-3">Hoje as 8:33</p>
                  </div>
                </a>
              </li>
              
              <li class="menu__ul-item--notify">
                <a class="menu__ul-link menu__ul-link--notify" href="#">
                  <figure class="menu__figure menu__figure--notify">
                    <img class="menu__image menu__image--notify" src="<?php echo HTTP ?>assets/img/user-icon.jpg" alt="">
                      
                    <figcaption class="menu__figcaption menu__figcaption--notify">
                      <p class="text__small text--max-line-1">Nome do usário</p>
                      <p class="text__xsmall text--max-line-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque officiis commodi culpa quidem itaque obcaecati quia nemo eligendi consequuntur ratione repellendus, accusantium adipisci deleniti magni iusto error quas recusandae quibusdam.</p>
                    </figcaption>
                  </figure>  
                  <div class="menu__footer--notify">
                    <p class="text__xsmall text--right text--light-gray text--max-line-3">Hoje as 8:33</p>
                  </div>
                </a>
              </li>

              <li class="menu__ul-item--notify">
                <a class="menu__ul-link menu__ul-link--notify" href="#">
                  <figure class="menu__figure menu__figure--notify">
                    <img class="menu__image menu__image--notify" src="<?php echo HTTP ?>assets/img/user-icon.jpg" alt="">
                      
                    <figcaption class="menu__figcaption menu__figcaption--notify">
                      <p class="text__small text--max-line-1">Nome do usário</p>
                      <p class="text__xsmall text--max-line-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque officiis commodi culpa quidem itaque obcaecati quia nemo eligendi consequuntur ratione repellendus, accusantium adipisci deleniti magni iusto error quas recusandae quibusdam.</p>
                    </figcaption>
                  </figure>  
                  <div class="menu__footer--notify">
                    <p class="text__xsmall text--right text--light-gray text--max-line-3">Hoje as 8:33</p>
                  </div>
                </a>
              </li>

              <li class="menu__ul-item--notify">
                <a class="menu__ul-link menu__ul-link--notify" href="#">
                  <figure class="menu__figure menu__figure--notify">
                    <img class="menu__image menu__image--notify" src="<?php echo HTTP ?>assets/img/user-icon.jpg" alt="">
                      
                    <figcaption class="menu__figcaption menu__figcaption--notify">
                      <p class="text__small text--max-line-1">Nome do usário</p>
                      <p class="text__xsmall text--max-line-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque officiis commodi culpa quidem itaque obcaecati quia nemo eligendi consequuntur ratione repellendus, accusantium adipisci deleniti magni iusto error quas recusandae quibusdam.</p>
                    </figcaption>
                  </figure>  
                  <div class="menu__footer--notify">
                    <p class="text__xsmall text--right text--light-gray text--max-line-3">Hoje as 8:33</p>
                  </div>
                </a>
              </li>
            </ul>
          </div>

          <!-- menu search -->
          <div class="menu__container--search a-scroll">
            <div class="menu__header--search">
              <form class="a-form__form--notify" action="" method="post">
                <input class="a-form__input a-form__input--notify" type="text" name="pesquisa" placeholder="Pesquisar">

                <button class="a-form__submit button__primary button__primary--notify" type="submit"><i class="fa-regular fa-magnifying-glass"></i></button>
              </form>
            </div>
            
            <hr class="a-line a-line--w85">

            <ul class="menu__ul-list  menu__ul-list--notify">
              <li class="menu__ul-item">
                <a class="menu__ul-link menu__ul-link--search" href="#">
                  <figure class="menu__figure menu__figure--notify">
                    <img class="menu__image menu__image--notify" src="<?php echo HTTP ?>assets/img/user-icon.jpg" alt="">
                      
                    <figcaption class="menu__figcaption menu__figcaption--search">
                      <p class="text__small text--max-line-1">Empresa Fictícia</p>
                      <p class="text__xsmall text--light-gray text--max-line-1">Slogam empresa</p>
                    </figcaption>
                  </figure>
                </a>
              </li>
              
              <li class="menu__ul-item">
                <a class="menu__ul-link menu__ul-link--search" href="#">
                  <p class="text__small text--max-line-1">Nome da vaga</p>
                  <p class="text__xsmall text--light-gray text--max-line-1">Empresa Fictícia</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <?php } else { ?>
      <div></div>
    <?php } ?>

    <?php if($route !== 'login') { ?>
      <!-- search container -->
      <div></div>

    <?php } ?>
