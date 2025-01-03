<?php
session_start();
include("database.php");


// Fetch user data
$user_id = $_SESSION['user_id']; // Assuming user ID is stored in session
$query = "SELECT COUNT(*) AS total_appointments FROM appointments WHERE user_id = '$user_id'";
$result = mysqli_query($cons, $query);
$data = mysqli_fetch_assoc($result);


// Get current date and time
$current_date = date('Y-m-d');
$current_time = date('H:i:s');

// Query to count pending appointments
$query_pending = "
    SELECT COUNT(*) AS pending_count 
    FROM appointments 
    WHERE user_id = '$user_id' 
    AND appointment_date > '$current_date'
    OR (appointment_date = '$current_date' AND appointment_time > '$current_time')
    AND status = 'Pending'";
$result_pending = mysqli_query($cons, $query_pending);
$data_pending = mysqli_fetch_assoc($result_pending);
$pending_appointments = $data_pending['pending_count'];

// Query to count missed appointments
// Correct query to count missed appointments (appointments in the past but still pending)
$query_missed = "
    SELECT COUNT(*) AS missed_count 
    FROM appointments 
    WHERE user_id = '$user_id' 
    AND status = 'Pending'
    AND (
        appointment_date < '$current_date' 
        OR (appointment_date = '$current_date' AND appointment_time < '$current_time')
    )";
$result_missed = mysqli_query($cons, $query_missed);
$data_missed = mysqli_fetch_assoc($result_missed);
$missed_appointments = $data_missed['missed_count'];



$total_appointments = $data['total_appointments'];


$update_status = "
    UPDATE appointments
    SET status = 'Missed'
    WHERE appointment_date < '$current_date'
    OR (appointment_date = '$current_date' AND appointment_time < '$current_time')
    AND status = 'Pending'";
mysqli_query($cons, $update_status);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Sidebar styling */
    .sidebar {
      height: 100vh;
      background-color: #343a40; /* Dark theme */
      padding: 0;
      color: #fff;
    }

    .sidebar .nav-link {
      color: #dcdcdc; /* Light gray */
      font-size: 1rem;
      padding: 15px;
      border-bottom: 1px solid #474f54;
    }

    .sidebar .nav-link:hover {
      background-color: #495057; /* Darker gray */
      color: #fff;
    }

    .sidebar .nav-link.active {
      background-color: #007bff; /* Bootstrap primary color */
      color: #fff;
    }

    .sidebar i {
      margin-right: 10px;
    }

    .main-content {
      padding: 20px;
    }

    .card-title {
      font-size: 1.2rem;
    }

    .table th, .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 d-none d-md-block sidebar">
        <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <i class="fas fa-home"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://form.jotform.com/232504259003042">
                <i class="fas fa-calendar"></i> Book Appointments
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <i class="fas fa-user"></i> Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-cog"></i> Settings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </li>

          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>
        <div class="row">
          <!-- Stats Cards -->
          <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
              <div class="card-body">
                <h5 class="card-title">Total Appointments</h5>
                <p class="card-text"><?php echo $total_appointments; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
          <div class="card text-white bg-success mb-3">
            <div class="card-body">
              <h5 class="card-title">Pending Appointments</h5>
              <p class="card-text"><?php echo $pending_appointments; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
              <div class="card-body">
                <h5 class="card-title">Missed Appointments</h5>
                <p class="card-text"><?php echo $missed_appointments; ?></p>
              </div>
            </div>
          </div>

        <!-- Charts or Table -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Appointment History
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>2024-01-01</td>
                      <td>10:00 AM</td>
                      <td>Completed</td>
                    </tr>
                    <tr>
                      <td>2024-01-05</td>
                      <td>02:00 PM</td>
                      <td>Missed</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
