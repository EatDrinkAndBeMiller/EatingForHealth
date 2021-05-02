<?php include('header_admin.php'); ?>

<div class="row justify-content-md-center">
  <div class="col-md-10"> 
      <h4 class="text-center">Add an Ingredient</h4>
  <br>
  <div id="list" class="list">
    <div class="list row list header">
    <form action=".?action=addi" method="post" id="list" class="list_header_select">
      <input type="hidden" name="action" value="addi"> 
      <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Ingredient Name</span>
        <input type="text" name="iname" class="form-control" aria-label="Model" aria-describedby="inputGroup-sizing-default">
      </div><br>
      <button class="add-button bold" id="add">Add Ingredient</button>
    </form>
    </div>
<br>
  <h5>Current Ingredients</h5>
    <table id="publictable">
      <tr>
        <th>Ingredient ID</th>
        <th>Name</th>
        <th>Delete Ingredient</th>

      </tr>
      <?php foreach ($ingredients as $i) : ?>
      <tr>
        <td><?php echo (empty($i)) ? 'No Matching Recipes' : $i['ingredient_id']; ?></td>
        <td><?php echo (empty($i)) ? 'No Matching Recipes' : $i['ingredient_name']; ?></td>
        <td><form action="." method="post">
            <input type="hidden" name="action" value="delete_ingredient">
            <input type="hidden" name="delete_ingredient" value=<?= $i['ingredient_id'] ?>>
            <button class="remove-button" id="delete_ingredient">Remove</button>
            </form>
        </td>
      </tr>
      </form>
      <?php endforeach; ?>  
    </table>
<br>
    <a href="./index.php?action=list_recipe">Return to Admin Home</a><br>
      </div>
  </div>
</div>
<?php include('footer_admin.php'); ?>