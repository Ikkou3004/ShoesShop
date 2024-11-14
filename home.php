<?php
session_start();

// Kiểm tra nếu chưa đăng nhập thì quay về trang đăng nhập
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Shoe Store</title>
</head>
<body>
    <h1>Chào mừng bạn đến với Shoe Store</h1>
    <p>Xin chào, <?php echo $_SESSION['email']; ?>! Bạn đã đăng nhập thành công.</p>
    <a href="logout.php">Đăng xuất</a>
</body>
</html>
