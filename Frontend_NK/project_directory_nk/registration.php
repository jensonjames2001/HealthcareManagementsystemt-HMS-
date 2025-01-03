
<?php

  session_start();

  include("database.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")

  {
      $firstname = $_POST['first_name'];
      $surname = $_POST['surname'];
      $dob = $_POST['dob'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $phone = $_POST['phone'];

      if(!empty($email) && !empty($password) && !is_numeric($email))
      {
        $query = "insert into patients (first_name, surname, dob, username, email, password, phone) VALUES ('$firstname', '$surname', '$dob', '$username', '$email', '$password', '$phone')";

        mysqli_query($con, $query);

        echo "<script type='text/javascript'> alert('Successully Registered as Patient to Healthcare System!')</script>";

      }

      else{
        
        echo "<script type='text/javascript'> alert('Please Enter Valid Information')</script>";

      }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('background.jpg'); /* Ensure the image path is correct */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
    .container {
      width: 100%;
      max-width: 400px;
      background: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      margin: 50px auto; /* Center horizontally and add space at the top */
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
      font-size: 1.8rem;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 8px;
    }
    .form-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }
    button {
      width: 100%;
      padding: 12px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }
    button:hover {
      background-color: #45a049;
    }
    .note {
      text-align: center;
      font-size: 14px;
      color: #666;
      margin-top: 10px;
    }
    .existing-user {
      text-align: center;
      margin-top: 20px;
    }
    .existing-user a {
      color: #4CAF50;
      text-decoration: none;
    }
    .existing-user a:hover {
      text-decoration: underline;
    }
    #response-message {
      text-align: center;
      margin-top: 20px;
      font-size: 1rem;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Patient Registration</h1>
    <form method="POST">              
      <div class="form-group">
        <label for="first-name">First Name</label>
        <input type="text" id="firstname" name="first_name" placeholder="Enter your first name" required>
      </div>

      <div class="form-group">
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" placeholder="Enter your surname" required>
      </div>

      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" required>
      </div>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
      </div>

      <button type="submit">Register</button>
      <p class="note">Your data is protected and used only for healthcare purposes.</p>

      <div class="existing-user">
        <p>Already have an account? <a href="login.php">Login here</a></p>
      </div>
    </form>
    <p id="response-message"></p>
  </div>

</body>
</html>