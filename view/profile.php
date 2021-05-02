<?php include('header.php'); ?>

<h1 class="text-center">My Profile</h1>
<h2>About Me</h2>
<?php echo $info['first_name'].' '.$info['last_name']; ?><br>
<?php echo $info['email']; ?><br><br>

<h2 id="favorites">Recipe Favorites</h2>
<table id="publictable">
      <tr>
        <th>Recipe</th>
        <th>View</th>
      </tr>
      <?php foreach ($favorites as $f) : ?>
      <?php if (empty($f['recipe_id'])) { ?>
        <h5>You do not have any favorites. <a href="index.php?action=list_recipe">Pick your favorites</a></h5>
      
      <?php } else {?>
        <tr>
          <td><?php echo $f['recipe_name']; ?></td>
          <form action="view/single_recipe.php?rid=<?php echo $f['recipe_id'] ?>" id="single_recipe" method="POST">
          <td><input type="submit" name="view" value="View"></td></form>
        </tr>
      <?php } endforeach; ?>  
    </table>
<br>
<h2>Food Journal</h2>
<a href="./index.php?action=view_journal">View/Add Food Journal Entries</a><br>


<?php include('footer2.php'); ?>


