<?php
// What I learned: Using arrays + loops (and includes) keeps pages easy to update,
// so I’ll reuse this approach in Course Project Phase One instead of copy/pasting sections.

require_once __DIR__ . '/header.php';

// Use an associative array so labels + links stay together (more maintainable).
$navItems = [
  'Home' => 'index.php',
  'About' => 'about.php',
  'Contact' => 'contact.php'
];
?>

<nav>
  <ul>
    <?php foreach ($navItems as $label => $url): ?>
      <li><a href="<?= $url ?>"><?= $label ?></a></li>
    <?php endforeach; ?>
  </ul>
</nav>

<?php require_once __DIR__ . '/footer.php'; ?>

