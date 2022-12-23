<?php
    if($_SESSION['Role'] == "Head Office")
    {
        ?>
        <!-- //UI of head office home page -->

        <link rel="stylesheet" href="../css/index.css">

        <h2 class="header"><?= $data[0] ?></h2>
        <div class="flex-body">
            
            <div class="card">
                <a class="flex-box" href="">
                    <div class="card-image">
                        <img src="../images/headoffice/Client_Information.png" alt="card-img" srcset="">
                    </div>
                    <div class="card-description">
                        <div class="topic">Client Information</div>
                        <div class="content">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                    <div class="sign-btn card-header">View Client Information</div>
                </a>
            </div>

            <div class="card">
                <a class="flex-box" href="../HeadOffice/manage_regional_offices">
                    <div class="card-image">
                        <img src="../images/headoffice/manage_regional_offices.png" alt="card-img" srcset="">
                    </div>
                    <div class="card-description">
                        <div class="topic">Regional Offices Management</div>
                        <div class="content">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                    <div class="sign-btn card-header">Manage Regional Offices</div>
                </a>
            </div>

            <div class="card">
                <a class="flex-box" href="">
                    <div class="card-image">
                        <img src="../images/headoffice/Supplier_management.png" alt="card-img" srcset="">
                    </div>
                    <div class="card-description">
                        <div class="topic">Supplier Management</div>
                        <div class="content">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                    <div class="sign-btn card-header">Manage Tea Plant Suppliers</div>
                </a>
            </div>

            <div class="card">
                <a class="flex-box" href="">
                    <div class="card-image">
                        <img src="../images/headoffice/View_Statistics.png" alt="card-img" srcset="">
                    </div>
                    <div class="card-description">
                        <div class="topic">Statistics</div>
                        <div class="content">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                    <div class="sign-btn card-header">View Statistics</div>
                </a>
            </div>

            <div class="card">
                <a class="flex-box" href="">
                    <div class="card-image">
                        <img src="../images/headoffice/manage_budget.png" alt="card-img" srcset="">
                    </div>
                    <div class="card-description">
                        <div class="topic">Manage Budget</div>
                        <div class="content">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                    <div class="sign-btn card-header">Manage Budget</div>
                </a>
            </div>

        </div>
    
    <?php
    }
    elseif($_SESSION['Role'] == "Regional Office")
    {
        //UI of regional office home page
    }
    //elseif all users

?>