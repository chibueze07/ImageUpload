<?php
	/**
	 * checks if the selected image is in the array,
	 * extracts the file path and moves the uploaded 
	 * image into the filepath.
	 */
	if (isset($_FILES['image'])) {
		
		$directory = 'uploads/';
				
		$filepath = $directory . basename($_FILES["image"]["name"]);

		$imageUpload = move_uploaded_file($_FILES["image"]["tmp_name"], $filepath);

		if ($imageUpload)
			echo 'Image uploaded successfully';
		else
			echo 'Image not uploaded';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="image">
		<button type="submit">Submit</button>
	</form>
</body>
</html>