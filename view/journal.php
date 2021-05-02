<?php include('member_header.php'); ?>
<br><h1 class="text-center">Food Journal</h1><br>
<div class="row justify-content-md-center">
  <div class="col-md-10"> 
    <h6 class="text-center">Log food as you add it back into your diet for phase 2. Add the food and any symptoms
      you experience. The date will automatically be added to your entry. Add a new entry each time you add the food.
    </h6><br>

    <div class="row  justify-content-md-center">
    <div class="col-md-10">
    <section id="list" class="list">
      <form action="." method="post" id="list" class="list_header_select">
        <input type="hidden" name="action" value="add_journal">
        <div class="input-group form-group row">
          <div class="col-md-3">
          <span class="input-group-text" id="inputGroup-sizing-lg">Food</span>
          </div>
          <div class="col-md-9">
          <input type="text" name="food" class="form-control" aria-label="Food" aria-describedby="inputGroup-sizing-default">
          </div>
        </div><br>
        <div class="input-group form-group row">
          <div class="col-md-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Comments</span>
          </div>
          <div class="col-md-9">
          <input type="textarea" name="comments" class="form-control" rows="6" aria-label="Comments">
          </div>
        </div><br>
      <button class="add-button btn btn-info" id="add_user">Add Journal Entry</button>
      </form>
      </section>
    </div>
    </div><br><br>

  <h5>Current Entries</h5>
    <div class="table-responsive-sm">
      <table class="table text-center" id="publictable">
        <tr>
          <th>Date</th>
          <th>Food</th>
          <th>Comments</th>
          <th>Delete</th>
        </tr>
        <?php foreach ($entry as $e) : ?>
        <tr>
          <td><?php echo $e['date']; ?></td>
          <td><?php echo $e['food']; ?></td>
          <td><?php echo $e['comments']; ?></td>
          <td><form action="." method="post">
              <input type="hidden" name="action" value="delete_journal">
              <input type="hidden" name="delete_journal" value=<?= $e['entry_id'] ?>>
              <button class="remove-button btn btn-danger" id="delete_journal">Remove</button>
              </form>
          </td>
        </tr>
        <?php endforeach; ?>  
      </table>
    </div>
  </div>
</div>
<?php include('footer2.php'); ?>
