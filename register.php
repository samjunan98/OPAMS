<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/register.css" rel="stylesheet">
   <title>Online Petshop Agent Managment System</title> 
</head>
<body>
<a href="index.html"><button class= "btn-return"style="text-decoration: none;">Return</button></a>
      <div class="center"> 
      <h1> Agent Registration</h1>
         <form action="agent-store.php" method = "POST">
            <div class="forminput">
            <label for="Full name">Full Name:</label>
               <input type="text" placeholder="Enter Full Name" name="agentName" required>
            </div>
            <div class="forminput">
            <label for="age">Age:</label>
               <input type="number" placeholder="Enter Age" name="agentAge" min="1" required>
            </div>
            <div class="forminput">
            <label for="Phone number">Phone Number:</label>
               <input type="tel" placeholder="0xx-xxxxxxx" name="agentPhone" pattern="^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$" required>
            </div>
            <div class="forminput">
            <label for="email">Email:</label>
               <input type="email" placeholder="onlinepetshop@xxxmail.com" name="agentEmail" required>
            </div>
            <div class="forminput">
            <label for="Password">Password:</label>
               <input type="password" placeholder="Enter Password" name="agentPw" required>
            </div>
               <div class="radio-title">
               <label for="Gender">Gender:</label></div>
               <div class="radio-input">
                  <input type="radio" name="agentGender"  value="male" required> 
                  <label for="male">Male</label>
                  <input type="radio" name="agentGender" value="female" required> 
                  <label for="female">Female</label> 
                  <input type="radio" name="agentGender" value="other" required> 
                  <label for="other">Other</label>
               </div>
            <div class="forminput-DOB">
            <label for="DOB">Date of Birth:</label>
            <input type="date" name="agentDOB" required>
            </div>
            <div class="forminput-DOB">
               <label for="Location">Location:</label>
                  <input list="Location" name="agentLocation" required>
                  <datalist id="Location">
                   <option value="Perlis">
                   <option value="Kedah">
                   <option value="Kelantan">
                   <option value="Penang">
                   <option value="Pahang">
                   <option value="Perak">
                   <option value="Selangor">
                   <option value="Terengganu">
                   <option value="Malacca">
                   <option value="Johor">
                   <option value="Negeri Sembilan">
                   <option value="Sabah">
                   <option value="Sarawak">
                  </datalist>
                  </div>
            <input type="submit" value="Create Account" name="reg_agent">
   </form>
</div>
</body>
</html>