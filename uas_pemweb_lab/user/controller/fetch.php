<?php
    if(isset($_POST['imgId'])){
        require '../include/db_connect.php';
        $id = $_POST['imgId'];
        $output = '';
        $query = "SELECT * FROM menu WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $kategori = $_GET['kategori'];
        
        while($row = mysqli_fetch_array($result)){
            $output .= '
                <img src="../assets/menu/'. $row['gambar'] .'" class="menu_pic modal_pic">
                <br><br>
				<p class="modal_text nama_menu_modal">'. $row['nama'] .'</p>
                <p class="modal_text">'. $row['deskripsi'] .'</p>
                
                <form action="order.php?kategori='.$kategori.'" method="post">
                    
                </form>
            ';
            echo "
                <script>
                    $(document).ready(function(){
                        $('#qty').on('input', function(){
                            Total = $('#qty').val() * " . $row['harga']. "$('#harga').val('Rp. '+Total);
                        });
                    });
                </script>
            ";
        }
        
        echo $output;
    }
?>