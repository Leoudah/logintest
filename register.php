<?php require_once('config.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registrasi</title>
</head>
<body>

<div>
    <?php
    if(isset($_POST['create'])){
        $name        = $_POST['name'];
        $email       = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password    = $_POST['password'];

        $sql = "INSERT INTO users (name, email, phonenumber, password) values(?,?,?,?)";
        $stmtinsert = $db->prepare($sql);
       $result = $stmtinsert->execute([$name, $email, $phonenumber, $password]);
       if($result){
        echo 'Data Telah Disimpan.';
       }else{
        echo 'Ada Yang Salah...';
       }
       }
    ?>
</div>

    <div>
        <form action="register.php" method="post">
            <div class="container">

                <div class="row">
                    <div class="col-sm-3">
                        <h1>Registrasi</h1>
                        <p>Masukan Data Ke Dalam Form Dibawah Ini</p>
                        <hr class="mb-3">
                        <label for="name"><b>Nama Lengkap</b></label>
                        <input class="form-control" type="text" name="name" id="name" required>

                        <label for="email"><b>Email Address</b></label>
                        <input class="form-control" type="email" name="email" id="email" required>

                        <label for="phonenumber"><b>Nomer Telepon</b></label>
                        <input class="form-control" type="text" name="phonenumber" id="phonenumber" required>

                        <label for="password"><b>Password</b></label>
                        <input class="form-control" type="password" name="password" id="password" required>
                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
                        <a class="btn btn-primary" href="login.php">Back To Login</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function(){
        $('#register').click(function(e){

            var valid = this.form.checkValidity();
            
            if(valid){

                var name        = $('#name').val();
                var email       = $('#email').val();
                var phonenumber = $('#phonenumber').val();
                var password    = $('#password').val();

                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {name: name,email: email, phonenumber: phonenumber, password: password,},
                success: function(data){
                    Swal.fire({
                    'title' : 'Berhasil',
                    'text' : data,
                    'icon' : 'success'
                    })
                },

                error: function(data){
                    Swal.fire({
                    'title' : 'Error',
                    'text' : 'Sepertinya Ada Kesalahan dalam Menyimpan Data',
                    'icon' : 'error'
                    })
                }
            });
            }else{

            }
        });
    });
</script>
</html>

