<?php
/* What's the Problem? 
    - PHP logic + HTML in one file
    - Works, but not scalable
    - Repetition will become a problem

    How can we refactor this code so it’s easier to maintain?
*/

$items = ["Home", "About", "Contact"]; // Menu items stored in an array so they are easy to update in one place

// Outputs the opening HTML and page header
function renderHeader(string $title): void {
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
  </head>
  <body>
    <h1>Welcome</h1>
  <?php
}

// Displays the list of menu items using the array above
function renderMenu(array $items): void {
  ?>
  <ul>
    <?php foreach ($items as $item): ?>
      <li><?= htmlspecialchars($item) ?></li>
    <?php endforeach; ?>
  </ul>
  <?php
}

// Handles the footer so it doesn’t have to be repeated on every page
function renderFooter(int $year): void {
  ?>
  <footer>
    <p>&copy; <?= $year ?></p>
  </footer>
  </body>
  </html>
  <?php
}

// Build the page by calling each section separately
renderHeader("My PHP Page");
renderMenu($items);
renderFooter(2026);

/*
One thing I learned from this lab:
Breaking the page into small reusable functions makes the code
easier to maintain and will help keep my Course Project organized.
*/
?>
