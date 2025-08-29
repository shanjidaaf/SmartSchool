<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hey";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$feedbackSubmitted = false;
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

    if ($rating > 0 && !empty($comment)) {
        $stmt = $conn->prepare("INSERT INTO feedback (rating, comment) VALUES (?, ?)");
        $stmt->bind_param("is", $rating, $comment);

        if ($stmt->execute()) {
            $feedbackSubmitted = true;  // Success
        } else {
            $message = "<div class='alert alert-danger'>Error: " . htmlspecialchars($stmt->error) . "</div>";
        }
        $stmt->close();
    } else {
        $message = "<div class='alert alert-warning'>Please provide a rating and comment.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Feedback - Smart School</title>
  <link rel="stylesheet" href="style.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
  
  <style>
    body {
      margin: 0;
      padding: 0;
      padding-top: 90px;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
      background-color: #bbd2e3;
    }

    :root {
      --primary-color: #3e64ff;
      --dark-color: #1a1a1a;
    }

    .custom-navbar {
      background-color: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      padding: 20px 5%;
    }

    .logo {
      font-size: 34px;
      font-weight: 700;
      color: var(--primary-color);
    }

    .nav-links {
      display: flex;
      list-style: none;
      padding-left: 0;
      margin-bottom: 0;
    }

    .nav-links li {
      margin-left: 30px;
    }

    .nav-links a {
      text-decoration: none;
      color: var(--dark-color);
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .nav-links a:hover {
      color: var(--primary-color);
    }

    /* Dropdown */
    .navbar .dropdown {
      position: relative;
    }
    .navbar .dropdown a {
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .navbar .dropdown-menu {
      display: none;
      position: absolute;
      background-color: white;
      min-width: 150px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.15);
      z-index: 1000;
      top: 100%;
      left: 0;
      padding: 0;
      list-style: none;
    }
    .navbar .dropdown-menu li a {
      display: block;
      padding: 10px 15px;
      color: #333;
      text-decoration: none;
      white-space: nowrap;
    }
    .navbar .dropdown-menu li a:hover {
      background-color: #f1f1f1;
    }
    .navbar .dropdown:hover .dropdown-menu {
      display: block;
    }

    /* Feedback styles */
    .feedback-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 80vh;
    }

    .feedback-container {
      background-color: #dbe6f1;
      padding: 30px;
      border-radius: 15px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      position: relative;
    }

    h2 {
      margin-bottom: 10px;
      font-size: 1.5rem;
      color: #2b2b2b;
    }

    .stars {
      font-size: 28px;
      margin: 10px 0;
      cursor: pointer;
    }

    .star {
      color: #ccc;
      transition: color 0.3s;
    }

    .star.selected {
      color: #ffc107;
    }

    textarea {
      width: 100%;
      height: 90px;
      margin-top: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
      padding: 10px;
      resize: none;
      font-size: 14px;
    }

    button[type="submit"] {
      margin-top: 15px;
      padding: 10px 20px;
      border: none;
      background-color: #3d5b91;
      color: white;
      font-size: 16px;
      border-radius: 20px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #2f4870;
    }

    /* Thank you message */
    .thank-you {
      font-size: 1.8rem;
      color: #3e64ff;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
    }
    .thank-you .smiley {
      font-size: 4rem;
    }
  </style>
</head>
<body>

  <?php include 'nav.php'; ?>

  <div class="feedback-wrapper">

  <?php if ($feedbackSubmitted): ?>
    <div class="thank-you">
      <div>Thank you for your feedback! 😊</div>
      <div class="smiley">🌟🌟🌟🌟🌟</div>
    </div>
  <?php else: ?>
    <form action="feedback.php" method="POST" class="feedback-container">
      <?= $message ?>
      <input type="hidden" name="rating" id="ratingInput" value="0" />

      <h2>We value your opinion.</h2>
      <p>How would you rate your overall experience?</p>
      <div class="stars" id="starsContainer">
        <span class="star">&#9734;</span>
        <span class="star">&#9734;</span>
        <span class="star">&#9734;</span>
        <span class="star">&#9734;</span>
        <span class="star">&#9734;</span>
      </div>
      <p>Kindly take a moment to tell us what you think.</p>
      <textarea name="comment" placeholder="Write your feedback here..." required></textarea>

      <button type="submit">Share my feedback</button>
    </form>
  <?php endif; ?>

  </div>

  <script>
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('ratingInput');

    stars.forEach((star, index) => {
      star.addEventListener('click', () => {
        const selectedRating = index + 1;
        ratingInput.value = selectedRating;
        stars.forEach((s, i) => {
          s.innerHTML = i < selectedRating ? '&#9733;' : '&#9734;';
          s.classList.toggle('selected', i < selectedRating);
        });
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <?php include 'footer.php'; ?>

</body>
</html>
