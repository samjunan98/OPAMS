<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/login2.css" rel="stylesheet">

   <title>Agent Login</title>
</head>

<body>
   <a href="index.html"><button class="btn-return" style="text-decoration: none;">Return</button></a>
   <div class="center">
      <h1> Agent Login </h1>
      <form action="pwcheck_agent.php" method="POST">
         <div class="forminput">
            <input type="email" name=agentEmail required>
            <span></span>
            <label>Email</label>
         </div>
         <div class="forminput">
            <input type="password" name=agentPw required>
            <span></span>
            <label>Password</label>
         </div>
         <div class="forgetpw"><a href="#">Forgotten Password?</a></div>
         <input type="submit" value="Login" name="agentLogin">
         <div class="regg"> Not yet member? <a href="register.php">Sign Up Now</a></div>
      </form>
   </div>
</body>

</html>