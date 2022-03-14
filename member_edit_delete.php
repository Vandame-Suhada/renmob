<?php
    include("koneksi.php");
    $id=$_GET['id'];
    mysqli_query($kon, "DELETE FROM member WHERE id='$id'");
    header('location:member.php');
    ?>