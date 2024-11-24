<?php require "config.php"; $current_page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Plastic Reservoirs and Tanks from Serbia</title>
    <meta name="description" content="Reprensentation of manufactures of plastic reservoirs, tanks, and other plastic products from Serbia">
    <meta name="keywords" content="Plastic Reservoirs, Plastic Tanks">
    <meta property="og:title" content="Plastic Reservoirs and Tanks from Serbia">
    <meta property="og:image" content="img/share_image.jpg">
    <meta property="og:url" content="https://www.webdak/template.com">
    <?php require (ROOT_PATH."src/comp/head.php"); ?>
  </head>
  <body id="body" class="other-page page-404">
    <header class="header"><?php require (ROOT_PATH."src/comp/nav_".$nav_type.".php"); ?>
    </header>
    <main class="main">
      <section>
        <h2 class="subtitle-big">Oops, the requested page does not exist...</h2>
      </section>
    </main>
    <footer class="footer"><?php require (ROOT_PATH."src/comp/footer.php"); ?></footer>
  </body>
</html>