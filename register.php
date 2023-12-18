<?php
include 'db.php';

$registrationMessage = ''; // Initialize an empty registration message
$messageClass = ''; // Initialize an empty class for styling

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Handle registration logic
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];

    // Validate phone number to ensure it contains only numbers
    if (!preg_match('/^[0-9]+$/', $phone)) {
        $registrationMessage = '<p class="error">Invalid phone number. Please enter only numbers.</p>';
        $messageClass = 'registration-message-error';
    } else {
        // Validate password
        if (strlen($password) < 6 || !preg_match('/[0-9]/', $password)) {
            $registrationMessage = '<p class="error">Password must be at least 6 characters long and include at least one number.</p>';
            $messageClass = 'registration-message-error';
        } else {
            // Proceed with registration logic
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, password, email, name, surname, phone, gender, role) 
                    VALUES ('$username', '$hashedPassword', '$email', '$name', '$surname', '$phone', '$gender', '$role')";

            try {
                $registrationSuccessful = $conn->query($sql);

                if ($registrationSuccessful) {
                    $registrationMessage = '<p class="success">Registration successful. You will be redirected to the login page in <span id="countdown">3</span> seconds.</p>';

                    echo '<script>
                    var countdown = 3;
                    setInterval(function() {
                        countdown--;
                        document.getElementById("countdown").innerHTML = countdown;
                        if (countdown == 0) {
                            window.location.href = "login.php";
                        }
                    }, 1000);
                  </script>';
                } else {
                    $registrationMessage = '<p class="error">Registration failed. Please try again.</p>';
                    $messageClass = 'registration-message-error';
                }
            } catch (mysqli_sql_exception $e) {
                $registrationMessage = '<p class="error">Username already exists. Choose another username.</p>';
                $messageClass = 'registration-message-error';
            }
        }
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

        .login-link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
            color: #3498db; /* Change this to your desired color */
            text-decoration: underline;
        }


.registration-message {
    max-width: 400px;
    margin: 20px auto;
    padding: 5px 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
    background-color: #5cb85c; /* Light green background for success messages */

}

.registration-message-error {
    max-width: 400px;
    margin: 20px auto;
    padding: 5px 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
    background-color: #ff5b5b; /* Light red background for error messages */

}

/* Add new styles for gender and role buttons */
.gender-options,
.role-options {
    display: flex;
    justify-content: center;
    margin-bottom: 15px;
}

.gender-options label,
.role-options label {
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    border: 1px solid #333;
    border-radius: 4px;
    cursor: pointer;
    color: #333; /* Default color */
}

.gender-options input,
.role-options input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

.gender-options input:checked + label,
.role-options input:checked + label {
    background-color: blue; /* Color when pressed/chosen */
    color: #fff;
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
        <h2>Register</h2>
        <label for="reg-username">Username:</label>
        <input type="text" id="reg-username" name="username" required>

        <label for="reg-password">Password:</label>
        <input type="password" id="reg-password" name="password" required>

        <!-- Add new fields -->
        <label for="reg-email">Email:</label>
        <input type="email" id="reg-email" name="email" required>

        <label for="reg-name">Name:</label>
        <input type="text" id="reg-name" name="name" required>

        <label for="reg-surname">Surname:</label>
        <input type="text" id="reg-surname" name="surname" required>

        <label for="reg-phone">Phone Number:</label>
        <input type="tel" id="reg-phone" name="phone" pattern="[0-9]+" title="Please enter only numbers" required>

<!-- Add gender options -->
<div class="gender-options">
    <label>
        <input type="radio" name="gender" value="male" required>
        <span>Male</span>
    </label>
    <label>
        <input type="radio" name="gender" value="female">
        <span>Female</span>
    </label>
    <label>
        <input type="radio" name="gender" value="other">
        <span>Other</span>
    </label>
</div>

<!-- Add role options -->
<div class="role-options">
    <label>
        <input type="radio" name="role" value="work" required>
        <span>Work</span>
    </label>
    <label>
        <input type="radio" name="role" value="hire">
        <span>Hire</span>
    </label>
</div>

        <button type="submit" name="register">Register</button>

        <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
    </form>


    <?php if (!empty($registrationMessage)): ?>
    <div class="registration-message <?php echo $messageClass; ?>">
        <p><?php echo $registrationMessage; ?></p>
    </div>
<?php endif; ?>

    <footer>
        &copy; 2023 Your Website. All rights reserved.
    </footer>


    <script>
  function closeRegistrationMessage() {
        var registrationMessage = document.querySelector('.registration-message');
        if (registrationMessage) {
            registrationMessage.style.display = 'none';
        }
    }

    function updateGenderOptions() {
        var genderOptions = document.getElementsByName('gender');
        var labels = document.querySelectorAll('.gender-options label');

        labels.forEach(function(label, index) {
            label.style.backgroundColor = genderOptions[index].checked ? 'blue' : '';
            label.style.color = genderOptions[index].checked ? '#fff' : '#333';
        });
    }

    function updateRoleOptions() {
        var roleOptions = document.getElementsByName('role');
        var labels = document.querySelectorAll('.role-options label');

        labels.forEach(function(label, index) {
            label.style.backgroundColor = roleOptions[index].checked ? 'blue' : '';
            label.style.color = roleOptions[index].checked ? '#fff' : '#333';
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        var genderOptions = document.getElementsByName('gender');
        var roleOptions = document.getElementsByName('role');

        genderOptions.forEach(function(option) {
            option.addEventListener('change', updateGenderOptions);
        });

        roleOptions.forEach(function(option) {
            option.addEventListener('change', updateRoleOptions);
        });
    });
</script>


</body>

</html>
