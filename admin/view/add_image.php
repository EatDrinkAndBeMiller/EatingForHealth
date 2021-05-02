<?php include('header_admin.php'); ?>

<div class="row justify-content-md-center">
  <div class="col-md-10"> 
      <h4 class="text-center">Add an Ingredient</h4>
  <br>
  <div id="list" class="list">
    <div class="list row list header">
      <form action=".?action=addpic" method="post" id="list" class="list_header_select">
      <input type="hidden" name="action" value="addpic"> 
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Recipe Image Name (Do not include Path...Only file name, i.e. pizza.jpg)</span>
          <input type="text" name="img" class="form-control" aria-label="Model" aria-describedby="inputGroup-sizing-default">
        </div><br>
      <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Recipe ID (Number Only)</span>
        <input type="text" name="rid" class="form-control" aria-label="Model" aria-describedby="inputGroup-sizing-default">
      </div><br>
        <button class="add-button bold" id="add_image">Add Recipe Image</button>
    </form>
</div><br>

  <h5>Current Images</h5>
    <table id="publictable">
      <tr>
        <th>Recipe ID</th>
        <th>Image Name</th>
        <th>Delete Recipe Image</th>
      </tr>
      <?php foreach ($images as $i) : ?>
      <tr>
        <td><?php echo (empty($i['recipe_id'])) ? 'No Matching Recipes' : $i['recipe_id']; ?></td>
        <td><?php echo (empty($i['recipe_image'])) ? 'No Matching Recipes' : $i['recipe_image']; ?></td>
        <td><form action="." method="post">
            <input type="hidden" name="action" value="delete_image">
            <input type="hidden" name="delete_image" value=<?= $i['recipe_image_id'] ?>>
            <button class="remove-button" id="delete_image">Remove</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>  
    </table>
  </div>
  </div>
</div>
<br>
<a href="./index.php?action=list_recipe">Return to Admin Home</a>
<br>
<?php include('footer_admin.php'); ?>