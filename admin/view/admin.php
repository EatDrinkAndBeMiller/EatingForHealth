<?php include('header.php')?>

<h1>Eating4Health Admin Page</h1>
  
    <table id="publictable">
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Delete Recipe</th>
      </tr>
      <?php foreach ($recipe as $r) : ?>
      <tr>
        <td><?php echo (empty($r)) ? 'No Matching Recipes' : $r['recipe_name']; ?></td>
        <td><?php echo (empty($r)) ? 'No Matching Recipes' : $r['description']; ?></td>
        <td><?php echo (empty($r)) ? 'No Matching Recipes' : $r['category']; ?></td>
        <td><form action="." method="post">
        <input type="hidden" name="action"
        value="delete_recipe">
        <input type="hidden" name="delete_recipe" value=<?= $r['recipe_id'] ?>>
        <button class="remove-button" id="delete">Remove</button>
        </form></td>
      </tr>
      </form>
      <?php endforeach; ?>  
    </table>
    <br>
    <a href="./index.php?action=add_recipe">Add Recipe</a><br>
    <a href="./index.php?action=add_ingredient">Add Ingredient</a><br>
    <a href="./index.php?action=add_image">Add Recipe Image</a><br>
    <a href="./index.php?action=add_relationship">Add Relationship</a>

<?php include('footer.php'); ?>