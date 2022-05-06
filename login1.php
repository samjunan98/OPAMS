<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/login1.css" rel="stylesheet">

   <title>Admin Login</title>
</head>

<body>
   <a href="index.html"><button class="btn-return" style="text-decoration: none;">Return</button></a>
   <div class="center">
      <h1> Admin Login </h1>
      <form action="pwcheck_admin.php" method="POST">
         <div class="forminput">
            <input type="email" name=adminEmail required>
            <span></span>
            <label>Email</label>
         </div>
         <div class="forminput">
            <input type="password" name=adminPw required>
            <span></span>
            <label>Password</label>
         </div>
         <input type="submit" value="Login" name="adminLogin">
      </form>
   </div>
</body>

</html>