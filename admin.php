<?php
  if ($_SESSION["user"]["valid"] == "false") {
    $_SESSION["message"] == "Please sign in first.";
    header("Location: index.php?menu=8");
  }

  if (!isset($action)) {
    $action = 1; 
  }
?>

<h1>Administration</h1>

<ul class="cms-menu">
  <li>
    <a href="index.php?menu=9&amp;action=1">Users</a>
  </li>
  <li>
    <a href="index.php?menu=9&amp;action=2">Posts</a>
  </li>
</ul>

<?php
  if ($action == 1) {
    include("admin/users.php");
  } else if ($action == 2) {
    include("admin/posts.php");
  }
?>