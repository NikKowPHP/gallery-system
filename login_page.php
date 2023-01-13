<?php require_once("./admin/includes/login.php") ?>
<?php require_once("./includes/header.php") ?>

<div class="col-md-4 col-md-offset-3">


<form id="login-id" action="./admin/includes/login.php" method="post">

	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">

	</div>


	<div class="form-group">
		<input type="submit" name="submit" value="Submit" class="btn btn-primary">

	</div>


</form>

    <h4 class="bg-danger"><?= $session->message ?? "" ?></h4>

</div>
