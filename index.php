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
            overflow: hidden; /* Hide the vertical scroll bar on the body */
            background-color: #FBAB7E;
            background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);


        }

        body, html {
    height: 100%; /* Ensure full height of the viewport */
    overflow-y: scroll; /* Enable scrolling */
}

/* Style the scrollbar to make it transparent */
body::-webkit-scrollbar {
    width: 0; /* Adjust the width as needed */
}

body::-webkit-scrollbar-thumb {
    background-color: transparent; /* Make the thumb transparent */
}

body::-webkit-scrollbar-track {
    background-color: transparent; /* Make the track transparent */
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
            vertical-align: middle; /* Add this line */
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

        .explore-section {
    padding: 50px;
}

.explore-text {
    font-size: 34px; /* Set your desired font size */
    color: #333; /* Set your desired text color */
    text-align: center;
    font-weight: bold;
}

.image-gallery {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        .image-container {
            margin: 25px;
            margin-bottom: auto;
        }

        .image-container img {
            width: 700px; /* Set your desired width */
            height: 500px; /* Set your desired height */
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .image-container:hover img {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .about-section {
    background-color: transparent; /* Set your desired background color */
    padding: 50px;
    text-align: center;
}

.about-section h2 {
    font-size: 34px; /* Set your desired font size */
    color: #333; /* Set your desired text color */
}

.about-section p {
    font-size: 24px; /* Set your desired font size */
    color: #555; /* Set your desired text color */
    margin-top: 10px; /* Adjust the top margin */
    margin-bottom: 10px; /* Adjust the bottom margin */
    margin-left: 250px; /* Adjust the bottom margin */
    margin-right: 250px; /* Adjust the bottom margin */
    line-height: 1.4; /* Adjust the line height for compactness */
}

.user-thoughts {
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 120px;
    margin-bottom: 120px;
    padding: 50px;
    background-color: #333; /* Set your desired background color */
}

.user-profile {
    text-align: center;
    max-width: 300px;
}

.user-profile img {
    width: 150px; /* Set your desired width for the circular images */
    height: 150px; /* Set your desired height for the circular images */
    border-radius: 50%;
    margin-bottom: 15px;
    object-fit: cover; /* Ensure the image covers the circular container */
}

.user-profile h3 {
    font-size: 24px;
    color: white;
    margin-bottom: 10px;
}

.user-profile p {
    font-size: 18px;
    color: #555;
}

.expect-section {
            background-color: transparent; /* Set your desired background color */
            padding: 50px;
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .expect-section h2 {
            margin-bottom: 60px;
            font-size: 34px; /* Set your desired font size */
            color: #333; /* Set your desired text color */
        }

        .expect-icons {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .expect-icons i {
            font-size: 48px;
            color: #333;
        }

        .expect-icons p {
            font-size: 18px;
            color: #555;
            margin-top: 10px;
        }

        .start-creating-btn {
    background-color: #333;
    margin-top: 50px;
    color: #fff;
    padding: 10px 60px;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.start-creating-btn:hover {
    background-color: #555;
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
                <i class="material-icons" onclick="openProfile()" style="vertical-align: middle;">account_circle</i>
                <a href="#" onclick="toggleLoginLogout()" style="vertical-align: middle;"><i id="logoutIcon" class="material-icons">exit_to_app</i></a>
            </div>
        </div>
        </div>
    </header>

    <section class="explore-section">
        <div class="middle-section">
            <p class="explore-text">Explore, Connect, and Capture the Moment in One Vibrant Space!</p>
        </div>
    </section>

    <section class="image-gallery">
        <div class="image-container">
            <img src="https://images.unsplash.com/photo-1621092277192-e7c0269429a1?q=80&w=2793&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Photograph 1">
        </div>
        <div class="image-container">
            <img src="https://images.unsplash.com/photo-1621092277162-eea7f76cd884?q=80&w=2793&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Photograph 2">
        </div>
        <div class="image-container">
            <img src="https://images.unsplash.com/photo-1621092276723-3634999cbe4f?q=80&w=2793&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Photograph 3">
        </div>
    </section>

    <section class="about-section">
    <h2>About Frame Quest</h2>
    <p>
        Here, photographers converge in one specific space, creating a dynamic community that celebrates the artistry of visual expression.
        With a multitude of categories ranging from captivating portraits and sweeping landscapes to the intricacies of macro photography,
        our platform is a visual feast curated for enthusiasts and connoisseurs alike.
    </p>
    <button class="start-creating-btn" onclick="redirectToRegister()">Start creating</button>
</section>

<section class="user-thoughts">
    <div class="user-profile">
        <img src="https://images.unsplash.com/photo-1621024994326-91782bb4a5ba?q=80&w=3772&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="User 1">
        <h3>Mateo Hrench</h3>
        <p>"Frame Quest is an amazing platform to showcase my photography skills. I love how it brings photographers together and provides a space for creativity."</p>
    </div>

    <div class="user-profile">
        <img src="https://images.unsplash.com/photo-1621024994278-e409544f4085?q=80&w=2997&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="User 2">
        <h3>Roby Sinles</h3>
        <p>"Being a part of Frame Quest has been a fantastic experience. The diverse range of photography categories and the supportive community make it truly special."</p>
    </div>

    <div class="user-profile">
        <img src="https://images.unsplash.com/photo-1692222492645-5c23fd4cf3b9?q=80&w=3511&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="User 3">
        <h3>Mark Ottord</h3>
        <p>"Frame Quest has made it easy for me to connect with other photographers and share my work. It's a go-to platform for anyone passionate about photography."</p>
    </div>
</section>

<section class="about-section">
    <h2>Why does this work?</h2>
    <p>
    In a world where visual communication is paramount, our platform fosters connection and discovery.
    Photographers showcase their skills, audiences find inspiration, and clients discover the perfect lens to capture their unique vision. 
    Join us in this visual journey where creativity knows no bounds, and photographers find a home to showcase their artistry—a place where the magic of every click is celebrated and shared.
    </p>
</section>

<section class="image-gallery">
        <div class="image-container">
            <img src="https://images.unsplash.com/photo-1602545165092-b666bf7ea3dc?q=80&w=2792&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Photograph 1">
        </div>
        <div class="image-container">
            <img src="https://images.unsplash.com/photo-1602545165103-f1f9cb2b4c32?q=80&w=1861&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Photograph 2">
        </div>
        <div class="image-container">
            <img src="https://images.unsplash.com/photo-1602545164910-81aecfd1413d?q=80&w=2792&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Photograph 3">
        </div>
    </section>

<section class="expect-section">
    <h2>What Can You Expect?</h2>
    <div class="expect-icons">
        <div>
            <i class="material-icons">cloud_upload</i>
            <p>Upload Your Work</p>
        </div>
        <div>
            <i class="material-icons">visibility</i>
            <p>Get Discovered Easily</p>
        </div>
        <div>
            <i class="material-icons">work</i>
            <p>Hire for Yourself</p>
        </div>
    </div>
</section>

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

        function redirectToRegister() {
    // Redirect to the register page
    window.location.href = 'register.php';
}

    </script>
</body>
</html>
