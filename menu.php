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
    <form action="logout.php" id="addForm" method="post">
        <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
        <h3>Menu</h3>
        <ul>
            <li><a href="index.php">CRUD</a></li>
            <li><a href="playground/index.php">Dialog</a></li>
        </ul>
        <br>
        <br>
        <input class="form-button" type="submit" value="Logout">
    </form>
</body>
</html>
