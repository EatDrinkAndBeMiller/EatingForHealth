<?php include('header.php'); ?>
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
<div id="column1" style="float:left; width:23%; padding: 0 10px;">
<h2 style="text-align: center;">Ingredients</h2>
<ul>
<?php foreach($ingredients as $i) : ?> 
    <li><?php $formatted = $i["measurement_qty"]." ".$i["measurement"]." ".$i["ingredient_name"]; echo $formatted; ?></li>
<?php endforeach; ?>
</ul>
</div>
<div id="column2" style="float:left; width:auto; padding: 10 20px;">
<h2 style="text-align: center;">Recipe Steps</h2>
<?php echo $recipe['description']; ?>
</div>
</main><br><br><br>
<?php include('footer.php'); ?>
