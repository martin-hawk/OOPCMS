<?php
include ("includes/header.php");

if (! $session->is_signed_in()) {
    redirect('login.php');
}

$message = "";
if (isset($_POST['submit'])) {
    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->set_file($_FILES['file_uploaded']);

    if ($photo->save_file()) {
        $message = "Photo uploaded successfully";
    } else {
        $message = join("<br>", $photo->errors);
    }
}

?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
		<?php include("includes/top_nav.php"); ?>
		<?php include("includes/side_nav.php"); ?>
	<!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Upload <!-- <small>Subheading</small> -->
				</h1>
				<div class="col-md-6">
				<?php echo $message; ?> 
					<form action="upload.php" enctype="multipart/form-data"
						method="post">

						<div class="form-group">
							<input type="text" name="title" class="form-control">
						</div>
						<div class="form-group">
							<input type="file" name="file_uploaded">
						</div>

						<input type="submit" name="submit" value="Submit" class="btn btn-primary">
				
				</div>
				</form>

			</div>
		</div>
		<!-- /.row -->

	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>