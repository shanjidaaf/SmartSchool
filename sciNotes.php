<?php
session_start();
include 'nav2.php';
?>

<!DOCTYPE html> 
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lecture Chapters - Science</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #e0f7fa, #e8f5e9);
      padding-top: 100px;
    }

    :root {
      --primary-color: #3e64ff;
      --dark-color: #1a1a1a;
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

    .chapter-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding: 0 20px 50px;
      animation: fadeIn 1.5s ease-in;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .chapter-card {
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 25px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .chapter-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    .chapter-card h5 {
      font-size: 18px;
      margin: 0;
      color: #333;
    }

   /* Footer Styles */
    footer {
      background: linear-gradient(rgb(9, 39, 136), rgba(3, 15, 147, 0.902));
      color: white;
      padding: 60px 5% 30px;
      width: 100%;
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

    .footer-col p,
    .footer-col a {
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
      transition: transform 0.3s ease;
    }

    .social-links a:hover {
      transform: translateY(-5px);
    }

    .copyright {
      text-align: center;
      padding-top: 30px;
      border-top: 1px solid #444;
      color: #bbb;
    }
  </style>
</head>
<body>

  <!-- Main Title -->
  <div class="d-flex justify-content-center">
    <h2 class="section-title">অধ্যায় সমূহ - বিজ্ঞান</h2>
  </div>

  <!-- Chapter Grid -->
  <div class="chapter-grid container">
    <div class="chapter-card"><h5>অধ্যায় ১: বৈজ্ঞানিক প্রক্রিয়া ও পরিমাপ</h5></div>
    <div class="chapter-card"><h5>অধ্যায় ২: জীবজগৎ</h5></div>
    <div class="chapter-card"><h5>অধ্যায় ৩: উদ্ভিদ ও প্রাণীর কোষীয় সংগঠন</h5></div>
    <div class="chapter-card"><h5>অধ্যায় ৪: উদ্ভিদের বাহ্যিক বৈশিষ্ট্য</h5></div>
    <div class="chapter-card"><h5>অধ্যায় ৫: সালোকসংশ্লেষণ</h5></div>
    <div class="chapter-card"><h5>অধ্যায় ৬: সংবেদী অঙ্গ</h5></div>
    <div class="chapter-card"><h5>অধ্যায় ৭: পদার্থের বৈশিষ্ট্য এবং বাহ্যিক প্রভাব</h5></div>
    <div class="chapter-card"><h5>অধ্যায় ৮: মিশ্রণ</h5></div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <?php include 'footer.php'; ?>
</body>
</html>