<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Petshop Agent Managment System</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free-6.1.1-web/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a>Register New Account</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <form action="agent-store.php" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="col-sm-3 col-form-label">Photo</label>
                        <input name="agentPhoto" type="file" accept="image/*" class="form-control" style="height:50px" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"  required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="agentName" required>
                       
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="agentEmail" required>
                        
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="agentPw1" pattern=".{8,}"   required title="8 digits or characters minimum">
                       
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="agentPw2" pattern=".{8,}"   required title="8 digits or characters minimum">
                        
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" class="form-control" placeholder="Age" min="1" name="agentAge" required>
                       
                    </div>
                    <div class="form-group mb-3">
                        <input type="tel" class="form-control" placeholder="Phone Number" name="agentPhone" pattern="^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$" required>
                        
                    </div>
                    <div class="form-group mb-3">
                        <input placeholder="Date of Birth" class="form-control" type="text" name="agentDOB" onfocus="(this.type='date')" id="date" max="<?php echo date("Y-m-d"); ?>" required>
                        
                    </div>
                    <div class="form-group mb-3">
                        <select class="form-control" name="agentGender" required>
                            <option value="" disabled selected value>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
         
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <select class="form-control" name="agentLocation" required>
                            <option value="" disabled selected value>Location</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Penang">Penang</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Perak">Perak</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Terengganu">Terengganu</option>
                            <option value="Malacca">Malacca</option>
                            <option value="Johor">Johor</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                        </select>
                    </div>
                    <div class="form-group mb-3" >
                    <div align="center" class="g-recaptcha brochure__form__captcha" data-sitekey="6LfKe9ofAAAAAAmMhxzssswOMaojhMdLMhreoIOQ"></div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" name="reg_agent">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <br>
                <a href="agent_login.php" class="text-center">I already have an account</a>
            </div>
            <!-- /.form-box -->

        </div><!-- /.card -->
        <div class="register-logo">
        </div>
    </div>
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>