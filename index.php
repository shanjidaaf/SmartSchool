<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'nav.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart School</title>
  
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kumar+One+Outline&family=Notable&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Hero Section -->
  <section class="hero">
    <div class="sliding-text">
      <marquee class="notable-regular">🎓 Welcome to Smart School – A Modern, Digital School Management Platform! 🎓</marquee>
    </div>
    &nbsp;
    <h1>Learn Without Limits</h1>
    <p>Start, switch, or advance your education with more than 500 courses & Certificates from the best Teachers of Bangladesh!</p>
    <button class="btn btn-primary" onclick="document.getElementById('popular-courses').scrollIntoView({ behavior: 'smooth' });">
      Browse Courses
    </button>    
  </section>

  <!-- Courses Section -->
  <section class="courses" id="popular-courses">
    <div class="section-title">
      <h2>Popular Courses</h2>
      <p>Choose from 1000+ online video courses with new additions published every month</p>
    </div>
    <div class="course-grid">
      
      <!-- Course Card 1 -->
<div class="course-card" data-bs-toggle="modal" data-bs-target="#ethicsModal" style="cursor: pointer;">
  <div class="course-img">
    <img src="./source/EthicsReligion.png" alt="Ethics & Religion">
  </div>
  <div class="course-content">
    <h3>Ethics & Religion Learning</h3>
    <p>Not Only a Good Student, Be a Good Human Being</p>
    <div class="course-meta">
      <span><i class="fas fa-user"></i> Labiba Alam</span>
      <span><i class="fas fa-star"></i> 4.8 (120)</span>
    </div>
  </div>
</div>
      
      <!-- Course Card 2 -->
<a href="class6.html" style="text-decoration: none; color: inherit;">
  <div class="course-card">
    <div class="course-img">
      <img src="./source/HighSchool.png" alt="High School Education">
    </div>
    <div class="course-content">
      <h3>High School Education</h3>
      <p>Master in All Subjects in Just 1 Click!</p>
      <div class="course-meta">
        <span><i class="fas fa-user"></i> Shanjida Afrin</span>
        <span><i class="fas fa-star"></i> 4.9 (95)</span>
      </div>
    </div>
  </div>
</a>

      <!-- Course Card 3 -->
<div class="course-card" onclick="openModal('digitalModal')" style="cursor: pointer;">
  <div class="course-img">
    <img src="./source/Screenshot 2025-04-24 031458.png" alt="Top Digital Skills">
  </div>
  <div class="course-content">
    <h3>Top Digital Skills Courses</h3>
    <p>Focus On Your Goal! Start Exploring Today!</p>
    <div class="course-meta">
      <span><i class="fas fa-user"></i> Ishfar Haque</span>
      <span><i class="fas fa-star"></i> 4.7 (85)</span>
    </div>
  </div>
</div>
  </section>

  <!-- Features Section -->
  <section class="features">
    <div class="section-title">
      <h2>Why Choose Us</h2>
      <p>We provide the best learning experience with our innovative approach</p>
    </div>
    <div class="feature-grid">
      <!-- Feature 1 -->
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-laptop-code"></i>
        </div>
        <h3>Expert Teachers</h3>
        <p>Learn from industry experts who are passionate about teaching</p>
      </div>

      <!-- Feature 2 -->
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-certificate"></i>
        </div>
        <h3>Certification</h3>
        <p>Get certified upon completion of your courses</p>
      </div>

      <!-- Feature 3 -->
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-clock"></i>
        </div>
        <h3>Lifetime Access</h3>
        <p>Get lifetime access to all the courses you purchase</p>
      </div>

      <!-- Feature 4 -->
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-headset"></i>
        </div>
        <h3>24/7 Support</h3>
        <p>Our support team is available round the clock</p>
      </div>
    </div>
  </section>
  <!-- Ethics Modal -->
<div id="ethicsModal" class="modal" style="display:none;">
  <div class="modal-content">
    <span class="close" onclick="closeModal('ethicsModal')">&times;</span>
    <h2>Ethics & Religion Learning</h2>
    <p>This course includes Islamic Studies, Moral Education, and character building topics for students.</p>
  </div>
</div>

<!-- Digital Skills Modal -->
<div id="digitalModal" class="modal" style="display:none;">
  <div class="modal-content">
    <span class="close" onclick="closeModal('digitalModal')">&times;</span>
    <h2>Top Digital Skills Courses</h2>
    <p>Learn graphic design, coding, Microsoft Office, and other essential digital skills through fun videos!</p>
  </div>
</div>
<script>
  function openModal(id) {
    document.getElementById(id).style.display = "flex";
  }

  function closeModal(id) {
    document.getElementById(id).style.display = "none";
  }

  // Optional: Close modal when clicking outside content
  window.onclick = function(event) {
    const ethics = document.getElementById('ethicsModal');
    const digital = document.getElementById('digitalModal');
    if (event.target === ethics) ethics.style.display = "none";
    if (event.target === digital) digital.style.display = "none";
  };
</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>

