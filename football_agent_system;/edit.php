<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['full_name'];
    $email = $_POST['email'];

    $conn->query("UPDATE users SET full_name='$name', email='$email' WHERE user_id=$id");
    $_SESSION['name'] = $name;

    header("Location: dashboard.php");
    exit();
}

$result = $conn->query("SELECT full_name, email FROM users WHERE user_id=$id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Profile</h2>

<form method="POST">
    <input type="text" name="full_name" value="<?php echo $user['full_name']; ?>" required><br><br>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>
    <button type="submit">Update</button>
</form>

</body>
</html>
