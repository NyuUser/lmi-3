<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="sidebar">
        <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
        <a href="index.php">Home</a>
        <a href="playground/index.php">Existing Users</a>
    </div>
    <div class="content">
    <form action="logout.php" id="addForm" method="post">
        <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
        <h3>Menu</h3>
        <br>
        <br>
        <input class="form-button" type="submit" value="Logout">
    </form>
    </div>
</body>
</html>
