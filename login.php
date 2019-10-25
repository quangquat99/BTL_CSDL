<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="login.css">
	<script src="jquery/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('image/teemo.png')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pr-wrap">
                    <div class="pass-reset">
                        <label>
                        Enter the email you signed up with</label>
                        <input type="email" placeholder="Email" />
                        <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                    </div>
                </div>
                <div class="wrap">
                    <p class="form-title">
                    Sign In</p>
                    <form class="login" id="fomrLogin" action="loginController.php" method="POST">
                        <input type="text" id="textUsername" name="textUsername" placeholder="Username" />
                        <input type="password" id="textPassword" name="textPassword" placeholder="Password" />
                        <input type="submit" name="btnLogin" id="btnLogin" value="Sign In" class="btn btn-success btn-sm" />
                        <p name="abc" value="" id="msgError" style="display: none">Error</p>
                        <div class="remember-forgot">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" />
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 forgot-pass-content">
                                    <a href="javascript:void(0)" class="forgot-pass">Forgot Password</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="posted-by">Posted By: <a href="http://www.jquery2dotnet.com">Copy đấy...haha</a></div>
    </div>


</body>
</html>
