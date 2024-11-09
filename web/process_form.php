<?php

include("include/session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] === UPLOAD_ERR_OK) {
        // Define a folder where uploaded images will be stored
        $targetDirectory = "uploads/"; // Create this folder if it doesn't exist
		// Create the target directory if it doesn't exist
		if (!file_exists($targetDirectory)) {
    			mkdir($targetDirectory, 0755, true);
		}
        // Generate a unique filename for the uploaded image
        $targetFile = $targetDirectory . uniqid() . "_" . basename($_FILES["fileToUpload"]["name"]);

        // Move the uploaded file to the target folder
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            // Image uploaded successfully
            // Now, store the file path and the selected option in the database

            // Database connection details
            $servername = "localhost";
            $username = "stud";
            $password = "stud";
            $dbname = "vartvalds";

           // Get the username and new art value
$username = $session->username; // Replace with the actual username

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the "art" column for the specified user
$sql = "UPDATE user SET art = '$targetFile' WHERE username = '$username'";

if ($conn->query($sql) === TRUE) {
    echo "Art updated successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file was uploaded or an error occurred.";
    }
}
?>