<!-- <link rel="stylesheet" href="../css/login.css"> -->

        
        <div class="container">
            <!-- <h1 class="header">LOGIN</h1> -->
            <div class="flex-box">

                <div class="left">
                    <img src="../images/Login.png" alt="login.png">
                </div>

                <div class="right">
                    <form action="" autocomplete="off" method="POST">
                        <div class="form-box">
                            <!-- //php -->
                            <h2 class="header">LOGIN</h2>
                            <p class="header">Please fill in this form to log into your account.</p>
                            <hr>
                            
                            <?php
                                if(!empty($data))
                                {
                                    echo $data['msg'];   
                                }
                            ?>

                            <label for="email"><b>Email</b></label>
                            <input type="email" placeholder="Enter Your Email" name="email" id="email" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Your Password" name="password" id="password" required>
                            <hr>
                            
                            <button type="submit" name="Submit" class="login-btn">Login</button>
                        </div>
                
                        <div class="signin">
                            <span class="header">Doesn't have an account? <a href="signup.php">Sign up</a>.</span>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <script src="../script/msg.js"></script>

<!-- footer -->
<div class="footer">
        <div class="flex-box">
            <div class="fBasis50 col alignCenter">
                <h2 class="header">Tea Small Holdings Development Authority</h2>
                <div class="justifyAround default-blue textBold">
                    <img src="/TeaSubsidy/public/images/footer/Location.svg" alt="img">
                    <p class="footer-item">Tea Small Holdings Development Authority, 1120 Battaramulla</p>
                </div>
                <div class="justifyAround default-blue textBold">
                    <img src="/TeaSubsidy/public/images/footer/Phone.svg" alt="img">
                    <p class="footer-item">011 7909 021</p>
                </div>
                <div class="justifyAround default-blue textBold">
                    <img src="/TeaSubsidy/public/images/footer/Mail.svg" alt="img">
                    <p class="footer-item">info@tshda.gov.lk</p>
                </div>
            </div>

            <div class="vr"></div>

            <div class="fBasis50 col alignCenter">
                <h2 class="header">Quick Links</h2>
                <ul class="default-blue textBold">
                    <a href=""><li>Overview</li></a>
                    <a href=""><li>Contact Details</li></a>
                    <a href=""><li>Regional Offices</li></a>
                </ul>
            </div>
        </div>
        <p class="textRight default-blue mr0">2020 © Web Solution by UCSC 2nd Years Group 50</p>        
</div>
        


    </body>
</html>