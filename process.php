<?php require_once('config.php');?>

<?php
if(isset($_POST)){
    $name        = $_POST['name'];
    $email       = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password    = $_POST['password'];
    $password    = md5($password);
    

    $sql = "INSERT INTO users (name, email, phonenumber, password) values(?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
   $result = $stmtinsert->execute([$name, $email, $phonenumber, $password]);
   if($result){
    echo 'Data Telah Disimpan.';
   }else{
    echo 'Ada Yang Salah...';
   }
   }else{
    echo 'No Data';
   }

?>