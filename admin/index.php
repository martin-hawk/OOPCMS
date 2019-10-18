<?php
include ("includes/header.php");

if (! $session->is_signed_in()) {
    redirect('login.php');
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
					Administrator <small>Dashboard</small>
				</h1>

				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-users fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $_SESSION['count']; ?></div>
										<div>New Views</div>
									</div>
								</div>
							</div>
							<a href="index.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span> <span
										class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-photo fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo Photo::count_all(); ?></div>
										<div>Photos</div>
									</div>
								</div>
							</div>
							<a href="photos.php">
								<div class="panel-footer">
									<span class="pull-left">Total Photos in Gallery</span> <span
										class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>


					<div class="col-lg-3 col-md-6">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-user fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo User::count_all(); ?></div>

										<div>Users</div>
									</div>
								</div>
							</div>
							<a href="users.php">
								<div class="panel-footer">
									<span class="pull-left">Total Users</span> <span
										class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-support fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo Comment::count_all(); ?></div>
										<div>Comments</div>
									</div>
								</div>
							</div>
							<a href="comments.php">
								<div class="panel-footer">
									<span class="pull-left">Total Comments</span> <span
										class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>


				</div>
				<!--First Row-->

				<div>
					<div id="piechart" style="width: 900px; height: 500px;"></div>
				</div>
			
			<?php

// $result_set =User::find_all_users();
// while ($row =$result_set->fetch_array()) {
// echo $row['username'] . '<br>';
// }

// $found_user=User::find_by_id(2);
// $user = User::instantiation($found_user);
// echo 'found: ' .$user->username;

// $users= User::find_all();
// foreach ($users as $user) {
// echo $user->username . '<br>';
// }

// $found_user=User::find_user_by_id(2);
// echo "found: " .$found_user->username;

// Create user
// $user =new User();
// $user->username="ema";
// $user->password="dwp";
// $user->first_name="None";
// $user->last_name="None";
// $user->create();

// Update user
// $user =User::find_user_by_id(2);
// $user->last_name = "Markof";
// $user->update();

// Delete user
// $user=User::find_by_id(9);
// $user->delete();

// $user =User::find_by_id(8);
// $user->password = "raw";
// $user->last_name = "Lars";
// $user->save();

// $user =new User();
// $user->username="dana";
// $user->password="pwd";
// $user->first_name="Diana";
// $user->last_name="Johns";
// $user->save();

// $photos = Photo::find_all();
// foreach ($photos as $photo) {
// echo $photo->title;
// }

// $found_photo=Photo::find_by_id(1);
// echo "found: " .$found_photo->size;

// echo INCLUDES_PATH;

?>		
		</div>
		</div>
		<!-- /.row -->

	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>