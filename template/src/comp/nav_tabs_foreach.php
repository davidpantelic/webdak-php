<?php foreach ($nav_tabs as $tab) : ?>
  <?php if (explode(' ', $tab['title'])[0] != "DROPDOWN") : ?>
    <li <?php echo $tab['li-class'] ? 'class="nav-item '.$tab['li-class'].'"' : 'class="nav-item"'; ?>>
      <a class="nav-link<?php echo ($tab['title'] == "HOME") ? ($current_page == 'index.php' ? ' active' : '') : ($current_page == $tab['href'].'.php' ? ' active' : ''); ?>" href="<?php echo $tab['href'] ?>" target="<?php echo $tab['target'] ?>"><?php echo $tab['text'] ?></a>
    </li>
  <?php else : ?>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="<?php echo strtolower(str_replace(' ', '-', $tab['title'])) ?>" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $tab['text'] ?></a>
      <ul class="dropdown-menu fade-in" aria-labelledby="<?php echo strtolower(str_replace(' ', '-', $tab['title'])) ?>">
        <?php foreach ($nav_subtabs as $subtab) : ?>
          <?php if ($tab['title'] == $subtab['title']) : ?>
            <li <?php echo $subtab['li-class'] ? 'class="'.$subtab['li-class'].'"' : ''; ?>>
              <a class="dropdown-item" href="<?php echo $subtab['href'] ?>"><?php echo $subtab['text'] ?></a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </li>
  <?php endif; ?>
<?php endforeach; ?>