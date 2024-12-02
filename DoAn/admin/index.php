<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Quản lý khách hàng</title>
</head>
<body>
    <div class="tieude">
        <img src="../img/logovlu.webp" alt="Logo Văn Lăng">
        <p>Thông tin khách hàng</p>
    </div>
    <?php
        include_once ("connect.php");

        $cn = new mysqli($svn, $usn, $pass, $dbname);
        if ($cn->connect_error){
            die("Kết nối thất bại: " . $cn->connect_error);
        }

        $sql = "SELECT id, hoten, sdt, email, checkin, checkout FROM thongtinkh ORDER BY id";
        $result = $cn->query($sql);
    ?>

    <!-- Form bao quanh tất cả dữ liệu và nút xóa -->
    <form action="delete.php" method="POST">
        <div class="thongtinkhachhang">
            <?php while ($row = $result->fetch_assoc()): ?>
                <input type="checkbox" name="delete_ids[]" value="<?php echo $row['id']; ?>">
                <label><?php echo "Họ tên: {$row['hoten']}<br> Số điện thoại: {$row['sdt']}<br> Email: {$row['email']}<br> Ngày nhận phòng: {$row['checkin']}<br> Ngày trả phòng: {$row['checkout']}<br><br>" ?></label>
            <?php endwhile; ?>
        </div>
   
        <div class="xoattkh">
            <button type="submit" name="delete" value="checked_out">Khách đã trả phòng</button>
            <button type="submit" name="delete" value="cancelled">Khách đã huỷ phòng</button>
        </div>
    </form>
    <div class="themttkh">
        <a href="addkh.php"><button>Thêm thông tin khách hàng</button></a>
    </div>
</body>
</html>
