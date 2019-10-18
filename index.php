<?php
include ("includes/header.php");

$page = empty($_GET['page']) ? 1 : (int) $_GET['page'];
$items_page = 4;
$items_total = Photo::count_all();

// $photos = Photo::find_all();

$pagination = new Paginate($page, $items_page, $items_total);

$sql = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_page} ";
$sql .= "OFFSET {$pagination->offset()}";

$photos = Photo::find_query($sql);

?>

<div class="row">

	<!-- Blog Entries Column -->
	<div class="col-md-12"></div>

	<div class="thumbnails row">
	<?php foreach ($photos as $photo) : ?>

		<div class="col-xs-6 col-md-3">

			<a href="photo.php?id=<?php echo $photo->id; ?>" class="thumbnail"> <img
				alt="" class="img-responsive home_page_photo"
				src="admin/<?php echo $photo->picture_path(); ?>">
			</a>

		</div>
			<?php endforeach; ?>
		</div>
	<div class="row">
		<ul class="pager">

<?php

if ($pagination->page_total() > 0) {
    if ($pagination->has_next()) {
        echo "<li class='next'><a href='index.php?page={$pagination->next()}'>Next</a></li>";
    }

    for ($i = 1; $i <= $pagination->page_total(); $i ++) {
        if ($i == $pagination->current_page) {
            echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
        } else {
            echo "<li class='inactive'><a href='index.php?page={$i}'>{$i}</a></li>";
        }
    }

    if ($pagination->has_previous()) {
        echo "<li class='previous'><a href='index.php?page={$pagination->prvious()}'>Previous</a></li>";
    }
}

?>


</ul>
	</div>

</div>
<!-- Blog Sidebar Widgets Column -->
<!-- <div class="col-md-4"> -->
<?php //include("includes/sidebar.php"); ?>
<!-- </div> -->
<!-- /.row -->

<?php include("includes/footer.php"); ?>
