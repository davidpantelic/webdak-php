<?php require "../config.php"; $current_page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Plastic Reservoirs and Tanks from Serbia - About Us</title>
    <meta name="description" content="Reprensentation of manufactures of plastic reservoirs, tanks, and other plastic products from Serbia">
    <meta name="keywords" content="Plastic Reservoirs, Plastic Tanks">
    <meta property="og:title" content="Plastic Reservoirs and Tanks from Serbia - About Us">
    <meta property="og:image" content="img/share_image.jpg">
    <meta property="og:url" content="https://www.webdak/template.com">
    <?php require (ROOT_PATH."src/comp/head.php"); ?>
  </head>
  <body id="body" class="other-page about-page">
    <header class="header"><?php require (ROOT_PATH."src/comp/nav_".$nav_type.".php"); ?>
    </header>
    <main class="main">
      <section>
        <h1 class="title">About Us</h1>
        <h2 class="subtitle-big">Coming soon</h2>
      </section>
    </main>
    <?php require (ROOT_PATH."src/comp/footer.php"); ?>
    <?php require (ROOT_PATH."lib/bottom_script.php"); ?>
  </body>
</html>