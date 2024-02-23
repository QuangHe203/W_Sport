<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    
</head>
<body>
<?php
    // Kết nối đến cơ sở dữ liệu
    require_once '05_ConnectData.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["upload"])) {
        $targetDir = "../uploads/";  // Thư mục lưu trữ ảnh
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Kiểm tra nếu tệp đã tồn tại
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Kiểm tra kích thước của tệp (giới hạn cho ví dụ)
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Cho phép chỉ tải lên các định dạng hình ảnh
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Kiểm tra nếu $uploadOk = 0, có lỗi xảy ra
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Di chuyển tệp tải lên vào thư mục đích
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Lưu thông tin vào cơ sở dữ liệu
                $imagePath = $targetFile;
                $sql = "INSERT INTO images (image_path) VALUES (?)";
                $stmt = $connect->prepare($sql);
                $stmt->bind_param("s", $imagePath);
                $stmt->execute();
                $stmt->close();

                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded and saved to the database.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
    // Đóng kết nối đến cơ sở dữ liệu
    $connect->close();
?>

    <form  method="post" enctype="multipart/form-data">
        <label for="image">Choose Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required>
        <button type="submit" name="upload">Upload</button>
    </form>
</body>
</html>