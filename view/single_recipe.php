<?php include('header2.php'); ?>
<?php require('../model/database.php'); ?>
<?php require('../model/recipe.php'); ?>

<?php $id = filter_input(INPUT_GET, 'rid', FILTER_VALIDATE_INT);
$ingredients = Recipe::get_ingredients($id);
$recipe = Recipe::get_recipe($id);
$img = Recipe::get_image($id);
?>

<main>
  <h1 style="text-align: center;"><?php echo $recipe['recipe_name']; ?></h1>
    <?php echo '<img src="images/recipes/' . $img['recipe_image'] . '">' ?>

<label>Prep Time (Minutes):</label><?php echo " ".$recipe['prep_time']." "; ?>
    <label>Cook/Fridge Time (Minutes):</label><?php echo " ".$recipe['cook_time']." "; ?>
    <label>Total Time (Minutes):</label><?php echo " ".$recipe['total_time']." "; ?>

<div id="column1" style="float:left; width:23%; padding: 0 10px;">
<h2 style="text-align: center;">Ingredients</h2>
    <ul>
        <?php foreach($ingredients as $i) : ?> 
            <li><?php $formatted = $i["measurement_qty"]." ".$i["measurement"]." ".$i["ingredient_name"]; 
                echo $formatted; ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<div id="column2" style="float:left; width:auto; padding: 10 20px;">
<h2 style="text-align: center;">Directions</h2>
    <ol>
        <li><?php if($recipe['step_a'] != '') { echo $recipe['step_a']; } ?></li>
        <li><?php if($recipe['step_b'] != '') { echo $recipe['step_b']; } ?></li>
        <li><?php if($recipe['step_c'] != '') { echo $recipe['step_c']; } ?></li>
        <li><?php if($recipe['step_d'] != '') { echo $recipe['step_d']; } ?></li>
    </ol>
</div>

<?php if($recipe['note'] != '') { ?>
    <div id="column3" style="float:left; width:auto; padding: 10 20px;">
        <h3 style="text-align: center;">Notes</h3>
        <p><?php= $recipe['note'] ?></p>
    </div>
<?php } ?>

</main><br><br><br>
<?php include('footer2.php'); ?>
