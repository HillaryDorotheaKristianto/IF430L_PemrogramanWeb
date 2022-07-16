<?php
    require '../include/db_connect.php';
    session_start();
    if(isset($_POST['product_id'])){
        $id_user = $_SESSION['id_user'];
        $id_menu = $_POST['product_id'];
        $nama_menu = $_POST['nama_menu'];
        $qty = $_POST['quantity'];
        $harga = $_POST['harga'];
        $harga *= $qty;
        $queryT = "SELECT * FROM cart WHERE id_menu = '$id_menu'";
        if($result = mysqli_query($conn,$queryT)){
            $rowCount=mysqli_num_rows($result);
            
            if($rowCount > 0){
                $stmt = $conn->prepare($queryT);
                $stmt->execute();
                $quantity = $stmt->get_result();
                $row = $quantity->fetch_assoc();
                mysqli_free_result($result);
                $totalQty = $qty + $row['qty'];
                $totalHarga = $totalQty * ($row['total_harga']/$row['qty']);
                $query = "UPDATE cart SET qty = '$totalQty',total_harga='$totalHarga' WHERE id_menu = '$id_menu' AND id_user = '$id_user'";
                $stmt = $conn->prepare($query);
                $stmt->execute();
            }
            else{
                $query = "INSERT INTO cart(id_user,id_menu,nama_menu,qty,total_harga)
                VALUES ('$id_user','$id_menu','$nama_menu','$qty','$harga')";
                $stmt = $conn->prepare($query);
                $stmt->execute();
            }
        }
    }
?>