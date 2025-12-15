<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #0077cc;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="dashboard-container">
    <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
    <p><strong>Role:</strong> <?php echo $_SESSION['role']; ?></p>
    <hr>

    <?php
    if ($_SESSION['role'] === 'Admin') {
        echo "<p>You have administrative access.</p>";
        echo '<a href="add.php">Add New User</a><br><br>';

        // Fetch all users
        $result = $conn->query("SELECT users.full_name, users.email, roles.role_name
                                FROM users
                                JOIN roles ON users.role_id = roles.role_id
                                ORDER BY roles.role_name ASC");

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Full Name</th><th>Email</th><th>Role</th></tr>";
            while ($user = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$user['full_name']."</td>";
                echo "<td>".$user['email']."</td>";
                echo "<td>".$user['role_name']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No users found.</p>";
        }
    } else {
        // Non-admin users
        echo "<p>You are logged in as ".$_SESSION['role'].".</p>";
    }
    ?>

    <br>
    <a href="edit.php">Edit Profile</a> |
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
