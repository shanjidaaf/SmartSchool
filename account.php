<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "hey";

try {
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT first_name, last_name, email, mobile, address FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows !== 1) {
        throw new Exception("User not found.");
    }

    $user = $result->fetch_assoc();
    $conn->close();
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>My Profile - Smart School</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    .profile-card {
      max-width: 600px;
      margin: 0 auto;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      overflow: hidden;
    }
    .profile-header {
      background: linear-gradient(135deg, #3e64ff, #5edfff);
      color: white;
      padding: 30px;
      text-align: center;
    }
    .profile-avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background-color: white;
      color: #3e64ff;
      font-size: 36px;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 15px;
    }
    .profile-body {
      padding: 30px;
      background-color: white;
    }
    .profile-detail {
      margin-bottom: 15px;
      padding-bottom: 15px;
      border-bottom: 1px solid #eee;
    }
    .profile-detail:last-child {
      border-bottom: none;
      margin-bottom: 0;
      padding-bottom: 0;
    }
  </style>
</head>
<body>

<?php include 'nav3.php'; ?>

<div class="container" style="padding-top: 80px;">
  <div class="profile-card">
    <div class="profile-header">
      <div class="profile-avatar">
        <?php 
          $initials = strtoupper(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1));
          echo $initials;
        ?>
      </div>
      <h3><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h3>
    </div>
    
    <div class="profile-body">
      <div class="profile-detail">
        <h5><i class="fas fa-user me-2 text-primary"></i> Full Name</h5>
        <p><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></p>
      </div>

      <div class="profile-detail">
        <h5><i class="fas fa-envelope me-2 text-primary"></i> Email</h5>
        <p><?php echo htmlspecialchars($user['email']); ?></p>
      </div>

      <div class="profile-detail">
        <h5><i class="fas fa-phone me-2 text-primary"></i> Phone</h5>
        <p><?php echo htmlspecialchars($user['mobile']); ?></p>
      </div>

      <div class="profile-detail">
        <h5><i class="fas fa-map-marker-alt me-2 text-primary"></i> Address</h5>
        <p><?php echo htmlspecialchars($user['address']); ?></p>
      </div>

      <a href="logout.php" class="btn btn-primary mt-3">
        <i class="fas fa-sign-out-alt me-2"></i>Logout
      </a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
