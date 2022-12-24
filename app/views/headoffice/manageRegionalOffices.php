
<!-- css -->
<!-- <link rel="stylesheet" href="../css/index.css"> -->

    <h2 class="header"><?= $data['heading'] ?></h2>
    
    <div class="search">
        <form action="" method="GET">
            <input class="search-input" type="text" name="search" placeholder="Search">
            <button class="search-btn" type="submit">Search</button>
            
            <!-- <img src="" alt="search" srcset=""> -->
        </form>
    </div>

    <?php
    //     if(isset($_POST['remove1']))
    //     {
    //         echo "REMOVE!";
    //         echo $_POST['remove1'];
    //     }
    // ?>

    <a href="newregionaloffice"><button class="add btn large">Add new Regional Office</button></a>

    <div class="container">
        <div class="columns gray">
        Regions
        </div>
        <hr class="gray">

        <!-- loop for data given from controller $data[] array -->
        <?php
            if(isset($_POST['remove']))
            {
                echo $data['msg'];
                unset($_POST['remove']);
            }
            if(empty($data['data']))
            {
                if(isset($_POST['SEARCH']))
                {
                    echo $data['msg'];
                    unset($_POST['SEARCH']);
                }
                else{ ?>
                    <p class='header'>There is no Regional Offices. <a href='newregionaloffice'>Add new Regional Offices</a></p>;
                <?php
                }
            }
            foreach($data['data'] as $row )
            {
                ?>
                <div class="selection-card">
                    <div>
                        <?php echo $row['region']; ?>
                    </div>
                    <div class="selection-btns">
                        <form action="viewR" method="POST">  <!-- pass to new controller -->
                            <input type="hidden" name="id" value="<?php echo $row['userID']; ?>">
                            <button class="btn small" type="submit" name="view">View</button>
                        </form>
                        <div class="remove-btn">
                            <input type="hidden" name="id" value="<?php echo $row['userID']; ?>">
                            <button class="btn small">Remove</button>
                        </div>
                        
                        
                    </div>
                
                </div>

        <?php   } 
        ?>

    </div>

    <div class="pop-up">
        <div class="pop-up-msg">
            Are you sure. you want to delete the regional office.
        </div>
        <form action="" method="POST">
            <button class="btn small" type="submit" name="remove">Remove</button>
        </form>
        <button class="btn small">Cancle</button>
    </div>


    <script src="../script/msg.js"></script>