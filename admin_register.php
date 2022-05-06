<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/register.css" rel="stylesheet">
   <title>Admin Register</title> 
</head>
<body>
<a href="index.html"><button class= "btn-return"style="text-decoration: none;">Return</button></a>
      <div class="center"> 
      <h1> Admin Registration</h1>
         <form action="admin-store.php" method = "POST">
            <div class="forminput">
            <label for="Full name">Full Name:</label>
               <input type="text" placeholder="Enter Full Name" name="adminName" required>
            </div>
 
            <div class="forminput">
            <label for="email">Email:</label>
               <input type="email" placeholder="onlinepetshop@xxxmail.com" name="adminEmail" required>
            </div>
            <div class="forminput">
            <label for="Password">Password:</label>
               <input type="password" placeholder="Enter Password" name="adminPw" required>
            </div>
          
            <input type="submit" value="Create Account" name="reg_admin">
   </form>
</div>
</body>
</html>