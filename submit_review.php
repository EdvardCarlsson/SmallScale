<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect form data and sanitize it
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $review = htmlspecialchars($_POST['review']);

    // Prepare the review string for saving
    $newReview = "Name: $name, Email: $email, Review: $review\n";

    // Define the file where reviews will be saved
    $file = 'reviews.txt';

    // Save the review to the file
    if (file_put_contents($file, $newReview, FILE_APPEND | LOCK_EX)) {
        // If the file write was successful, show a success message
        echo "Thank you, your review has been submitted!";
    } else {
        // If there was an error saving the file, show an error message
        echo "Sorry, there was a problem saving your review. Please try again.";
    }
} else {
    // If the request method is not POST, display an error message
    echo "Invalid request method. Please submit the form properly.";
}
?>
