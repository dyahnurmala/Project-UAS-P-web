<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/style.css">

      <title>Login</title>
   </head>
   <body id="bg-login">
    
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder = "Username" class="input-control">
            <input type="password" name="pass" placeholder = "Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
        
        <?php
         if(isset($_POST['submit'])){
            session_start();
            include 'db_connect.php';

            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
            if(mysqli_num_rows($cek) > 0){
                $d = mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $d;
                $_SESSION['id'] = $d->id_admin;
                echo '<script>window.location="dashboard.php"</script>';
            }
         }
        ?>


      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>

   </body>
</html>
