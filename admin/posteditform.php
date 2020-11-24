<?php
  $query  = "SELECT * FROM post";
  $query .= " WHERE id=" . $_GET['edit'];
  $result = @mysqli_query($MySQL, $query);
  $row = @mysqli_fetch_array($result);
  $checked_archive = false;

  print '<h2>Edit news</h2>';

  print '
<form action="" name="registration_form" method="POST" enctype="multipart/form-data">
  <input type="hidden" id="_action_" name="_action_" value="edit_news">
  <input type="hidden" id="edit" name="edit" value="' . $row['id'] . '">

  <label for="title">Title</label>
  <input type="text" id="title" name="title" value="' . $row['title'] . '" placeholder="Title..." required>
  
  <label for="description">Description</label>
  <input type="text" id="description" name="description" value="' . $row['description'] . '" placeholder="Description..."
    required>

  <label for="picture">Picture</label>
  <input type="file" id="picture" name="picture" required>

  <label for="username">Username *<small>(Username must have min 5 and max 10 char)</small></label>
  <input type="text" id="username" name="username" value="' . $row['username'] . '" pattern=".{5,10}"
    placeholder="Username.." required>
  
  <label for="archive">Archive</label>
  <input type="radio" name="archive" value="Y"'; if ($row["archive"] == 'Y') {echo ' checked="checked"'; $checked_archive = true; } echo ' />Yes
  <input type="radio" name="archive" value="N"'; if($checked_archive == false) { echo ' checked="checked"'; } echo ' /> NO
  
  <input type="submit" value="Submit">
</form>
';
?>