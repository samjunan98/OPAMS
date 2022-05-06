<?php
    $agentID=$_GET['agentID'];
    include('config.php');
	$query=mysqli_query($db,"SELECT * FROM agent WHERE agentID='$agentID'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/register.css" rel="stylesheet">
   <title>Agent Edit</title> 
</head>
<body>
<div class="center"> 
      <h1> Update</h1>
      <form method="POST" action="edit.php?agentID=<?php echo $agentID; ?>">
               <div class="forminput">
                  <label>ID:</label>
                  <input type="text" class="form-control" value="<?php echo $row['agentID']; ?>" name="agentID" disabled>
               </div>
               <div class="forminput">
                  <label>Name:</label>
                  <input type="text" class="form-control" value="<?php echo $row['agentName']; ?>" name="agentName">
               </div>
               <div class="forminput">
                  <label>Email:</label>
                  <input type="email" class="form-control" value="<?php echo $row['agentEmail']; ?>" name="agentEmail">
               </div>
               <div class="forminput">
                  <label>Age:</label>
                  <input type="number" class="form-control" value="<?php echo $row['agentAge']; ?>" name="agentAge">
               </div>
               <div class="forminput">
                  <label>Phone Number:</label>
                  <input type="tel" class="form-control" value="<?php echo $row['agentPhone']; ?>" name="agentPhone">
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
               <div class="forminput">
                  <label>Date of Birth:</label>
                  <input type="date" class="form-control" value="<?php echo $row['agentDOB']; ?>" name="agentDOB">
               </div>
            <div class="forminput">
               <label for="Location">Location:</label>
                  <input list="Location" name="agentLocation" value="<?php echo $row['agentLocation']; ?>" required>
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
               <div class="btn">
                  <input type="submit" value="Update">
               </div>
            </form>
    </div>
</html>

