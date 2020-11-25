<?php
  print '<h2>Add post</h2>';

  print '
<form action="" name="post_form" method="POST" enctype="multipart/form-data">
  <input type="hidden" id="_action_" name="_action_" value="add_post">

  <label for="title">Title</label>
  <input type="text" id="title" name="title" placeholder="Title..." required>
  
  <label for="description">Description</label>
  <textarea rows=6 id="description" name="description" placeholder="Description..." required></textarea>

  <label for="picture">Pictures</label>
  <input type="file" id="picture" name="picture[]" multiple accept="image/x-png,image/gif,image/jpeg" required/>
  
  <label for="archive">Archive</label>
  <label class="radio-label">
    <input type="radio" name="archive" value="Y" /> Yes
  </label>
  <label class="radio-label">
    <input type="radio" name="archive" value="N" /> No
  </label>

  <input type="submit" value="Submit">
</form>
';
?>