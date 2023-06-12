<?php
            include 'DBConnection.php';
            $conn = OpenCon();
            $sql = mysqli_query ($conn,"SELECT * FROM transaction_table where queue id = '{$id}'");
            $row = mysqli_fetch_array($sql);
            if($row)
            {
                $resp['ID'] = 'ID';
                $resp['FULLNAME'] = 'FULLNAME';
            }else
            {
                $resp['TRANSACTION_ID'] = "";
                $resp['FULLNAME'] = "";
            }
        ?>
<?
    include 'DBConnection.php';
    $conn = OpenCon();
    $code = sprintf("%'.04d",1);
        while(true){
            $sql = mysqli_query($conn, "SELECT count(ID) `TRANSACTION_ID` FROM `transaction_table`");
            $row = mysqli_fetch_array($sql)['TRANSACTION_ID'];

            if($chk > 0){
                $code = sprintf("%'.04d",abs($code) + 1);
            }else{
                break;
            }
        }
        $_POST['TRANSACTION_ID'] = $code;
        extract($_POST);
        $sql = "INSERT INTO `queue_list` (`TRANSACTION_ID`,`customer_name`) VALUES('{$queue}','{$customer_name}')";
        $save = $this->query($sql);
        if($save){
            $resp['STATUS'] = '1';
            $resp['ID'] = $this->mysqli_query("SELECT last_insert_rowid()")->mysqli_fetch_array()[0];
        }
        return json_encode($resp);
    ?>