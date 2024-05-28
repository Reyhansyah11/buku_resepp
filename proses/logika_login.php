<?php
    session_start();

    include '../db/koneksi.php';

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM user WHERE user_name = '$user_name' AND password = '$password'";

    $result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['username'] = $username;
    header("Location: ../admin/admin.php");
    exit();
} else {
    echo "<script>
            alert('Username atau Password salah!');
            window.location.href='../js/index.php';
        </script>";
    exit();
}


?>