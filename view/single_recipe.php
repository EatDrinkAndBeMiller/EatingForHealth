<?php include('member_header.php'); ?>
<?php require('../model/database.php'); ?>
<?php require('../model/recipe.php'); ?>

<?php $id = filter_input(INPUT_GET, 'rid', FILTER_VALIDATE_INT);
$ingredients = Recipe::get_ingredients($id);
$recipe = Recipe::get_recipe($id);
$img = Recipe::get_image($id);
?>

<main>
<br>
<a href="../.?action=list_recipe">Return to recipe list</a>
<br>
<br><h1 style="text-align: center;"><?php echo $recipe['recipe_name']; ?></h1><br>
  <div class="row justify-content-md-center">
    <div class="col-md-3">
      <div class="align-middle">
        <?php echo '<img src="images/recipes/' . $img['recipe_image'] . '">' ?><br>
      </div>
    </div>
    <div class="col-md-7">
      <div class="card bg-light">
        <div class="card-body text-center">
          <p><b>Prep Time:</b><?php echo " ".$recipe['prep_time']." "; ?> &nbsp; | &nbsp;
            <b>Cook or Fridge Time:</b><?php echo " ".$recipe['cook_time']." "; ?> &nbsp; | <br>
            <b>Total Time:</b><?php echo " ".$recipe['total_time']." "; ?>
        </div>
      </div>
      <h4>Ingredients</h4>
        <ul>
          <?php foreach($ingredients as $i) : ?> 
          <li>
            <?php $formatted = $i["measurement_qty"]." ".$i["measurement"]." ".$i["ingredient_name"]; 
              echo $formatted; ?><br>
            <?php endforeach; ?></li>
        </ul>

        <!-- formatting for checkboxes to allow for adding to a shopping list
        <form class="shopping-list" method="post">
        <div class="form-check">
          // foreach($ingredients as $i) : ?> 
            <input class="form-check-input" type="checkbox" name="ingredient" value="<?php //echo $i['ingredient_name']?>">
              <?php //$formatted = $i["measurement_qty"]." ".$i["measurement"]." ".$i["ingredient_name"]; 
                //echo $formatted; ?><br>
            <?php //endforeach; ?>
            <button class="btn btn-primary" type="submit" onclick="shoppingLists()">Add Ingredients to Shopping List</button>
        </div>
        </form> -->
    </div>
  </div>

  <div class="row justify-content-md-center">
    <div class="col-md-10">
        <h4 class="text-left">Directions</h4>
            <ol>
                <li><?php if($recipe['step_a'] != '') { echo $recipe['step_a']; } ?></li>
                <?php if($recipe['step_b'] != '') { ?>
                    <li><?php echo $recipe['step_b']; ?></li>
                <?php } ?>
                <?php if($recipe['step_c'] != '') { ?>
                    <li><?php echo $recipe['step_c']; ?></li>
                <?php } ?>
                <?php if($recipe['step_d'] != '') { ?>
                    <li><?php echo $recipe['step_d']; ?></li>
                <?php } ?>
            </ol>

        <?php if($recipe['note'] != '') { ?>
            <h6>Notes&colon;</h6>
                <p><?php echo $recipe['note']; ?></p>
        <?php } ?>

        <p class="text-muted">Servings&colon; <?php echo $recipe['serving']; ?></p>
        <small class="text-muted">Photo by: <?php echo $img['recipe_caption']?></small>
    </div>
  </div>
  <br>
<a href="../.?action=list_recipe">Return to recipe list</a>
<br>
</main><br>
<?php include('footer2.php'); ?>
