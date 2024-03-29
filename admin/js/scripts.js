$(document).ready(function() {

	var user_href;
	var user_href_split;
	var user_id;
	var image_src;
	var image_src_split;
	var image_name;
	var image_id;

	/** ******* Edit Photo Side bar ******** */

	$(".modal_thumbnails").click(function() {
		$("#set_user_image").prop('disabled', false);
		user_href = $("#user-id").prop('href');
		user_href_split = user_href.split("=");
		user_id = user_href_split[user_href_split.length - 1];

		image_src = $(this).prop("src");
		image_src_split = image_src.split("/");
		image_name = image_src_split[image_src_split.length - 1];

		image_id = $(this).attr("data");

		$.ajax({
			url : "includes/ajax_code.php",
			data : {
				image_id : image_id
			},
			type : "POST",
			success : function(data) {
				if (!data.error) {
					$("#modal_sidebar").html(data);
				}
			}
		});

	});

	$("#set_user_image").click(function() {
		$.ajax({
			url : "includes/ajax_code.php",
			data : {
				image_name : image_name,
				user_id : user_id
			},
			type : "POST",
			success : function(data) {
				if (!data.error) {
					// location.reload(true);
					$(".user_image a img").prop('src', data);
				}
			}
		})
	});

	/** ******* Edit Photo Side bar ******** */

	$(".info-box-header").click(function() {
		$(".inside").slideToggle("fast");
		$("#toggle").toggleClass("glyphicon-menu-up");
		$("#toggle").toggleClass("glyphicon-menu-down");
	});

	/** ******* Tiny MCE Text Editor ******** */

	tinymce.init({
		selector : 'textarea'
	});

	/** ******* Tiny MCE Text Editor ******** */
	$(".delete-link").click(function() {
		return confirm("Are you sure you want to delete this item?");
	})

});
