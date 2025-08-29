<?php
session_start();
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About – Smart School</title>

    <!-- New global style link -->
    <link rel="stylesheet" href="./style.css">

    <!-- Page‑specific stylesheet keeps its place -->
    <link rel="stylesheet" href="./about.css">

    <!-- Icons & fonts -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
</head>
<body>


    <!-- About Hero Section -->
    <section class="about-hero">
        <br>
        <!-- <div class="sliding-text">
            <marquee class="notable-regular">🌟 Discover Our Mission & Vision for Smart Education! 🌟</marquee>
        </div> -->
        <h1>About Smart School</h1>
        <p>Transforming education through technology and innovation.</p>
    </section>

    <!-- About Content Section -->
    <section class="about-content">
        <div class="about-container">
            <div class="about-text">
                <h2>Our Story</h2>
                <p>Founded in 2023, Smart School began as a small initiative to bridge the gap between traditional education and digital learning. Today, we serve thousands of students across Bangladesh with our cutting-edge platform.</p>
                
                <h2>Our Mission</h2>
                <p>To make quality education accessible, affordable, and engaging for everyone, everywhere.</p>
                
                <h2>Our Values</h2>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Student-first approach</li>
                    <li><i class="fas fa-check-circle"></i> Innovation in teaching</li>
                    <li><i class="fas fa-check-circle"></i> Affordable learning</li>
                    <li><i class="fas fa-check-circle"></i> Community building</li>
                </ul>
            </div>
            <!-- <div class="about-image">
                <img src="./source/about-image.jpg" alt="Smart School Team">
            </div> -->
        </div>
    </section>

    <!-- Team Section -->
    <section class="team">
        <div class="section-title">
            <h2>Meet Our Team</h2>
            <p>The passionate educators and technologists behind Smart School</p><hr><br>
        </div>
        <div class="team-grid">
            <!-- Team Member 1 -->
            <div class="team-card">
                <!-- <div class="team-img">
                    <img src="./source/team1.jpg" alt="Team Member">
                </div> -->
                <h3>Labiba Alam</h3>
                <p>Founder & CEO</p>
                <div class="team-social">
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="team-card">
                <!-- <div class="team-img">
                    <img src="./source/team2.jpg" alt="Team Member">
                </div> -->
                <h3>Shanjida Afrin</h3>
                <p>Head of Education</p>
                <div class="team-social">
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="team-card">
                <!-- <div class="team-img">
                    <img src="./source/team3.jpg" alt="Team Member">
                </div> -->
                <h3>Ishfar Haque</h3>
                <p>CTO</p>
                <div class="team-social">
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stats-grid">
            <div class="stat-card">
                <h3>500+</h3>
                <p>Courses</p>
            </div>
            <div class="stat-card">
                <h3>10,000+</h3>
                <p>Students</p>
            </div>
            <div class="stat-card">
                <h3>50+</h3>
                <p>Expert Teachers</p>
            </div>
            <div class="stat-card">
                <h3>95%</h3>
                <p>Satisfaction Rate</p>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>

</body>
</html>