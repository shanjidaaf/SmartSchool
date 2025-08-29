<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get user initials if logged in
$initials = '';
if (isset($_SESSION['user_id'])) {
    $conn = new mysqli("localhost", "root", "", "hey");
    if (!$conn->connect_error) {
        $stmt = $conn->prepare("SELECT first_name, last_name FROM users WHERE id = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($user = $result->fetch_assoc()) {
            $initials = strtoupper(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1));
        }
        $stmt->close();
        $conn->close();
    }
}
?>

<link rel="stylesheet" href="style.css">

<header>
  <nav class="navbar fixed-top custom-navbar d-flex justify-content-between align-items-center" style="padding: 20px 5%; background-color: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

    <div class="logo">Smart School</div>

    <!-- Corrected version of nav-links section -->
<ul class="nav-links d-flex list-unstyled mb-0">
  <li><a href="index.php">Home</a></li>
  <li class="dropdown">
  <a href="#">Classes <i class="fas fa-caret-down"></i></a>
  <ul class="dropdown-menu">
    <li><a href="class6.php">Class 6</a></li>
    <li><a href="class7.php">Class 7</a></li>
    <li><a href="class8.php">Class 8</a></li>
    <li><a href="class9.php">Class 9</a></li>
    <li><a href="class10.php">Class 10</a></li>
  </ul>
  </li>
  <li><a href="feedback.php">Feedback</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="contact.php">Contact</a></li>
</ul>


    <div class="auth-buttons">
      <?php if (isset($_SESSION['user_id'])): ?>
        <div class="dropdown profile-dropdown">
         <a class="nav-link profile-icon d-flex align-items-center" href="#" id="userDropdown" role="button"
   data-bs-toggle="dropdown" aria-expanded="false">
  <div style="
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: #3e64ff;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 14px;
  ">
    <?= htmlspecialchars($initials) ?>
  </div>
</a>

          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="account.php"><i class="fas fa-user me-2 text-dark"></i><span class="text-dark">Profile</span></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2 text-dark"></i><span class="text-dark">Logout</span></a></li>
          </ul>
        </div>
      <?php else: ?>
        <a href="login.php" class="btn btn-primary me-2">Login</a>
        <a href="reg.php" class="btn btn-primary">Sign Up</a>
      <?php endif; ?>
    </div>

  </nav>
</header>