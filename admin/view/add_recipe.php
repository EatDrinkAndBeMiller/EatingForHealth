<?php include('header.php'); ?>

<section id="list" class="list">
    <header class="list row list header">
    <form action="." method="post" id="list" class="list_header_select">
    <input type="hidden" name="action" value="add_recipe_now">
    <select name="category" class="form-select" aria-label="Select Category" required>
    <option selected>Select Meal Category</option>
    <option value="Breakfast">Breakfast</option>
    <option value="Lunch">Lunch</option>
    <option value="Dinner">Dinner</option>
    <option value="Snack">Snack</option>
    <option value="Dessert">Dessert</option>
    <option value="Drink">Drink</option>
    </select><br>
    <select name="cid" class="form-select" aria-label="Select Category_id" required>
    <option selected>Select Meal Category ID</option>
    <option value="1">Breakfast</option>
    <option value="2">Lunch</option>
    <option value="3">Dinner</option>
    <option value="4">Snack</option>
    <option value="5">Dessert</option>
    <option value="6">Drink</option>
    </select><br>
    <select name="aid" class="form-select" aria-label="Select Allergen" required>
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
  <span class="input-group-text" id="inputGroup-sizing-default">Recipe Name</span>
  <input type="text" name="recipe_name" class="form-control" aria-label="Model" aria-describedby="inputGroup-sizing-default">
</div><br>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
  <input type="text" name="desc" class="form-control" aria-label="Year" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Prep Time (in Minutes)</span>
  <input type="text" name="prep" class="form-control" aria-label="Price" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Cook/Fridge Time (in Minutes)</span>
  <input type="text" name="cook" class="form-control" aria-label="Price" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Total Time (in Minutes)</span>
  <input type="text" name="total" class="form-control" aria-label="Price" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">First Step (Limited to 255 Characters) </span>
  <input type="text" name="step_a" class="form-control" aria-label="Price" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Second Step (Limited to 255 Characters)</span>
  <input type="text" name="step_b" class="form-control" aria-label="Price" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Third Step (Limited to 255 Characters)</span>
  <input type="text" name="step_c" class="form-control" aria-label="Price" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Fourth Step (Limited to 255 Characters)</span>
  <input type="text" name="step_d" class="form-control" aria-label="Price" aria-describedby="inputGroup-sizing-default">
</div>
<button class="add-button bold" id="add">Add Recipe</button>
    </form>
<a href="./index.php?action=list_recipe">Return to Admin Home</a>
<?php include('footer.php'); ?>