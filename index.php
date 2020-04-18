<?php include_once('inc/common.php'); ?>
<?php include_once('inc/header.php'); ?>

<div class="page-header">
<form class="input-group input-query" name="query" method="post" action="">
<input name="query" type="search" class="form-control form-ctrl-search" size="100%" placeholder="Search for screenshots..." required>
</form> </div>

<?php
if (isset($site_notices)) {
  foreach ($site_notices as $notice) {
?>
<div class="alert alert-headsup" role="alert">
  <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
  <?php echo $notice; ?>
</div>
<?php
  }
}
?>

<div class="row">
<div class="col-md-12">

<?php include_once('inc/explore.php'); ?>

</div>
</div>

<?php include_once('inc/footer.php'); ?>
