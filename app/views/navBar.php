<!--<?//php echo $data['id']; ?> <?php //session_start() ?> -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tea Subsidy System</title>
        <!-- css -->
        <link rel="stylesheet" href="../css/style.css">

        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>

        <div class="menu">
                <img src="../images/navbar/Menu.svg" alt="" srcset="">
        <?php if(isset($_SESSION['User'])){ ?>

                <div class="logged-sign">
                    <a href="../user/profile" class="profile"><img src="../images/<?php echo $data['dp_location'] ?>" alt="dp"></a>
                    <div class=vr></div>
                    <a href="../user/signout" class="sign-btn">Sign&nbsp;Out</a>
                </div>
        <?php }else { ?>

                <div class="sign">
                    <a href="../home/login" class="sign-btn">Sign&nbsp;In</a>
                    <div class=vr></div>
                    <a href="../home/register" class="sign-btn">Sign&nbsp;Up</a>
                </div>
        <?php } ?>
        </div>

        <div class="nav">
            <div class="logo">
                <div><img src="../images/navbar/logo.svg" alt="logo"></div>
                <div class=vr></div>
                <div class="nav-text">Tea<br>Subsidy<br>System</div>
            </div>
            <!-- <hr> -->
            
            <?php if(isset($_SESSION['User'])) : ?>
                <div class="bar">
                    <a href="../user/index" class="nav item <?php echo $data['active']=="index"? "active" : "n" ?>">
                        <img src="../images/navbar/home.svg" alt="logo">
                        <div class="nav-text">Home</div>
                    </a>
                    <a href="../user/Notifications" class="nav item <?php echo $data['active']=="Notifications"? "active" : "n" ?>">
                        <img src="../images/navbar/ro.svg" alt="logo">
                        <div class="nav-text">Notifications</div>
                    </a>
                    <a href="../user/FAQ" class="nav item <?php echo $data['active']=="FAQ"? "active" : "n" ?>">
                        <img src="../images/navbar/service.svg" alt="logo">
                        <div class="nav-text">FAQ</div>
                    </a>
                </div>
                <div class="logged-sign">
                    <a href="../user/profile" class="profile"><img src="../images/<?php echo $data['dp_location'] ?>" alt="dp"></a>
                    <div class=vr></div>
                    <a href="../user/logout" class="sign-btn">Sign&nbsp;Out</a>
                </div>
            <?php else : ?>
                <div class="bar">
                    <a href="../home/index" class="nav item <?php echo $data['active']=="index"? "active" : "n" ?>">
                        <img src="../images/navbar/home.svg" alt="logo">
                        <div class="nav-text">Home</div>
                    </a>
                    <a href="../home/regionaloffices" class="nav item <?php echo $data['active']=="regionaloffices"? "active" : "n" ?>">
                        <img src="../images/navbar/ro.svg" alt="logo">
                        <div class="nav-text">Regional Offices</div>
                    </a>
                    <a href="../home/OurServices" class="nav item <?php echo $data['active']=="OurServices"? "active" : "n" ?>">
                        <img src="../images/navbar/service.svg" alt="logo">
                        <div class="nav-text">Our Services</div>
                    </a>
                    <a href="../home/about" class="nav item <?php echo $data['active']=="about"? "active" : "n" ?>">
                        <img src="../images/navbar/about.svg" alt="logo">
                        <div class="nav-text">About Us</div>
                    </a>
                </div>
                <!-- onclick="{alert('clicked');}" -->
                <div class="sign">
                    <a href="../home/login" class="sign-btn">Sign&nbsp;In</a>
                    <div class=vr></div>
                    <a href="../home/register" class="sign-btn">Sign&nbsp;Up</a>
                </div>

            <?php endif ; ?>
        </div>

        <script src="../script/nav.js"></script><?php //echo $data[0]=="index"? "active" : "none";?>