<?php
session_start();
include 'nav2.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart School - Interactive Learning Platform</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3f37c9;
      --accent-color: #4cc9f0;
      --light-color: #f8f9fa;
      --dark-color: #212529;
      --success-color: #4ad66d;
      --warning-color: #f8961e;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7ff;
      color: var(--dark-color);
      line-height: 1.6;
    }
    
    /* Hero Section */
    .hero-section {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      padding: 80px 0 100px;
      position: relative;
      overflow: hidden;
      margin-top: 70px;
    }
    
    .hero-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
      opacity: 0.15;
    }
    
    .hero-content {
      position: relative;
      z-index: 2;
    }
    
    .hero-title {
      font-weight: 700;
      font-size: 2.8rem;
      margin-bottom: 20px;
    }
    
    .hero-subtitle {
      font-weight: 400;
      font-size: 1.2rem;
      margin-bottom: 30px;
      max-width: 600px;
    }
    
    .search-box {
      background: white;
      border-radius: 50px;
      padding: 8px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      max-width: 600px;
      margin: 0 auto;
    }
    
    .search-input {
      border: none;
      padding: 12px 20px;
      width: 80%;
      outline: none;
      font-size: 1rem;
    }
    
    .search-btn {
      background: var(--accent-color);
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 50px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .search-btn:hover {
      background: #3ab7d8;
      transform: translateY(-2px);
    }
    
    /* Subjects Section */
    .subjects-section {
      padding: 80px 0;
      background-color: white;
    }
    
    .section-title {
      font-weight: 700;
      color: var(--dark-color);
      margin-bottom: 50px;
      position: relative;
      display: inline-block;
    }
    
    .section-title::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 0;
      width: 50px;
      height: 4px;
      background: var(--accent-color);
      border-radius: 2px;
    }
    
    .subject-card {
      background: white;
      border-radius: 12px;
      padding: 25px;
      margin-bottom: 30px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      border: 1px solid rgba(0, 0, 0, 0.05);
      height: 100%;
    }
    
    .subject-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    .subject-icon {
      font-size: 2.5rem;
      margin-bottom: 20px;
      color: var(--primary-color);
    }
    
    .subject-title {
      font-weight: 600;
      margin-bottom: 15px;
      color: var(--dark-color);
    }
    
    .subject-description {
      color: #6c757d;
      font-size: 0.9rem;
      margin-bottom: 20px;
    }
    
    .resource-badge {
      display: inline-block;
      background: rgba(67, 97, 238, 0.1);
      color: var(--primary-color);
      padding: 5px 12px;
      border-radius: 50px;
      font-size: 0.8rem;
      font-weight: 500;
      margin-right: 8px;
      margin-bottom: 8px;
    }
    
    /* Features Section */
    .features-section {
      padding: 80px 0;
      background-color: #f5f7ff;
    }
    
    .feature-card {
      background: white;
      border-radius: 12px;
      padding: 30px;
      margin-bottom: 30px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      text-align: center;
    }
    
    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .feature-icon {
      font-size: 2.5rem;
      color: var(--primary-color);
      margin-bottom: 20px;
    }
    
    /* Accordion Styles */
    .accordion-button {
      font-weight: 500;
      padding: 15px 20px;
      background-color: white;
      border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .accordion-button:not(.collapsed) {
      background-color: rgba(67, 97, 238, 0.05);
      color: var(--primary-color);
      box-shadow: none;
    }
    
    .accordion-button:focus {
      box-shadow: none;
      border-color: rgba(67, 97, 238, 0.25);
    }
    
    .accordion-item {
      margin-bottom: 15px;
      border: 1px solid rgba(0, 0, 0, 0.05);
      border-radius: 10px !important;
      overflow: hidden;
    }
    
    .resource-link {
      display: block;
      padding: 10px 15px;
      color: var(--dark-color);
      text-decoration: none;
      transition: all 0.2s ease;
      border-radius: 5px;
    }
    
    .resource-link:hover {
      background-color: rgba(67, 97, 238, 0.05);
      color: var(--primary-color);
      padding-left: 20px;
    }
    
    .resource-link i {
      margin-right: 10px;
      color: var(--primary-color);
      width: 20px;
      text-align: center;
    }
    
    /* Class Resources Section */
    .class-resources {
      padding: 80px 0;
      background-color: white;
    }
    
    .resource-sidebar {
      background: white;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
      height: 100%;
      position: sticky;
      top: 100px;
    }
    
    .sidebar-title {
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid rgba(67, 97, 238, 0.1);
    }
    
    .class-list {
      list-style: none;
      padding: 0;
    }
    
    .class-list li {
      margin-bottom: 10px;
    }
    
    .class-list a {
      display: block;
      padding: 10px 15px;
      color: var(--dark-color);
      text-decoration: none;
      border-radius: 5px;
      transition: all 0.3s ease;
    }
    
    .class-list a:hover, .class-list a.active {
      background-color: rgba(67, 97, 238, 0.1);
      color: var(--primary-color);
    }
    
    .class-list a i {
      margin-right: 10px;
      width: 20px;
      text-align: center;
    }
    
   /* Footer */
footer {
  background: linear-gradient(rgb(9, 39, 136), rgba(3, 15, 147, 0.902));
    color: white;
    padding: 60px 5% 30px;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.footer-col h3 {
    font-size: 20px;
    margin-bottom: 20px;
}

.footer-col p, .footer-col a {
  color: #edebeb;
    margin-bottom: 10px;
    display: block;
    text-decoration: none;
}

.footer-col a:hover {
    color: white;
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-links a {
    color: white;
    font-size: 18px;
}

.social-links a:hover{
    transform: translateY(-10px);

}

.copyright {
    text-align: center;
    padding-top: 30px;
    border-top: 1px solid #444;
    color: #bbb;
}
    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .hero-title {
        font-size: 2rem;
      }
      
      .hero-subtitle {
        font-size: 1rem;
      }
      
      .navbar-brand {
        font-size: 1.5rem;
      }
      
      .resource-sidebar {
        margin-bottom: 40px;
        position: static;
      }
    }
  </style>
</head>
<body>
  
 <br>

  <!-- Class Resources Section -->
  <section class="class-resources">
    <div class="container">
      <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3">
          <div class="resource-sidebar">
            <h3 class="sidebar-title"><i class="fas fa-layer-group me-2"></i> All Classes</h3>
            <ul class="class-list">
              <li><a href="#" class="active"><i class="fas fa-graduation-cap"></i> Class 6</a></li>
              <li><a href="#"><i class="fas fa-graduation-cap"></i> Class 7</a></li>
              <li><a href="#"><i class="fas fa-graduation-cap"></i> Class 8</a></li>
              <li><a href="#"><i class="fas fa-graduation-cap"></i> Class 9</a></li>
              <li><a href="#"><i class="fas fa-graduation-cap"></i> Class 10</a></li>
            </ul>
          </div>
        </div>
        
        <!-- Main Content -->
        <div class="col-lg-9">
          <h2 class="section-title">Class 6 Resources</h2>
          
          <div class="accordion" id="resourcesAccordion">
            <!-- Bangla 1st Paper -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingBangla1">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBangla1">
                  <i class="fas fa-book me-2"></i> 
                  <span title="বাংলা ১ম পত্র">Bangla 1st Paper</span>
                </button>
              </h2>
              <div id="collapseBangla1" class="accordion-collapse collapse" aria-labelledby="headingBangla1" data-bs-parent="#resourcesAccordion">
                <div class="accordion-body">
               <a href="pdf6.php" class="resource-link"><i class="fas fa-file-pdf"></i> Textbook PDF</a>
      <a href="lecvid.php" class="resource-link"><i class="fas fa-video"></i> Lecture Videos</a>
      <a href="sciNotes.php" class="resource-link"><i class="fas fa-edit"></i> Notes</a>
      <a href="quiz.php" class="resource-link"><i class="fas fa-question-circle"></i> Quiz</a>
                </div>
              </div>
            </div>
            
            <!-- Bangla 2nd Paper -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingBangla2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBangla2">
                  <i class="fas fa-book me-2"></i> 
                 <span title="বাংলা ২য় পত্র">Bangla 2nd Paper</span><br>
                </button>
              </h2>
              <div id="collapseBangla2" class="accordion-collapse collapse" aria-labelledby="headingBangla2" data-bs-parent="#resourcesAccordion">
                <div class="accordion-body">
                 <a href="pdf6.php" class="resource-link"><i class="fas fa-file-pdf"></i> Textbook PDF</a>
      <a href="lecvid.php" class="resource-link"><i class="fas fa-video"></i> Lecture Videos</a>
      <a href="sciNotes.php" class="resource-link"><i class="fas fa-edit"></i> Notes</a>
      <a href="quiz.php" class="resource-link"><i class="fas fa-question-circle"></i> Quiz</a>
                </div>
              </div>
            </div>
            
            <!-- English 1st Paper -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingEnglish1">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEnglish1">
                  <i class="fas fa-language me-2"></i>
                   <span title="ইংরেজি ১ম পত্র">English 1st Paper</span><br>
                </button>
              </h2>
              <div id="collapseEnglish1" class="accordion-collapse collapse" aria-labelledby="headingEnglish1" data-bs-parent="#resourcesAccordion">
                <div class="accordion-body">
                <a href="pdf6.php" class="resource-link"><i class="fas fa-file-pdf"></i> Textbook PDF</a>
      <a href="lecvid.php" class="resource-link"><i class="fas fa-video"></i> Lecture Videos</a>
      <a href="sciNotes.php" class="resource-link"><i class="fas fa-edit"></i> Notes</a>
      <a href="quiz.php" class="resource-link"><i class="fas fa-question-circle"></i> Quiz</a>
                </div>
              </div>
            </div>
            
            <!-- English 2nd Paper -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingEnglish2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEnglish2">
                  <i class="fas fa-language me-2"></i>
                  <span title="ইংরেজি ২য় পত্র">English 2nd Paper</span><br>
                </button>
              </h2>
              <div id="collapseEnglish2" class="accordion-collapse collapse" aria-labelledby="headingEnglish2" data-bs-parent="#resourcesAccordion">
                <div class="accordion-body">
                  <a href="pdf6.php" class="resource-link"><i class="fas fa-file-pdf"></i> Textbook PDF</a>
      <a href="lecvid.php" class="resource-link"><i class="fas fa-video"></i> Lecture Videos</a>
      <a href="sciNotes.php" class="resource-link"><i class="fas fa-edit"></i> Notes</a>
      <a href="quiz.php" class="resource-link"><i class="fas fa-question-circle"></i> Quiz</a>
                </div>
              </div>
            </div>
            
            <!-- Mathematics -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMath">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMath">
                  <i class="fas fa-square-root-alt me-2"></i> 
                  <span title="গণিত">Mathematics</span><br>
                </button>
              </h2>
              <div id="collapseMath" class="accordion-collapse collapse" aria-labelledby="headingMath" data-bs-parent="#resourcesAccordion">
                <div class="accordion-body">
                  <a href="pdf6.php" class="resource-link"><i class="fas fa-file-pdf"></i> Textbook PDF</a>
      <a href="lecvid.php" class="resource-link"><i class="fas fa-video"></i> Lecture Videos</a>
      <a href="sciNotes.php" class="resource-link"><i class="fas fa-edit"></i> Notes</a>
      <a href="quiz.php" class="resource-link"><i class="fas fa-question-circle"></i> Quiz</a>
                </div>
              </div>
            </div>
            
            <!-- Science -->
<div class="accordion-item">
  <h2 class="accordion-header" id="headingScience">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseScience">
      <i class="fas fa-flask me-2"></i> 
      <span title="বিজ্ঞান">Science</span><br>
    </button>
  </h2>
  <div id="collapseScience" class="accordion-collapse collapse" aria-labelledby="headingScience" data-bs-parent="#resourcesAccordion">
    <div class="accordion-body">
     <a href="pdf6.php" class="resource-link"><i class="fas fa-file-pdf"></i> Textbook PDF</a>
      <a href="lecvid.php" class="resource-link"><i class="fas fa-video"></i> Lecture Videos</a>
      <a href="sciNotes.php" class="resource-link"><i class="fas fa-edit"></i> Notes</a>
      <a href="quiz.php" class="resource-link"><i class="fas fa-question-circle"></i> Quiz</a>
    </div>
  </div>
</div>
            
            <!-- View All Button -->
            <div class="text-center mt-4">
              <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#moreSubjects">
                View All Subjects <i class="fas fa-chevron-down ms-2"></i>
              </button>
            </div>
            <br>
            
            <!-- More Subjects (Collapsed by default) -->
            <div class="collapse" id="moreSubjects" data-bs-parent="#resourcesAccordion">
              <!-- ICT -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingICT">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseICT">
                    <i class="fas fa-laptop-code me-2"></i> 
                   <span title="তথ্য ও যোগাযোগ প্রযুক্তি">Information & Communication Technology</span><br>
                  </button>
                </h2>
                <div id="collapseICT" class="accordion-collapse collapse" aria-labelledby="headingICT">
                  <div class="accordion-body">
                    <a href="pdf6.php" class="resource-link"><i class="fas fa-file-pdf"></i> Textbook PDF</a>
      <a href="lecvid.php" class="resource-link"><i class="fas fa-video"></i> Lecture Videos</a>
      <a href="sciNotes.php" class="resource-link"><i class="fas fa-edit"></i> Notes</a>
      <a href="quiz.php" class="resource-link"><i class="fas fa-question-circle"></i> Quiz</a>
                  </div>
                </div>
              </div>
              
              <!-- Bangladesh & Global Studies -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingBGS">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBGS">
                    <i class="fas fa-globe-asia me-2"></i> 
                    <span title="বাংলাদেশ ও বিশ্বপরিচয়">Bangladesh & Global Studies</span>
                  </button>
                </h2>
                <div id="collapseBGS" class="accordion-collapse collapse" aria-labelledby="headingBGS">
                  <div class="accordion-body">
                    <a href="pdf6.php" class="resource-link"><i class="fas fa-file-pdf"></i> Textbook PDF</a>
      <a href="lecvid.php" class="resource-link"><i class="fas fa-video"></i> Lecture Videos</a>
      <a href="sciNotes.php" class="resource-link"><i class="fas fa-edit"></i> Notes</a>
      <a href="quiz.php" class="resource-link"><i class="fas fa-question-circle"></i> Quiz</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   <!-- Features Section -->
  <section class="features-section">
    <div class="container">
      <h2 class="text-center section-title">Why Choose Smart School?</h2>
      
      <div class="row">
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <h3>Expert Teachers</h3>
            <p>Learn from experienced educators who make complex concepts easy to understand.</p>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-video"></i>
            </div>
            <h3>Interactive Videos</h3>
            <p>Engaging video lessons that you can pause, rewind, and watch at your own pace.</p>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-tasks"></i>
            </div>
            <h3>Practice Materials</h3>
            <p>Access to worksheets, quizzes, and past papers to test your understanding.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
    
    // Add shadow to navbar on scroll
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.style.boxShadow = '0 2px 15px rgba(0, 0, 0, 0.1)';
      } else {
        navbar.style.boxShadow = 'none';
      }
    });
  </script>
  <?php include 'footer.php'; ?>
</body>
</html>