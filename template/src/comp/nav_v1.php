<a href="#main-content" class="visually-hidden">skip to main content</a>
<nav class="navbar nav-v1 navbar-expand-lg fixed-top" aria-label="Navigation">
  <div class="container-fluid">

    <a class="navbar-brand" href="home#" aria-label="homepage"><img src="<?php echo $logo_url ?>" alt="Webdak logo" class="d-inline-block align-text-top"></a>

    <div class="social-links d-lg-none">
      <ul class="navbar-nav ms-auto">
        <?php require (ROOT_PATH."src/comp/nav_social_icons_foreach.php"); ?>
      </ul>
    </div>

    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navigationID" aria-controls="navigationID" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-line"></span>
      <span class="navbar-toggler-line"></span>
      <span class="navbar-toggler-line"></span>
    </button>

    <div class="navbar-collapse collapse justify-content-md-center" id="navigationID" style="">
      <ul class="navbar-nav tabs mx-auto mb-2 mb-md-0">
        <?php require (ROOT_PATH."src/comp/nav_tabs_foreach.php"); ?>
      </ul>
    </div>
    <div class="social-links d-none d-lg-block">
      <ul class="navbar-nav ms-auto">
        <?php require (ROOT_PATH."src/comp/nav_social_icons_foreach.php"); ?>
      </ul>
    </div>
  </div>
</nav>