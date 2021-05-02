<?php include('header_admin.php')?>

<h1 class="text-center">Eating4Health Admin Page</h1>
  <br>
<div class="row justify-content-md-center">
  <div class="col-lg-11">
    <a href="./index.php?action=add_recipe">Add Recipe</a><br>
    <a href="./index.php?action=add_ingredient">Add Ingredient</a><br>
    <a href="./index.php?action=add_image">Add Recipe Image</a><br>
    <a href="./index.php?action=add_relationship">Add Relationship</a><br>
    <a href="./index.php?action=user">Add User</a><br>
<br>

<h4 class="text-center">Current Recipes</h4>
  <div class="table-responsive">
    <table id="publictable">
      <tr>
        <th>Photo</th>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Delete Recipe</th>
      </tr>
      <?php foreach ($recipe as $r) : ?>
      <tr>
        <td><?php if (empty($r['recipe_image'])) { ?> No Matching Recipes 
            <?php } else { ?> <img src="../view/images/recipes/<?php echo $r['recipe_image'];?>" width="50px" class="text-center">
            <?php } ?></td>
        <td><?php echo (empty($r['recipe_id'])) ? '' : $r['recipe_id']; ?></td>
        <td><?php echo (empty($r['recipe_name'])) ? 'No Matching Recipes' : $r['recipe_name']; ?></td>
        <td><?php echo (empty($r['category'])) ? 'No Matching Recipes' : $r['category']; ?></td>
        <td><form action="." method="post">
              <input type="hidden" name="action" value="delete_recipe">
              <input type="hidden" name="delete_recipe" value=<?= $r['recipe_id'] ?>>
              <button class="remove-button btn btn-danger" id="delete">Remove</button>
            </form>
        </td>
      </tr>
      </form>
      <?php endforeach; ?>  
    </table>
  </div>
  </div>
</div>
<br><br>

<?php include('footer_admin.php'); ?>