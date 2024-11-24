<?php require "config.php"; $current_page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?php echo $website_name; ?></title>
    <meta name="description" content="<?php echo $website_meta_description; ?>">
    <meta property="og:title" content="<?php echo $website_og_title; ?>">
    <meta property="og:image" content="<?php echo $website_og_image; ?>">
    <meta property="og:url" content="<?php echo $website_og_url; ?>">
    <?php require (ROOT_PATH."src/comp/head.php"); ?>
  </head>
  <body class="homepage">
    <header class="header"><?php require (ROOT_PATH."src/comp/nav_".$nav_type.".php"); ?></header>
    <main id="main-content" class="main">
    <?php foreach ($sections as $section) require "src/comp/".$section.".php"; ?>
    </main>
    <?php require (ROOT_PATH."src/comp/footer.php"); ?>
    <?php require (ROOT_PATH."lib/bottom_script.php"); ?>
  </body>
</html>