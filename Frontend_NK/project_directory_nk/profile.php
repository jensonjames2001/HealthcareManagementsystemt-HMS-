<?php
// Start the session to access session variables
session_start();

// Include database connection file
include('database.php');

// Check if the user ID is set in the session (assuming the user logged in and the ID was stored in session)
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit(); // If the session doesn't have the user_id, stop the script
}

// Use the session user_id to fetch the patient data from the 'patients' table
$patient_id = $_SESSION['user_id']; // Make sure user_id is available in session

// Prepare a query to fetch the patient data from the 'patients' table
$query = "SELECT * FROM patients WHERE id = ?";

// Prepare the query to prevent SQL injection
$stmt = mysqli_prepare($cons, $query);
mysqli_stmt_bind_param($stmt, "i", $patient_id); // "i" indicates the patient_id is an integer
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if the patient data exists
if ($result && mysqli_num_rows($result) > 0) {
    $patient_data = mysqli_fetch_assoc($result); // Fetch the patient data
} else {
    echo "Patient data not found.";
    exit(); // If no data found, stop the script
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="my-4">User Profile</h1>

    <!-- Profile Card -->
    <div class="card">
        <div class="card-header">
            <h3><?= $patient_data['first_name'] . ' ' . $patient_data['surname']; ?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Profile Picture Section -->
                <div class="col-md-4">
                    <!-- Display default profile picture if the user has no picture -->
                    <img src="uploads/<?= !empty($patient_data['profile_picture']) ? $patient_data['profile_picture'] : 'default.png'; ?>" class="img-fluid rounded-circle" alt="Profile Picture">
                </div>

                <!-- User Info Section -->
                <div class="col-md-8">
                    <p><strong>Email:</strong> <?= $patient_data['email']; ?></p>
                    <p><strong>Phone:</strong> <?= $patient_data['phone']; ?></p>
                    <p><strong>Gender:</strong> <?= $patient_data['gender']; ?></p>
                    <p><strong>Date of Birth:</strong> <?= $patient_data['dob']; ?></p>
                    <p><strong>Address:</strong> <?= $patient_data['address']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Update Form -->
    <h2 class="my-4">Update Profile</h2>
    <form action="update_profile.php" method="POST">
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $patient_data['first_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname" value="<?= $patient_data['surname']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $patient_data['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= $patient_data['phone']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
