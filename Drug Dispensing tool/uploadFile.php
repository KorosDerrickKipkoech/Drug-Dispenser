<?php
session_start(); 
include "db_conn.php";

// Check if a file was uploaded
if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
	$id = $_POST["id"];
	$imageName = $_FILES["image"]["name"];
	$imageTmpName = $_FILES["image"]["tmp_name"];
	$imageType = $_FILES["image"]["type"];
	
	// Check if the uploaded file is an image
	if (strpos($imageType, "image") !== false) {
		// Move the uploaded file to a desired directory
		$uploadDir = "uploads/"; // Directory to store the uploaded images
		$uploadPath = $uploadDir . $imageName;
		
		if {
			// Insert the image details into the database
			$insertQuery = "INSERT INTO images (id, images, img_dir) VALUES ('$id', '$imageName', '$uploadPath')";
			
			if (mysqli_query($conn, $insertQuery)) {
				echo "Image uploaded successfully.";
			} else {
				echo "Error: " . mysqli_error($conn);
			}
		} else {
			echo "Failed to upload the image.";
		}
	} else {
		echo "Invalid file type. Only image files are allowed.";
	}
} else {
	echo "Error occurred during file upload. Please try again.";
}
?>
