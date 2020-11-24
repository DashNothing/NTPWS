<?php
  # Start session
  session_start();

  # Connect to MySQL database
	$MySQL = mysqli_connect("localhost:3307","root","pass","ntpws") or die('Error connecting to MySQL server.');

  if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }

  if (!isset($menu)) { $menu = 1; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="VJežbe iz kolegija Napredne tehnike projektiranja web servisa ">
  <meta name="keywords" content="vježbe,vjezbe,tvz,napredne tehnike projektiranja web servisa">
  <meta name="author" content="Toni Stokić">

  <link rel="stylesheet" href="style/style.css">

  <?php
    # News style
    if (isset($_GET["menu"])) {
      if ($_GET["menu"] == 2) {
        print '<link rel="stylesheet" href="style/news.css">';
      }
      else if ($_GET["menu"] == 3) {
        print '<link rel="stylesheet" href="style/contact.css">';
      }
      else if ($_GET["menu"] == 4) {
        print '<link rel="stylesheet" href="style/about.css">';
      }
      else if ($_GET["menu"] == 5) {
        print '<link rel="stylesheet" href="style/gallery.css">';
      }
      else if ($_GET["menu"] == 6) {
        print '<link rel="stylesheet" href="style/nutrition.css">';
      }
      else if ($_GET["menu"] == 7) {
        print '<link rel="stylesheet" href="style/register.css">';
      }
      else if ($_GET["menu"] == 8) {
        print '<link rel="stylesheet" href="style/signin.css">';
      }
      else if ($_GET["menu"] == 9) {
        print '<link rel="stylesheet" href="style/admin.css">';
      }
    }
  ?>

  <title>NTPWS Website</title>
</head>
<body>

  <header <?php if (!isset($_GET["menu"]) || $_GET["menu"] == 1) { print 'class="header-big"'; } else { print 'class="header-small"'; } ?>>
    <nav>
      <?php include("menu.php") ?>
    </nav>
  </header>

  <?php
    if (isset($_SESSION['message'])) {
      print '<div class="message">' . $_SESSION['message'] . '</div>';
      unset($_SESSION['message']);
    }
  ?>

  <main>

    <?php

      # Homepage
      if (!isset($_GET["menu"]) || $_GET["menu"] == 1) {
        include("home.php");
      }

      # News
      else if ($_GET["menu"] == 2) {
        include("news.php");
      }

      # Contact
      else if ($_GET["menu"] == 3) {
        include("contact.php");
      }

      # About us
      else if ($_GET["menu"] == 4) {
        include("about.php");
      }

      # Gallery
      else if ($_GET["menu"] == 5) {
        include("gallery.php");
      }

      # Nutrition APO
      else if ($_GET["menu"] == 6) {
        include("nutrition.php");
      }

      # Register
      else if ($_GET["menu"] == 7) {
        include("register.php");
      }

      # SIgn In
      else if ($_GET["menu"] == 8) {
        include("signin.php");
      }

      # Admin
      else if ($_GET["menu"] == 9) {
        include("admin.php");
      }
  
    ?>

  </main>

  <footer>

    <p>Copyright &copy; Toni Stokić <?php echo date("Y"); ?></p>

    <a href="https://github.com/DashNothing/NTPWS" target="_blank" class="github-link">
      <img src="img/github-logo.svg" alt="github link">
    </a>

  </footer>

  <!-- <script type="text/javascript">
    let selectedIndex = <?php echo isset($_GET["menu"]) ? $_GET["menu"] : 1; ?>

    let navLinks = document.querySelectorAll("nav a");
    navLinks[selectedIndex - 1].classList.add("selected-item");
  </script> -->
  
</body>
</html>