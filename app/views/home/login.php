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
                            <input type="text" placeholder="Enter Your Email" name="email" id="email" >

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Your Password" name="password" id="password" >
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
    </body>
</html>