<?php
    function check_login($conn)
    {
        if(isset($_SESSION['user_id']))
        {
            $id = $_SESSION['user_id'];
            $query = "SELECT * FROM `tbl_prism_users` WHERE `Id` = $id";
            $result = mysqli_query($conn,$query);
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        } else {
            header("Location: ../");
            die;
        }
    }
?>