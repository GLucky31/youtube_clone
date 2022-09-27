<?php
include_once './header.php';
?>

<div class="container-fluid bg-image">
    <div class="row">
        <div class="login-wraper">
            <div class="hidden-xs">
                <img src="images/login.jpg" alt="">
            </div>
            <div class="banner-text hidden-xs">
                <div class="line"></div>
                <div class="b-text">
                    Watch <span class="color-active">millions<br> of</span> <span class="color-b1">v</span><span class="color-b2">i</span><span class="color-b3">de</span><span class="color-active">os</span> for free.
                </div>
                <div class="overtext">
                    Over 6000 videos uploaded Daily.
                </div>
            </div>
            <div class="login-window">
                <div class="l-head">
                    Sign Up for Free
                </div>
                <div class="l-form">
                    <form action="user_insert.php" method="post">
                    <div class="form-group">
                            <label for="exampleInputUsername">Username</label>
                            <input type="text" name='username' class="form-control" id="exampleInputUsername" placeholder="John/Joe Doe">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name='email' class="form-control" id="exampleInputEmail1" placeholder="sample@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="pass1" class="form-control" id="exampleInputPassword1" placeholder="**********">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Re-type Password</label>
                            <input type="password" name="pass2" class="form-control" id="exampleInputPassword2" placeholder="**********">
                        </div>
                        <div class="row">
                            <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Sign Up</button></div>
                            <div class="hidden-xs">
                                <div class="col-lg-1 ortext">or</div>
                                <div class="col-lg-4 signuptext"><a href="login.html">Log In</a></div>
                            </div>
                        </div>
                        <div class="row hidden-xs">
                            <div class="col-lg-12 forgottext">
                                <a href="#">By clicking "Sign Up" I agree to circle's Terms of Service.</a>
                            </div>
                        </div>
                        <div class="visible-xs text-center mt-30">
                            <span class="forgottext"><a href="#">Already have an account?</a></span>
                            <span class="signuptext"><a href="#">Login here</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once './footer.php';
?>