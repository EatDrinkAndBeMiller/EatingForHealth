<?php include('header.php'); ?>

<section id="list" class="list">
    <header class="list row list header">
    <form action="." method="post" id="list" class="list_header_select">
    <input type="hidden" name="action" value="relationship">
    <select name="category_id" class="form-select" aria-label="Select Category_id" required>
    <option selected>Select Meal Category ID</option>
    <option value="1">Breakfast</option>
    <option value="2">Lunch</option>
    <option value="3">Dinner</option>
    <option value="4">Snack</option>
    <option value="5">Dessert</option>
    <option value="6">Drink</option>
    </select><br>
    <select name="allergen_id" class="form-select" aria-label="Select Allergen" required>
    <option selected>Select Allergen</option>
    <option value="1">Gluten</option>
    <option value="2">Eggs</option>
    <option value="3">Dairy</option>
    <option value="4">Sugar</option>
    <option value="5">Nuts</option>
    <option value="6">Shellfish</option>
    <option value="7">None</option>
    </select><br>
    <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Recipe ID (Number Only)</span>
  <input type="text" name="recipe_id" class="form-control" aria-label="Recipe_ID" aria-describedby="inputGroup-sizing-default">
</div><br>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Measurement ID (Number Only)</span>
  <input type="text" name="measure_id" class="form-control" aria-label="Measure_ID" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Measurement Quantity ID (Number Only)</span>
  <input type="text" name="qty" class="form-control" aria-label="Price" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Ingredient_ID (Number Only)</span>
  <input type="text" name="ingred_id" class="form-control" aria-label="Price" aria-describedby="inputGroup-sizing-default">
</div>
<button class="add-button bold" id="add">Add Relationship</button>
    </form>
    </header>

    <table id="publictable">
      <tr>
        <th>Recipe ID</th>
        <th>Ingredient ID</th>
        <th>Measurement ID</th>
        <th>Measurement QTY ID</th>
        <th>Allergen ID</th>
        <th>Category ID</th>
        <th>Delete Relationship</th>

      </tr>
      <?php foreach ($relationship as $r) : ?>
      <tr>
        <td><?php echo (empty($r)) ? 'No Matching Recipes' : $r['recipe_id']; ?></td>
        <td><?php echo (empty($r)) ? 'No Matching Recipes' : $r['ingredient_id']; ?></td>
        <td><?php echo (empty($r)) ? 'No Matching Recipes' : $r['measurement_id']; ?></td>
        <td><?php echo (empty($r)) ? 'No Matching Recipes' : $r['measurement_qty_id']; ?></td>
        <td><?php echo (empty($r)) ? 'No Matching Recipes' : $r['allergen_id']; ?></td>
        <td><?php echo (empty($r)) ? 'No Matching Recipes' : $r['category_id']; ?></td>
        <td><form action="." method="post">
        <input type="hidden" name="action"
        value="delete_relationship">
        <input type="hidden" name="delete_relationship" value=<?= $r['recipe_ingredients_id'] ?>>
        <button class="remove-button" id="delete_relationship">Remove</button>
        </form></td>
      </tr>
      </form>
      <?php endforeach; ?>  
    </table>
<a href="./index.php?action=list_recipe">Return to Admin Home</a>
<?php include('footer.php'); ?>