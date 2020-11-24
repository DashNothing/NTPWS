<?php

  # Show posts table and forms only if user is admin or editor
  if (isset($_GET["edit"]) && $_GET["edit"] != "") {
    include("posteditform.php");

    print '<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
  } else {
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
    ';
  }
?>