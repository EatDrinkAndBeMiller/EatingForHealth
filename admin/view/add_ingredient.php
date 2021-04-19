<?php include('header.php'); ?>

<a href="./index.php?action=list_recipe">Return to Admin Home</a>

<section id="list" class="list">
    <header class="list row list header">
    <form action=".?action=addi" method="post" id="list" class="list_header_select">
    <input type="hidden" name="action" value="addi"> 
    <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Ingredient Name</span>
  <input type="text" name="iname" class="form-control" aria-label="Model" aria-describedby="inputGroup-sizing-default">
</div><br>
<button class="add-button bold" id="add">Add Ingredient</button>
    </form>
    </header>

    <table id="publictable">
      <tr>
        <th>Ingredient ID</th>
        <th>Name</th>
      </tr>
      <?php foreach ($ingredients as $i) : ?>
      <tr>
        <td><?php echo (empty($i)) ? 'No Matching Recipes' : $i['ingredient_id']; ?></td>
        <td><?php echo (empty($i)) ? 'No Matching Recipes' : $i['ingredient_name']; ?></td>
      </tr>
      </form>
      <?php endforeach; ?>  
    </table>
<a href="./index.php?action=list_recipe">Return to Admin Home</a>
<?php include('footer.php'); ?>