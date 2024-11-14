<?php
session_start();

// Thông tin kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root"; // tên đăng nhập MySQL của bạn
$password = ""; // mật khẩu MySQL của bạn
$dbname = "bangiay"; // tên cơ sở dữ liệu của bạn

// Kết nối với cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý khi người dùng nhấn nút đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Truy vấn kiểm tra thông tin người dùng
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lưu thông tin đăng nhập vào session
        $_SESSION['email'] = $email;
        header("Location: home.php"); // Chuyển hướng đến trang chủ
        exit();
    } else {
        echo "<p style='color:red;'>Sai email hoặc mật khẩu!</p>";
    }
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Shoe Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">Family Shoe Store</div>
        <nav>
            <a href="#">Trang chủ</a>
            <a href="#">Sản phẩm</a>
            <a href="#">Liên hệ</a>
        </nav>
        <div class="header-icons">
            <input type="text" placeholder="Tìm kiếm...">
            <button><i class="fa fa-search"></i></button>
            <i class="fa fa-user"></i>
            <i class="fa fa-heart"></i>
            <i class="fa fa-shopping-cart"></i>
        </div>
    </header>

    <!-- Login Form -->
    <div class="login-container">
        <form action="login.php" method="POST" class="login-form">
            <h2>Đăng Nhập</h2>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng nhập</button>
            <p>Bạn chưa có tài khoản?</p>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <img src="map.png" alt="Map" class="map-image">
            <div class="contact-info">
                <p>Địa chỉ: 170 An Dương Vương/ Nguyễn Văn Cừ/Quy Nhơn/Bình Định</p>
                <p>Email: Familyshop@gmail.com.vn</p>
                <p>FaceBook: ShopFamily</p>
            </div>
        </div>
    </footer>
</body>
</html>
