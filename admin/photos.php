<?php
include ("includes/header.php");

if (! $session->is_signed_in()) {
    redirect('login.php');
}

$photos = Photo::find_all();

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
					Photos
					<!-- <small>Subheading</small> -->
				</h1>
				<p class="bg-success"><?php echo $message; ?></p>
				<div class="col-md-12">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Photo</th>
								<th>ID</th>
								<th>File name</th>
								<th>Title</th>
								<th>Size</th>
								<th>Comments</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($photos as $photo) : ?>
						<tr>
								<td><img alt="" class="admin-photo-thumbnail"
									src="<?php echo $photo->picture_path(); ?>"
									style="height: 100px;">
									<div class="action_links">
										<a class="delete-link"
											href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
										<a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
										<a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
									</div></td>

								<td><?php echo $photo->id; ?></td>
								<td><?php echo $photo->filename; ?></td>
								<td><?php echo $photo->title; ?></td>
								<td><?php echo $photo->size; ?></td>
								<td><?php
        $comments = Comment::find_comments($photo->id);
        echo '<a href="comment_photo.php?id=' . $photo->id . '">' . count($comments) . '</a>';
        ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
					</table>

				</div>
			</div>
		</div>
		<!-- /.row -->

	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>