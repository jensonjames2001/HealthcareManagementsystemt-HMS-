<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare System - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<style>
/* Sidebar Styling */
.bg-nhs-blue {
    background-color: #005eb8 !important;
}

.nav-link {
    padding: 12px 20px;
    font-size: 14px;
    text-transform: uppercase;
}

.nav-link:hover {
    background-color: #004080;
    color: white;
}

.nav-item {
    margin-bottom: 10px;
}

/* Logo Styling */
.text-center img {
    max-width: 100%; /* Ensures the logo size fits within the sidebar */
    height: auto;
    margin-top: 20px;
    margin-bottom: 20px;
    z-index: 10; /* Ensures logo stays on top */
}

/* Collapse Section (for Services) */
.collapse ul {
    padding-left: 20px;
}

.collapse .nav-link {
    font-size: 14px;
    padding-left: none;
}

/* Main Banner Styling */
.banner {
    color: white;
    padding: 50px 20px;
    margin-bottom: 20px;
}

.banner h2 {
    font-size: 2.5rem;
    font-weight: bold;
}

.banner p {
    font-size: 2rem;
}

/* Button Styling */
.btn-custom {
    background-color: #007bff;
    color: white;
    font-size: 16px;
    padding: 10px 20px;
}

.button-container .btn {
    min-width: 150px;
}

/* Responsive Sidebar */
@media (max-width: 768px) {
    .col-md-3, .col-lg-2 {
        width: 100%;
        padding: 14px;
    }

    .col-md-9, .col-lg-10 {
        width: 100%;
    }
}

/* Main Content Area */
.main-content {
    padding: 20px;
}

/* Centered Heading for Healthcare System */
.central-heading {
    text-align: center;
    font-size: 3rem;
    font-weight: bold;
    margin-top: 50px;
    color: #fff;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
}

/* Footer Styling */
footer {
    background-color: #f1f1f1;
    padding: 10px;
    font-size: 14px;
    color: black;
    position: fixed;
    width: 100%;
    bottom: 0;
}


</style>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 p-3 bg-nhs-blue text-white">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="images/HealthcareLogo.png" alt="Healthcare Logo" height="100">
                </div>

                <!-- Sidebar Navigation -->
                <ul class="nav flex-column">
                    <!-- Home Link -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>

                    <!-- Useful Links -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="usefulLinks.html">
                            <i class="fas fa-link"></i> Useful Links
                        </a>
                    </li>

                    <!-- Services Section -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" data-bs-toggle="collapse" data-bs-target="#servicesSection" aria-expanded="false" aria-controls="servicesSection">
                            <i class="fas fa-cogs"></i> Services
                        </a>
                        <div class="collapse" id="servicesSection">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="https://form.jotform.com/232504259003042">
                                        <i class="fas fa-calendar-alt"></i> Book an Appointment
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="https://form.jotform.com/232224204562041">
                                        <i class="fas fa-exclamation-circle"></i> Report a Health Issue
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="https://form.jotform.com/243413344815352">
                                        <i class="fas fa-prescription-bottle-alt"></i> Repeat a Prescription
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Dashboard.php">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>

                    <!-- Live Chat -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php">
                            <i class="fas fa-comments"></i> Live Chat
                        </a>
                    </li>

                    <!-- Logout -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 p-5 main-content">
                <!-- Main Banner -->
                <header class="banner text-center">
                    <h2>Welcome to the Healthcare System</h2>
                    <p>Your health, our priority</p>
                </header>

                <!-- Buttons (Voice Assistant and Live Chat) -->
                <div class="button-container d-flex justify-content-center my-4">
                    <button class="btn btn-primary mx-3" id="voiceAssistantBtn">Voice Assistant</button>
                    <a href="login.php">
                        <button class="btn btn-primary mx-3" id="liveChatBtn">Live Chat</button>
                    </a>
                </div>

                <!-- Footer -->
                <footer class="text-center mt-5">
                    <p>&copy; 2024 Healthcare System. All rights reserved.</p>
                </footer>
            </div>
        </div>
    </div>

    <!-- JavaScript for Voice Recognition -->
    <script>
        document.getElementById('voiceAssistantBtn').addEventListener('click', function() {
            console.log("Voice Assistant button clicked!");
            startListening(); // Start listening for voice command
        });

        function startListening() {
            const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
            if (!recognition) {
                alert("Speech Recognition is not supported in your browser.");
                return;
            }
            recognition.lang = 'en-US'; // Set the language
            recognition.start(); // Start recognition process

            recognition.onstart = function() {
                console.log("Voice recognition started.");
            };

            recognition.onresult = function(event) {
                const transcript = event.results[0][0].transcript;
                console.log('You said:', transcript);

                fetch('http://localhost:5001/voice_assistant_process', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ command: transcript })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Backend processed the command:', data);
                    alert('Voice Command Processed: ' + data.status);
                })
                .catch(error => console.error('Error during voice command processing:', error));
            };

            recognition.onerror = function(event) {
                console.error('Speech recognition error:', event.error);
                alert('Error in voice recognition. Please try again.');
            };
        }
    </script>
</body>
</html>
