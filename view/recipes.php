<?php include('member_header.php')?>
<br>
<div class="row justify-content-md-center">
  <div id="list" class="col list">
    <div class="card bg-light">
      <div class="card-body list header">
        <form action="." method="post" id="list" class="list_header_select">
          <input type="hidden" name="action" value="list_recipe_options">
          <div class="row">
          <div class="col-lg-4 col-md-6">
            <label><b>Choose a category&colon;</b></label> &nbsp;
            <select name="meal" class="form-select" aria-label="select meal" required>
              <option selected>View All Recipes</option>
              <option value="1">Breakfast</option>
              <option value="2">Entree</option>
              <option value="3">Snack or Side</option>
              <option value="4">Dessert</option>
              <option value="5">Drink</option>
              <option value="6">Seasonings/Sauces</option>
            </select>
          </div>
          <div class="col-1">
          <label><b>Avoid&colon;</b></label>
          </div>
          <div class="col-lg-6 col-md-5">
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
          </div>
          <div class="col-lg-1 col">
            <button class="add-button bold btn btn-primary" id="user">Search</button><br>
          </div>
          </div>
        </form>
      </div>
      </div>
    </div>
</div>
  <br>

  <div class="row">
    <?php foreach ($recipe as $r) : ?>
      <?php if (empty($r['recipe_id'])) { ?> 
        <h4 class="text-center">Sorry, there are no Matching Recipes</h4>
      <?php } else { ?>
    <div class="col-sm-6">
      <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
              <div class="col-4">
                <a href="view/single_recipe.php?rid=<?php echo $r['recipe_id'] ?>">
                  <img src="view/images/recipes/<?php echo $r['recipe_image']?>" class="card-img"></a>
              </div>
              <div class="col-8">
                  <div class="card-body">
                  <a href="view/single_recipe.php?rid=<?php echo $r['recipe_id'] ?>">
                  <h5 class="card-title"><?php echo $r['recipe_name'];?></h5></a>
                  <p class="card-text"><i><?php echo $r['category']; ?></i></p>
                  <button class="btn btn-primary"><a href="view/single_recipe.php?rid=<?php echo $r['recipe_id'] ?>">
                    View Recipe</a></button><br>&nbsp; <br>
                    <form action="." id="favorite" method="POST">
                      <button type="submit" value="Add to Favorites" class="btn btn-info">
                      <input type="hidden" name="action" value="favorite">
                      <input type="hidden" name="rid" value="<?php echo $r['recipe_id'] ?>">
                      Add to Favorites</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
  <?php } ?>
  <?php endforeach; ?>
  </div>

    <!-- <table id="publictable">
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Select</th>
        <th>Favorite</th>
      </tr>
      <?//php foreach ($recipe as $r) : ?>
      <tr>
        <td><?//php echo (empty($r)) ? 'No Matching Recipes' : $r['recipe_name']; ?></td>
        <td><?//php echo (empty($r)) ? 'No Matching Recipes' : $r['description']; ?></td>
        <td><?//php echo (empty($r)) ? 'No Matching Recipes' : $r['category']; ?></td>
        <form action="view/single_recipe.php?rid=<?//php echo $r['recipe_id'] ?>" id="single_recipe" method="POST">
        <td><input type="submit" name="view" value="View"></td></form>
        <form action="." id="favorite" method="POST">
        <td><input type="submit" value="Add">
          <input type="hidden" name="action" value="favorite">
          <input type="hidden" name="rid" value="<?//php echo $r['recipe_id'] ?>">
        </td></form>
      </tr>
      <?//php endforeach; ?>  
    </table>  -->


<?php include('footer.php'); ?>