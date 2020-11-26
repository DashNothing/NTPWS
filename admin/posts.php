<?php

  # Add post
  if (isset($_POST['_action_']) && $_POST['_action_'] == 'add_post') {
    $_SESSION['message'] = '';
    # htmlspecialchars — Convert special characters to HTML entities
    # http://php.net/manual/en/function.htmlspecialchars.php
    $query  = "INSERT INTO post (title, description, archive)";
    $query .= " VALUES ('" . htmlspecialchars($_POST['title'], ENT_QUOTES) . "', '" . htmlspecialchars($_POST['description'], ENT_QUOTES) . "', '" . $_POST['archive'] . "')";
    $result = @mysqli_query($MySQL, $query);
    
    $ID = mysqli_insert_id($MySQL);
    
    # Pictures
    # Get new uploaded pictures
    $files = array_filter($_FILES['picture']['name']);

    $total = count($_FILES['picture']['name']);

    for($i=0; $i < $total; $i++) {
      // Get the temp file path
      $tmpFilePath = $_FILES['picture']['tmp_name'][$i];
    
      // Make sure we have a file path
      if ($tmpFilePath != "") {
        $ext = strtolower(strrchr($_FILES['picture']['name'][$i], "."));
            
        $_picture = (int)$ID . '-' . rand(100000,999999) . $ext;
    
        // Upload the file into the posts dir
        copy($tmpFilePath, "posts/" . $_picture);
      }

      $_query  = "INSERT INTO picture SET picture='" . $_picture . "', post=" . $ID;
      $_result = @mysqli_query($MySQL, $_query);
    }
  
    $_SESSION['message'] .= '<p>Post added successfully.</p>';
    
    # Redirect
    header("Location: index.php?menu=9&action=2");
  }


  # Update post
	if (isset($_POST['_action_']) && $_POST['_action_'] == 'edit_post') {
		$query  = "UPDATE post SET title='" . htmlspecialchars($_POST['title'], ENT_QUOTES) . "', description='" . htmlspecialchars($_POST['description'], ENT_QUOTES) . "', archive='" . $_POST['archive'] . "'";
    $query .= " WHERE id=" . (int)$_POST['edit'];
    $query .= " LIMIT 1";
    $result = @mysqli_query($MySQL, $query);
    
    # Pictures
    # Get new uploaded pictures
    $files = array_filter($_FILES['picture']['name']);

    $total = count($_FILES['picture']['name']);

    if (!empty($_FILES["picture"]["name"][0])) {
      # Get all post pictures from the posts folder
      $query = "SELECT * FROM picture";
      $query .= " WHERE post=" . (int)$_GET['edit'];
      $result = @mysqli_query($MySQL, $query);

      while ($row = @mysqli_fetch_array($result)) {
        @unlink("posts/" . $row["picture"]);
      }

      # Delete all previous post pictures from the db
      $query  = "DELETE FROM picture";
      $query .= " WHERE post=" . (int)$_GET['edit'];
      $result = @mysqli_query($MySQL, $query);

      for($i=0; $i < $total; $i++) {
        //Get the temp file path
        $tmpFilePath = $_FILES['picture']['tmp_name'][$i];
      
        //Make sure we have a file path
        if ($tmpFilePath != "") {
          $ext = strtolower(strrchr($_FILES['picture']['name'][$i], "."));
              
          $_picture = (int)$_POST['edit'] . '-' . rand(100000,999999) . $ext;
      
          //Upload the file into the posts dir
          copy($tmpFilePath, "posts/" . $_picture);
        }
  
        $_query  = "INSERT INTO picture SET picture='" . $_picture . "', post=" . $_POST["edit"];
        $_result = @mysqli_query($MySQL, $_query);
        $_SESSION['message'] .= '<p>You successfully added a picture.</p>';
      }
    }
		
		$_SESSION['message'] = '<p>Post successfully changed.</p>';
		
		# Redirect
		header("Location: index.php?menu=9&action=2");
	}
  

  # Delete post
  if (isset($_GET['delete']) && $_GET['delete'] != '') {
    # Get all post pictures from the posts folder
    $query = "SELECT * FROM picture";
    $query .= " WHERE post=" . (int)$_GET['delete'];
    $result = @mysqli_query($MySQL, $query);

    while ($row = @mysqli_fetch_array($result)) {
      @unlink("posts/" . $row["picture"]);
    }

		# Delete all post pictures from the db
    $query  = "DELETE FROM picture";
    $query .= " WHERE post=" . (int)$_GET['delete'];
    $result = @mysqli_query($MySQL, $query);
		
		# Delete post
		$query  = "DELETE FROM post";
		$query .= " WHERE id=".(int)$_GET['delete'];
		$query .= " LIMIT 1";
		$result = @mysqli_query($MySQL, $query);

		$_SESSION['message'] = '<p>Post successfully deleted.</p>';
		
		# Redirect
		header("Location: index.php?menu=9&action=2");
	}


  # TODO: Show posts table and forms only if user is admin or editor

  # Show post
  if (isset($_GET['id']) && $_GET['id'] != '') {
    $query  = "SELECT * FROM post";
		$query .= " WHERE id=" . $_GET['id'];
		$query .= " ORDER BY date DESC";
		$result = @mysqli_query($MySQL, $query);
    $row = @mysqli_fetch_array($result);

    $picQuery = "SELECT * FROM picture";
    $picQuery .= " WHERE post=". $_GET['id'];
    $picQuery .= " LIMIT 1";
    $picResult = @mysqli_query($MySQL, $picQuery);
    $pic = @mysqli_fetch_array($picResult);
    
    print '
		<h2>Post overview</h2>
		<div class="post-overview">
      <h2>' . $row['title'] . '</h2>
      <span>Posted on </span><time datetime="' . $row['date'] . '">' . $row['date'] . '</time>
      <img src="posts/' . $pic['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">';
      $descPars = explode("\n", $row['description']);
      foreach ($descPars as $par) {
        print '<p>' . $par . '</p>';
      }
			print '
		</div>
		<p><a class="back" href="index.php?menu=' . $menu . '&amp;action=' . $action . '">Back</a></p>';
  }

  # Add post
  else if (isset($_GET['add']) && $_GET['add'] != '') {
    include("postaddform.php");

    print '<p><a class="back" href="index.php?menu=' . $menu . '&amp;action=' . $action . '">Back</a></p>';
  }

  # Edit post
  else if (isset($_GET["edit"]) && $_GET["edit"] != "") {
    include("posteditform.php");

    print '<p><a class="back" href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
  } else if ($_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "editor") {
    print '
      <h2>Posts</h2>

      <div style="overflow-x: auto;">
      <table>
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th>Title</th>
          <th>Description</th>
          <th>Date</th>
          <th>Archived</th>
        </tr>';

    $query  = "SELECT * FROM post";
    $query .= " ORDER BY date DESC";
    $result = @mysqli_query($MySQL, $query);
    while ($row = @mysqli_fetch_array($result)) {
      print '
					<tr>
						<td><a href="index.php?menu=' . $menu  .'&amp;action=' . $action . '&amp;id=' . $row['id'] . '"><img src="img/icons/view.svg" alt="user"></a></td>
						<td><a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;edit=' . $row['id'] . '"><img src="img/icons/edit.svg" alt="edit"></a></td>
						<td><a href="index.php?menu='. $menu .'&amp;action='. $action .'&amp;delete=' . $row['id'] . '"><img src="img/icons/delete.svg" alt="delete"></a></td>
						<td>' . $row['title'] . '</td>
						<td>';
						if (strlen($row['description']) > 160) {
              echo substr(strip_tags($row['description']), 0, 160).'...';
            } else {
              echo strip_tags($row['description']);
            }
						print '
						</td>
						<td>' . $row['date'] . '</td>
						<td>';
						if ($row['archive'] == 'Y') {
              print '<p>archived</p>';
            } else if ($row['archive'] == 'N') {
              print '<p>showing</p>';
            }
						print '
						</td>
					</tr>';
    }
    print '
      </thead>
      <tbody>
      </table>
      </div>

      <a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;add=true" class="primary-btn">Add a post</a>
    ';
  } else if ($_SESSION["user"]["role"] == "user") {
    print '<a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;add=true" class="primary-btn">Add a post</a>';
  }
?>