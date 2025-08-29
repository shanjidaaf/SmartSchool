<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'nav2.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Science Lecture Videos - Smart School</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <style>
    body {
      margin: 0;
      padding: 0;
      padding-top: 70px;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom, #b6eae2, #78b0d2);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    :root {
      --primary-color: #3e64ff;
      --secondary-color: #5edfff;
      --dark-color: #1a1a1a;
      --light-color: #f8f9fa;
      --success-color: #28a745;
    }

    .section-title {
      text-align: center;
      margin: 30px auto;
      font-size: 28px;
      font-weight: bold;
      color: #3e64ff;
      padding: 12px 24px;
      border: 2px solid #3e64ff;
      border-radius: 12px;
      width: fit-content;
      background-color: #ffffffbb;
    }

    .video-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      padding: 0 20px 50px;
      animation: fadeIn 1.5s ease-in;
      flex: 1;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .video-card {
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 15px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .video-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    .video-card h5 {
      font-size: 18px;
      margin-bottom: 10px;
      color: #333;
    }

    iframe {
      width: 100%;
      height: 180px;
      border-radius: 10px;
      border: none;
    }

    .video-duration {
      display: block;
      margin-top: 8px;
      color: #666;
      font-size: 14px;
    }

    .video-views {
      display: block;
      margin-top: 5px;
      color: #666;
      font-size: 14px;
    }

    .video-teacher {
      display: block;
      margin-top: 8px;
      color: var(--primary-color);
      font-weight: 500;
    }

    .video-card-footer {
      margin-top: 15px;
      padding-top: 10px;
      border-top: 1px solid #eee;
      display: flex;
      justify-content: space-between;
    }

    .video-card-footer a {
      color: var(--primary-color);
      text-decoration: none;
      font-size: 14px;
    }

    .video-card-footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- Page Title -->
  <h2 class="section-title">Lecture Videos - বিজ্ঞান</h2>

  <!-- Videos -->
  <div class="video-grid container">
    <div class="video-card">
      <h5>অধ্যায় ১: বৈজ্ঞানিক প্রক্রিয়া ও পরিমাপ</h5>
      <iframe src="https://www.youtube.com/embed/1J6q43YbqAM?si=XbsfUNI5LCLyBD6G" allowfullscreen></iframe>
      <span class="video-duration"><i class="far fa-clock"></i> 15:32</span>
      <span class="video-views"><i class="far fa-eye"></i> 12,345 views</span>
      <span class="video-teacher">By: Dr. রহিমা ইসলাম</span>
      <div class="video-card-footer">
        <a href="#"><i class="far fa-thumbs-up"></i> Like</a>
        <a href="#"><i class="far fa-bookmark"></i> Save</a>
      </div>
    </div>
    
    <div class="video-card">
      <h5>অধ্যায় ২: জীবজগৎ</h5>
      <iframe src="https://www.youtube.com/embed/2LOthuJtvqg?si=s_glNRDNk1a4FoEQ" allowfullscreen></iframe>
      <span class="video-duration"><i class="far fa-clock"></i> 18:45</span>
      <span class="video-views"><i class="far fa-eye"></i> 9,876 views</span>
      <span class="video-teacher">By: প্রফেসর করিম</span>
      <div class="video-card-footer">
        <a href="#"><i class="far fa-thumbs-up"></i> Like</a>
        <a href="#"><i class="far fa-bookmark"></i> Save</a>
      </div>
    </div>
    
    <div class="video-card">
      <h5>অধ্যায় ৩: উদ্ভিদ ও প্রাণীর কোষীয় সংগঠন</h5>
      <iframe src="https://www.youtube.com/embed/u3KTKUn_KrE?si=mGUU4IWpN8i44tq_" allowfullscreen></iframe>
      <span class="video-duration"><i class="far fa-clock"></i> 22:10</span>
      <span class="video-views"><i class="far fa-eye"></i> 15,678 views</span>
      <span class="video-teacher">By: ড. ফারহানা আহমেদ</span>
      <div class="video-card-footer">
        <a href="#"><i class="far fa-thumbs-up"></i> Like</a>
        <a href="#"><i class="far fa-bookmark"></i> Save</a>
      </div>
    </div>
    
    <div class="video-card">
      <h5>অধ্যায় ৪: উদ্ভিদের বাহ্যিক বৈশিষ্ট্য</h5>
      <iframe src="https://www.youtube.com/embed/gR7RcS6SOFc?si=dVnUkjOMCyHXYG3U" allowfullscreen></iframe>
      <span class="video-duration"><i class="far fa-clock"></i> 14:25</span>
      <span class="video-views"><i class="far fa-eye"></i> 8,932 views</span>
      <span class="video-teacher">By: প্রফেসর রহমান</span>
      <div class="video-card-footer">
        <a href="#"><i class="far fa-thumbs-up"></i> Like</a>
        <a href="#"><i class="far fa-bookmark"></i> Save</a>
      </div>
    </div>
    
    <div class="video-card">
      <h5>অধ্যায় ৫: সালোকসংশ্লেষণ</h5>
      <iframe src="https://www.youtube.com/embed/SQKlBbWDhZg?si=wQVOTGwjs-5r2UOo" allowfullscreen></iframe>
      <span class="video-duration"><i class="far fa-clock"></i> 19:50</span>
      <span class="video-views"><i class="far fa-eye"></i> 11,234 views</span>
      <span class="video-teacher">By: ড. সুমাইয়া খান</span>
      <div class="video-card-footer">
        <a href="#"><i class="far fa-thumbs-up"></i> Like</a>
        <a href="#"><i class="far fa-bookmark"></i> Save</a>
      </div>
    </div>
    
    <div class="video-card">
      <h5>অধ্যায় ৬: সংবেদী অঙ্গ</h5>
      <iframe src="https://www.youtube.com/embed/OzR624Z105k?si=LMORQVjPbmEbbGAW" allowfullscreen></iframe>
      <span class="video-duration"><i class="far fa-clock"></i> 16:40</span>
      <span class="video-views"><i class="far fa-eye"></i> 10,567 views</span>
      <span class="video-teacher">By: প্রফেসর জাহাঙ্গীর</span>
      <div class="video-card-footer">
        <a href="#"><i class="far fa-thumbs-up"></i> Like</a>
        <a href="#"><i class="far fa-bookmark"></i> Save</a>
      </div>
    </div>
    
    <div class="video-card">
      <h5>অধ্যায় ৭: পদার্থের বৈশিষ্ট্য এবং বাহ্যিক প্রভাব</h5>
      <iframe src="https://www.youtube.com/embed/Zy2xOegjtJ4?si=hJpvmp41lCheWq3t" allowfullscreen></iframe>
      <span class="video-duration"><i class="far fa-clock"></i> 21:15</span>
      <span class="video-views"><i class="far fa-eye"></i> 13,789 views</span>
      <span class="video-teacher">By: ড. নাসরিন আক্তার</span>
      <div class="video-card-footer">
        <a href="#"><i class="far fa-thumbs-up"></i> Like</a>
        <a href="#"><i class="far fa-bookmark"></i> Save</a>
      </div>
    </div>
    
    <div class="video-card">
      <h5>অধ্যায় ৮: মিশ্রণ</h5>
      <iframe src="https://www.youtube.com/embed/7kRYILwWw6Q?si=_CRB7Oui_rIYin5t" allowfullscreen></iframe>
      <span class="video-duration"><i class="far fa-clock"></i> 17:30</span>
      <span class="video-views"><i class="far fa-eye"></i> 9,123 views</span>
      <span class="video-teacher">By: প্রফেসর মাহমুদ</span>
      <div class="video-card-footer">
        <a href="#"><i class="far fa-thumbs-up"></i> Like</a>
        <a href="#"><i class="far fa-bookmark"></i> Save</a>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <?php include 'footer.php'; ?>
</body>
</html>