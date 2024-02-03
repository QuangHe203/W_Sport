<?php
    
    // function checkuser($user, $pass) {
    //     $conn = connectdb();
    //     $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user=:user AND pass=:pass");
    //     $stmt->bindParam(':user', $user);
    //     $stmt->bindParam(':pass', $pass);
    //     $stmt->execute();
    
    //     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     $kq = $stmt->fetchAll();
    
    //     if (count($kq) > 0) {
    //         return $kq[0]['role'];
    //     } else {
    //         return 0; // Trả về giá trị false thay vì 0 nếu không tìm thấy tài khoản
    //     }
    // }

    
    function checkuser($user, $pass) {
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user=:user AND pass=:pass");
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
    
        $rowCount = $stmt->rowCount();
    
        if ($rowCount > 0) {
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $kq = $stmt->fetchAll();
            return $kq[0]['role'];
        } else {
            return 0; // Trả về giá trị false thay vì 0 nếu không tìm thấy tài khoản
        }
    }
?>