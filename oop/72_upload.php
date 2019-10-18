<?php
echo "<pre>";

if (isset($_POST['submit'])) {
    print_r(isset($_FILES['uploaded_file']) ? $_FILES['uploaded_file'] : "");

    $upload_errors = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the max_file_size directive",
        UPLOAD_ERR_PARTIAL => "The file was partially uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write the file to the disk",
        UPLOAD_ERR_EXTENSION => "A php extension stopped the file upload"
    );

    $temp_name = $_FILES['uploaded_file']['tmp_name'];
    $file = $_FILES['uploaded_file']['name'];
    $directory = '72_uploads';

    if (move_uploaded_file($temp_name, $directory . "/" . $file)) {
       $message= "The file was uploaded successfully";
    } else {
        $error = $_FILES['uploaded_file']['error'];
        $message = $upload_errors[$error];
    }
}

echo "</pre>";

?>

<html lang="en">

<head>

<meta charset="utf-8">
<title>File upload example</title>

</head>

<body>
	<form action="72_upload.php" enctype="multipart/form-data"
		method="post">
		<!-- Svarbu pridėti enctype="multipart/form-data" -->
		
		<?php

if (! empty($upload_errors)) {
    echo "<h2>" . $message . "</h2>";
}

?>

		<input type="file" name="uploaded_file"><br> <input type="submit"
			name="submit">
	</form>
</body>
</html>