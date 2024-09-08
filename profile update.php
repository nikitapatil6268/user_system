<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: user login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
    $stmt = $pdo->prepare('UPDATE users SET password = ? WHERE id = ?');
    $stmt->execute([$new_password, $user_id]);
    echo 'Password updated successfully.';
}

$stmt = $pdo->prepare('SELECT username FROM users WHERE id = ?');
$stmt->execute([$user_id]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h2>
    <form method="post">
        New Password: <input type="password" name="new_password" required><br>
        <input type="submit" value="Update Password">
    </form>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
