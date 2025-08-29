<?php
session_start();
include 'nav.php';

// Database connection
$host = 'localhost';
$db = 'hey';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $msg = trim($_POST['message'] ?? '');

    if ($name && $email && $subject && $msg) {
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $msg);
        if ($stmt->execute()) {
            $message = "<div class='alert alert-success'>Message sent successfully!</div>";
        } else {
            $message = "<div class='alert alert-danger'>Something went wrong. Please try again.</div>";
        }
        $stmt->close();
    } else {
        $message = "<div class='alert alert-warning'>Please fill in all fields.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>
  <link rel="stylesheet" href="contact.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="contact-container">
  <h2>Contact Us</h2>
  <?= $message ?>
  <form action="contact.php" method="POST">
  <div class="mb-3">
  <label for="name" class="form-label">Full Name</label>
  <input type="text" name="name" class="form-control" id="name" required
         pattern=".*\S.*"
         title="Full name cannot be empty or just spaces." />
</div>
<div class="mb-3">
  <label for="email" class="form-label">Email address</label>
  <input type="email" name="email" class="form-control" id="email" required
         pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
         title="Enter a valid email like ab@gmail.com" />
</div>
    <div class="mb-3">
      <label for="subject" class="form-label">Subject</label>
      <input type="text" name="subject" class="form-control" id="subject" required />
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Message</label>
      <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send Message</button>
  </form>
</div>

  <?php include 'footer.php'; ?>
  <script>
  const emailInput = document.getElementById('email');

  const warning = document.createElement('div');
  warning.style.color = 'red';
  warning.style.fontSize = '14px';
  warning.style.marginTop = '5px';
  warning.textContent = 'Enter a valid email like ab@gmail.com';
  warning.style.display = 'none';

  emailInput.parentNode.appendChild(warning);

  emailInput.addEventListener('input', function () {
    const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
    if (!emailPattern.test(emailInput.value)) {
      warning.style.display = 'block';
    } else {
      warning.style.display = 'none';
    }
  });
</script>

</body>
</html>
