
<?php
  if (isset($_GET['id']) && $_GET['id'] != '') {
    $query  = "SELECT * FROM post";
		$query .= " WHERE id=" . $_GET['id'];
		$query .= " ORDER BY date DESC";
		$result = @mysqli_query($MySQL, $query);
    $row = @mysqli_fetch_array($result);

    $picQuery = "SELECT * FROM picture";
    $picQuery .= " WHERE post=". $_GET['id'];
    $picResult = @mysqli_query($MySQL, $picQuery);

    $allPics = array();
    while ($pic = @mysqli_fetch_array($picResult)) {
      array_push($allPics, $pic);
    }
  }
?>

<h1><?php echo $row["title"] ?></h1>

<?php
  print '<img class="main-image" src="posts/' . $allPics[0]["picture"] . '" alt="' . $row["title"] . '"/>';
?>

<section class="photo-gallery">
  <?php
    foreach($allPics as $pic) {
      print '
      <figure>
        <img src="posts/' . $pic["picture"] . '" alt="' . $row["title"] . '">
      </figure>
      ';
    }
  ?>
</section>

<div class="article-text">
  <?php
    $descPars = explode("\n", $row['description']);
    foreach ($descPars as $par) {
      print '<p>' . $par . '</p>';
    }
  ?>
</div>

<a href="index.php?menu=2" class="back">Back to news</a>

<script src="js/view-image.js"></script>