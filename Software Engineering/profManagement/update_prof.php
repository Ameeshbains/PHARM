<?php
include("config/dbConnection.php");

session_start();
$user_id = $_SESSION['user_id']; // Assuming you have a user session

// Handle profile image upload
if ($_FILES['profile_image']['size'] > 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['profile_image']['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['profile_image']['tmp_name']);
    if ($check !== false) {
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }
        // Move uploaded file to destination directory
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
            // Update profile image in database
            $query = "UPDATE users SET profile_image = ? WHERE id = ?";
            $statement = $conn->prepare($query);
            $statement->execute([$target_file, $user_id]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        echo "File is not an image.";
        exit;
    }
}

// Handle password update
if (!empty($_POST['new_password'])) {
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $query = "UPDATE users SET password = ? WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->execute([$new_password, $user_id]);
}

header("Location: profile.html");
exit;
?>
