<?php include('view/header.php'); ?>
<div class="wrapper-main">
<section class="section-default">

<?php
if (empty($selector) || empty($validator)) {
    echo "Could not validate your request!";
} else {
    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
        ?>

        <form action="." method=post>
        <input type="hidden" name="selector" value="<?php echo $selector ?>">
        <input type="hidden" name="validator" value="<?php echo $validator ?>">
        <input type="password" name="pwd" placeholder="Enter a new password...">
        <input type="password" name="pwd-repeat" placeholder="Repeat password...">
        <button type="submit" name="reset-password-bttn">Reset password</button>
        </form>
    <?php
    }
}
?>
</section>
</div>

<?php include('view/footer2.php'); ?>
