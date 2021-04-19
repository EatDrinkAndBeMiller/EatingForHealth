<?php include('header.php'); ?>

<a href="./index.php?action=list_recipe">Return to Admin Home</a>

<section id="list" class="list">
    <header class="list row list header">
    <form action=".?action=addpic" method="post" id="list" class="list_header_select">
    <input type="hidden" name="action" value="addi"> 
    <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Recipe Image Name (Do not include Path...Only file name, i.e. pizza.jpg)</span>
  <input type="text" name="img" class="form-control" aria-label="Model" aria-describedby="inputGroup-sizing-default">
</div><br>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Recipe ID (Number Only)</span>
  <input type="text" name="rid" class="form-control" aria-label="Model" aria-describedby="inputGroup-sizing-default">
</div><br>
<button class="add-button bold" id="add">Add Recipe Image</button>
    </form>
    </header>

    <table id="publictable">
      <tr>
        <th>Ingredient ID</th>
        <th>Name</th>
      </tr>
      <?php foreach ($pics as $p) : ?>
      <tr>
        <td><?php echo (empty($i)) ? 'No Matching Recipes' : $p['recipe_id']; ?></td>
        <td><?php echo (empty($i)) ? 'No Matching Recipes' : $p['recipe_image']; ?></td>
      </tr>
      </form>
      <?php endforeach; ?>  
    </table>
<?php include('footer.php'); ?>