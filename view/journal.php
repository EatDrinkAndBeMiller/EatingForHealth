<?php include('member_header.php'); ?>
<h1 class="text-center">Food Journal</h1>
<div class="container-fluid" >
<div>
<section id="list" class="list">
    <header class="list row list header">
    <form action="." method="post" id="list" class="list_header_select">
    <input type="hidden" name="action" value="add_journal">
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-lg">Food</span>
  <input type="text" name="food" class="form-control" aria-label="Food" aria-describedby="inputGroup-sizing-default">
</div><br>
<div class="input-group input-group-lg">
  <span class="input-group-text" id="inputGroup-sizing-default">Comments</span>
  <input type="text" name="comments" class="form-control" rows="6" aria-label="Comments">
</div><br>
<button class="add-button bold" id="add_user">Add Journal Entry</button>
    </form>
    </header>
    </div><br><br>

    
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
        <input type="hidden" name="action"
        value="delete_journal">
        <input type="hidden" name="delete_journal" value=<?= $e['entry_id'] ?>>
        <button class="remove-button" id="delete_journal">Remove</button>
        </form></td>
      </tr>
      <?php endforeach; ?>  
    </table>
</div>
<?php include('footer2.php'); ?>
