<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
    <title>Your Website</title>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: Arial, sans-serif;
            overflow-y: auto;
            scrollbar-width: thin; /* For Firefox */
            scrollbar-color: transparent transparent; /* For Firefox */
        }

        body::-webkit-scrollbar {
            width: 0; /* For Chrome, Safari, and Opera */
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
            font-size: 34px; /* Set your desired font size */
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
            vertical-align: middle; /* Align the icons vertically */
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            margin-top: 0; /* Add margin to the top */
        }

        #gallery {
            background-color: blue; 
            padding: 50px; 
            margin: 150px;
            margin-top: 150px;
            margin-bottom: 150px;
            column-count: 3;
            column-gap: 20px;
        }

        .photo {
            position: relative;
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .photo:hover {
            transform: scale(1.03);
        }

        .photo img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            display: block;
        }

        .photo-details {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .photo:hover .photo-details {
            opacity: 1;
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
            <a href="my_photos.php">More</a>
        </div>

        <div class="right-section">
            <!-- Logout and profile icons go here -->
            <div class="logout-profile-icons">
                <i class="material-icons" onclick="openProfile()">account_circle</i>
                <a href="#" onclick="toggleLoginLogout()"><i id="logoutIcon" class="material-icons">exit_to_app</i></a>
            </div>
        </div>
    </header>

    <div id="gallery">
        <?php
        // Include the database connection
        include 'db.php'; // Make sure to include the database connection

        // Fetch all user-uploaded photos from the gallery
        $sql = "SELECT * FROM gallery";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $photoPath = $row['image_path'];
                $username = $row['username'];
                $description = $row['description'];

                echo '<div class="photo">
                        <img src="' . $photoPath . '" alt="Uploaded Photo">
                        <div class="photo-details">
                            <div>Uploader: ' . $username . '</div>
                            <div>Description: ' . $description . '</div>
                        </div>
                      </div>';
            }
        } else {
            echo '<p>No photos uploaded yet.</p>';
        }
        ?>
    </div>

    <footer>
        &copy; 2023 Your Website. All rights reserved.
    </footer>

    <script>
        // JavaScript for responsive navigation (unchanged)
        const navbar = document.getElementById('navbar');
        const burgerMenu = document.createElement('div');
        burgerMenu.className = 'burger-menu';
        burgerMenu.innerHTML = '<div class="bar"></div><div class="bar"></div><div class="bar"></div>';
        navbar.appendChild(burgerMenu);

        burgerMenu.addEventListener('click', () => {
            navbar.classList.toggle('open');
        });

        function toggleLoginLogout() {
            // Check if the user is logged in or not
            const isLoggedIn = <?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>;

            // Redirect accordingly
            if (isLoggedIn) {
                window.location.href = 'logout.php'; // Logout
            } else {
                window.location.href = 'login.php'; // Login
            }
        }

        function openProfile() {
            // Implement the logic for opening the user's profile
            // This function can be customized based on your requirements
        }
    </script>
</body>

</html>
