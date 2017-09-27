<?php
/**
 * @Author: WMQ
 * @Date:   2017-08-25 15:38:48
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-25 20:51:12
 */
if (isset($_GET['action'])) {
    $action=$_GET['action'];
    switch ($action) {
        case 'submit':
            $name=$_POST['name'];
            $sex = $_POST['sex'];
            $age=$_POST['age'];
            $class = $_POST['class'];
            $host = 'localhost';
            $user = 'root';
            $pwd = '123456';
            $db = 'kaoshi';
                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                        // print_r($row);
                        if($name==null||$sex==null||$age==null||$class==null){
                            echo "<script>alert('提交失败')</script>";
                        }else{
                            $res= $pdo->exec("INSERT into kaoshi values('','$name','$sex','$age','$class')");
                            if($res>0){
                            echo "<script>alert('提交成功')</script>";
                            include 'index.php';
                        }
                    }
                } catch (Exception $e) {
                    echo $e->getMessage;
                }
            break;

        default:
            # code...
            break;
    }
}