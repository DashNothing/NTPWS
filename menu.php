<ul>
  <li>
    <a href="index.php?menu=1">Home</a>
  </li>
  <li>
    <a href="index.php?menu=2">Posts</a>
  </li>
  <li>
    <a href="index.php?menu=3">Contact</a>
  </li>
  <li>
    <a href="index.php?menu=4">About</a>
  </li>
  <li>
    <a href="index.php?menu=5">Gallery</a>
  </li>
  <li>
    <a href="index.php?menu=6">Nutrition API</a>
  </li>

  <?php
    if (!isset($_SESSION["user"]["valid"]) || $_SESSION["user"]["valid"] == "false") {
      print '
        <li><a href="index.php?menu=7">Register</a></li>
        <li><a href="index.php?menu=8">Sign In</a></li>
      ';
    } else if ($_SESSION["user"]["valid"] == "true") {
      print '
        <li><a href="index.php?menu=9">Admin</a></li>
        <li><a href="signout.php">Sign Out</a></li>
      ';
    }
  ?>

</ul>