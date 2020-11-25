<?php
  $query  = "SELECT * FROM post";
  $query .= " WHERE id=" . $_GET['edit'];
  $result = @mysqli_query($MySQL, $query);
  $row = @mysqli_fetch_array($result);
  $checked_archive = false;

  print '<h2>Edit post</h2>';

  print '
<form action="" name="registration_form" method="POST" enctype="multipart/form-data">
  <input type="hidden" id="_action_" name="_action_" value="edit_post">
  <input type="hidden" id="edit" name="edit" value="' . $row['id'] . '">

  <label for="title">Title</label>
  <input type="text" id="title" name="title" value="' . $row['title'] . '" placeholder="Title..." required>
  
  <label for="description">Description</label>
  <textarea rows=6 id="description" name="description" value="" placeholder="Description..."
    required>' . $row['description'] . '</textarea>

  <label for="picture">Pictures</label>
  <input type="file" id="picture" name="picture[]" multiple accept="image/x-png,image/gif,image/jpeg" />
  
  <label for="archive">Archive</label>
  <label class="radio-label">
    <input type="radio" name="archive" value="Y"'; if ($row["archive"] == 'Y') {echo ' checked="checked"'; $checked_archive = true; } echo ' /> Yes
  </label>
  <label class="radio-label">
    <input type="radio" name="archive" value="N"'; if($checked_archive == false) { echo ' checked="checked"'; } echo ' /> No
  </label>

  <input type="submit" value="Submit">
</form>
';
?>