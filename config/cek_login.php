<?php
    
    include "config/koneksi.php";
    session_start();
    if(isset($_POST['submit']))
    {               
        $username   = $_POST['username'];
        $password   = sha1($_POST['password']);
        
                        
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
       
        if(mysqli_num_rows($query) == 0)

        {
            $error = "Username atau Password salah!";
        }
        else
        {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['username']=$row['username'];
            $_SESSION['nama']=$row['nama'];
            $_SESSION['level'] = $row['level'];
            
            if($row['level'] == "ADMIN")
            {
                header("Location: admin/index.php");
            }
            elseif($row['level'] =="PENGAWAS")
            {
                header("Location: pengawas/index.php");
            }
            else
            {
                $error = "Failed Login";
            }
        }
    }         
?>