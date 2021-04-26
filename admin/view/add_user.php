<?php include('header.php'); ?>

<section id="list" class="list">
    <header class="list row list header">
    <form action="." method="post" id="list" class="list_header_select">
    <input type="hidden" name="action" value="add_user">
    <select name="admin" class="form-select" aria-label="Select Category" required>
    <option selected>Administrator</option>
    <option value="True">True</option>
    <option value="False">False</option>
    </select><br>
    <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
  <input type="text" name="username" class="form-control" aria-label="Model" aria-describedby="inputGroup-sizing-default">
</div><br>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Email Address</span>
  <input type="email" name="email" class="form-control" aria-label="Year" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
  <input type="password" name="password" class="form-control" aria-label="Price" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Confirm Password</span>
  <input type="password" name="confirm_password" class="form-control" aria-label="Price" aria-describedby="inputGroup-sizing-default">
</div>
<button class="add-button bold" id="add_user">Add User</button>
    </form>
    </header>

<table id="publictable">
    <tr>
    <th>Username</th>
    <th>Email</th>
    <th>Delete User</th>

    </tr>
    <?php foreach ($users as $u) : ?>
    <tr>
    <td><?php echo (empty($u)) ? 'No Matching Recipes' : $u['username']; ?></td>
    <td><?php echo (empty($u)) ? 'No Matching Recipes' : $u['email']; ?></td>
    <td><form action="." method="post">
    <input type="hidden" name="action"
    value="delete_user">
    <input type="hidden" name="delete_user" value=<?= $u['user_id'] ?>>
    <button class="remove-button" id="delete_user">Remove</button>
    </form></td>
    </tr>
    </form>
    <?php endforeach; ?>  
</table>
<a href="./index.php?action=list_recipe">Return to Admin Home</a>
<?php include('footer.php'); ?>