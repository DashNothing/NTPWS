<h1>Posts</h1>

<div class="news-container">
  <?php
    # Get all posts
    $query  = "SELECT * FROM post";
    $query .= ' WHERE archive="N"';
    $query .= " ORDER BY date DESC";
    $result = @mysqli_query($MySQL, $query);
    while ($row = @mysqli_fetch_array($result)) {
      # Get post's picture
      $picQuery = "SELECT * FROM picture";
      $picQuery .= " WHERE post=" . $row["id"];
      $picQuery .= " LIMIT 1";

      $picResult = @mysqli_query($MySQL, $picQuery);
      $pic = @mysqli_fetch_array($picResult);

      print '
      <div class="news-card">
        <a href="index.php?menu=10&id=' . $row["id"] . '">
          <img src="posts/' . $pic["picture"] . '" alt="' . $row["title"] . '" class="thumbnail">
        </a>
        <div class="news-card-text">
          <a href="index.php?menu=10&id=' . $row["id"] . '">
            <h2>' . $row["title"] . '</h2>
          </a>
          <p class="description">';
            if (strlen($row['description']) > 160) {
              echo substr(strip_tags($row['description']), 0, 160).'...';
            } else {
              echo strip_tags($row['description']);
            }
          print '
          </p>
          <a href="index.php?menu=10&id=' . $row["id"] . '" class="read-more">Read More</a>
          <p class="date">' . $row["date"] . '</p>
        </div>
      </div>
      ';
    }
  ?>
</div>