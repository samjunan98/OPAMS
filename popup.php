<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Popup Login Form Design | CodingNepal</title>
      <link rel="stylesheet" href="css/popup.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="center">
         <input type="checkbox" id="show">
         <label for="show" class="fa fa-edit"></label>
         <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="text">
               Edit
            </div>
            <form action="#">
               <div class="data">
                  <label>Name</label>
                  <input type="text" class="form-control" value="<?php echo $row['agentName']; ?>" name="agentName">
               </div>
               <div class="data">
                  <label>Email</label>
                  <input type="email" class="form-control" value="<?php echo $row['agentEmail']; ?>" name="agentEmail">
               </div>
               <div class="data">
                  <label>Age</label>
                  <input type="number" class="form-control" value="<?php echo $row['agentEmail']; ?>" name="agentEmail">
               </div>
               <div class="data">
                  <label>Phone Number</label>
                  <input type="tel" class="form-control" value="<?php echo $row['agentEmail']; ?>" name="agentEmail">
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <button type="submit">Update</button>
               </div>
            </form>
         </div>
      </div>
   </body>
</html>