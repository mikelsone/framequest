<?php
session_start(); // Ensure session is started
include 'db.php';

$errorMessage = ''; // Initialize an empty error message
$successMessage = ''; // Initialize an empty success message

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Validate login credentials and set session
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $successMessage = 'Login successful. You will be redirected to the home page in <span id="countdown">3</span> seconds.';
            // Add JavaScript for countdown
            echo '<script>
                    var countdown = 3;
                    setInterval(function() {
                        countdown--;
                        document.getElementById("countdown").innerHTML = countdown;
                        if (countdown == 0) {
                            window.location.href = "index.php";
                        }
                    }, 1000);
                  </script>';
        } else {
            $errorMessage = 'Invalid username or password';
        }
    } else {
        $errorMessage = 'Invalid username or password';
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
    <title>Your Website</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
        }

        .left-section {
            flex: 1;
            font-size: 34px;
            margin-left: 20px;
        }

        .middle-section {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .right-section {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-right: 20px;
        }

        a {
            text-decoration: none;
            color: #fff;
            margin: 0 10px;
            padding: 10px;
            cursor: pointer;
        }

        .logout-profile-icons {
            display: flex;
            align-items: center;
        }

        .logout-profile-icons i {
            font-size: 24px;
            margin-left: 10px;
            cursor: pointer;
            vertical-align: middle;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            width: 100%;
        }

        button:hover {
            background-color: #555;
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #3498db; /* Change this to your desired color */
            text-decoration: underline;
        }

        .message-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .error-message {
            background-color: #ff5b5b; /* Light red background for error messages */
            color: #fff;
            border: 1px solid #e74c3c; /* Darker red border for error messages */
            padding: 8px; /* Further reduced padding for error messages */
            margin-bottom: 15px; /* Further reduced margin for error messages */
            font-size: 14px; /* Smaller font size for error messages */
        }

        .success-message {
            background-color: #5cb85c; /* Light green background for success messages */
            color: #fff;
            border: 1px solid #4cae4c; /* Darker green border for success messages */
            padding: 8px; /* Further reduced padding for success messages */
            margin-bottom: 15px; /* Further reduced margin for success messages */
            font-size: 14px; /* Smaller font size for success messages */
        }
    </style>
</head>

<body>

    <header>
        <div class="left-section">
            Frame Quest
        </div>

        <div class="middle-section">
            <!-- Your navigation links go here -->
            <a href="index.php">Home</a>
            <a href="gallery.php">Gallery</a>
            <a href="profiles.php">Photographers</a>
            <a href="upload_photo.php">More</a>
        </div>

        <div class="right-section">
            <!-- Logout and profile icons go here -->
            <div class="logout-profile-icons">
                <i class="material-icons" onclick="openProfile()">account_circle</i>
                <a href="#" onclick="toggleLoginLogout()"><i id="logoutIcon" class="material-icons">exit_to_app</i></a>
            </div>
        </div>
    </header>

    <form method="post" action="">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="login">Login</button>

        <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p>
    </form>

    <!-- Display error or success message if it exists -->
    <?php if (!empty($errorMessage)): ?>
        <div class="message-container error-message">
            <p><?php echo $errorMessage; ?></p>
        </div>
    <?php endif; ?>

    <?php if (!empty($successMessage)): ?>
        <div class="message-container success-message">
            <p><?php echo $successMessage; ?></p>
        </div>
    <?php endif; ?>

    <footer>
        &copy; 2023 Your Website. All rights reserved.
    </footer>

</body>

</html>

