<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) 
    {
        $query = "SELECT * FROM patients WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($cons, $query);

        if($result)
        {
            if ($result && mysqli_num_rows($result) > 0) 
            {
              $user_data = mysqli_fetch_assoc($result);

              if($user_data['password']==$password)
              {
                header("location: index.php");
                die;
              }
            }
        }
        echo "<script type='text/javascript'> alert('Incorrect username or password.')</script>";
    }
    else
    {
      echo "<script type='text/javascript'> alert('Incorrect username or password.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: url('background.jpg'); /* Ensure this path is correct */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
    .login-form {
      background: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    .login-form h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #333;
    }
    .form-group {
      display: flex;
      flex-direction: column;
      margin-bottom: 15px;
    }
    .form-group label {
      margin-bottom: 5px;
      font-weight: bold;
    }
    .form-group input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }
    .login-form button {
      padding: 10px;
      background: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px; /* Reduced space between button and next section */
    }
    .login-form button:hover {
      background: #45a049;
    }
    .login-form .forgot-password {
      text-align: center;
      margin-top: 5px; /* Reduced margin-top for tighter spacing */
    }
    .login-form .forgot-password a {
      color: #4CAF50;
      text-decoration: none;
    }
    .login-form .forgot-password a:hover {
      text-decoration: underline;
    }
    .login-form .register {
      text-align: center;
      margin-top: 0px; /* Reduced margin-top */
    }
    .login-form .register a {
      color: #4CAF50;
      text-decoration: none;
    }
    .login-form .register a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class = "login-form">
  <form method="POST">
    <h2>Login</h2>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" id="email" name="email" placeholder="Enter your email" required>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
    </div>

    <button type="submit">Login</button>

    <!-- Forgot password link -->
    <div class="forgot-password">
      <a href="#">Forgot password?</a>
    </div>
    
    <!-- Link to registration page for new users -->
    <div class="register">
      <p>New user? <a href="registration.php">Create an account</a></p>
    </div>
  </form>
  
</div>
</body>
</html>
