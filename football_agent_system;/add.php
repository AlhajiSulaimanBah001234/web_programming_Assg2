<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Admin') {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role_id = $_POST['role_id'];

    $conn->query("INSERT INTO users (full_name, email, password, role_id) 
                  VALUES ('$name', '$email', '$password', $role_id)");

    $success = "User added successfully!";
}

$roles_result = $conn->query("SELECT * FROM roles");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add New User</h2>

<?php if (isset($success)) echo "<p>$success</p>"; ?>

<form method="POST">
    <input type="text" name="full_name" placeholder="Full Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <select name="role_id" required>
        <option value="">Select Role</option>
        <?php while($role = $roles_result->fetch_assoc()) { ?>
            <option value="<?php echo $role['role_id']; ?>"><?php echo $role['role_name']; ?></option>
        <?php } ?>
    </select><br><br>
    <button type="submit">Add User</button>
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
