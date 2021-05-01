<?php include('header.php'); ?>

<h1 class="text-center">My Profile</h1>
<h2>About Me</h2>
<?php echo $info['first_name'].' '.$info['last_name']; ?><br>
<?php echo $info['email']; ?><br><br>

<h2>Recipe Favorites</h2>
<table id="publictable">
      <tr>
        <th>Recipe</th>
        <th>View</th>
      </tr>
      <?php foreach ($favorites as $f) : ?>
      <tr>
        <td><?php echo $f['recipe_name']; ?></td>
        <form action="view/single_recipe.php?rid=<?php echo $f['recipe_id'] ?>" id="single_recipe" method="POST">
        <td><input type="submit" name="view" value="View"></td></form>
      </tr>
      <?php endforeach; ?>  
    </table>
<br>
<h2>Food Journal</h2>
<a href="./index.php?action=view_journal">View Food Journal Entry</a><br>
<a href="./index.php?action=add_journal">Add Food Journal Entry</a><br>


<?php include('footer2.php'); ?>


