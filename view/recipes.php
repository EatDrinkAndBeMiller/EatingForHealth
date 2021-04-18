<?php include('header.php')?>

<section id="list" class="list">
    <header class="list row list header">
    <form action="." method="post" id="list" class="list_header_select">
    <input type="hidden" name="action" value="list_recipe_options">
    <select name="meal" class="form-select" aria-label="select meal" required>
    <option selected>View All Recipes</option>
    <option value="1">Breakfast</option>
    <option value="2">Lunch</option>
    <option value="3">Dinner</option>
    <option value="4">Snack</option>
    <option value="5">Dessert</option>
    <option value="6">Drink</option>
    </select>
    <label>Avoid</label>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="avoid[]" value="gluten">
  <label class="form-check-label" for="inlineCheckbox1">Gluten</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="avoid[]" value="dairy">
  <label class="form-check-label" for="inlineCheckbox2">Dairy</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="avoid[]" value="sugar">
  <label class="form-check-label" for="inlineCheckbox1">Sugar</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="avoid[]" value="coconut">
  <label class="form-check-label" for="inlineCheckbox2">Coconut</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="avoid[]" value="shellfish">
  <label class="form-check-label" for="inlineCheckbox1">Shellfish</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="avoid[]" value="eggs">
  <label class="form-check-label" for="inlineCheckbox2">Eggs</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="avoid[]" value="nuts">
  <label class="form-check-label" for="inlineCheckbox2">Nuts</label>
</div>
<button class="add-button bold" id="user">Search</button><br>
</form>
</header>
  
    <table id="publictable">
      <tr>
        <th>Name</th>
      </tr>
      <?php foreach ($recipe as $r) : ?>
      <tr>
        <td><?php echo $r['recipe_name']; ?></td>
        <form action="view/single_recipe.php?rid=<?php echo $r['recipe_id'] ?>" id="single_recipe" method="POST">
        <td><input type="submit" name="view" value="View"></td>
      </tr>
      </form>
      <?php endforeach; ?>  
    </table>



<?php include('footer.php'); ?>