<!-- view Regoional Office details nothing more...simple when given ID / username -->

<!-- css -->
<!-- <link rel="stylesheet" href="../css/index.css"> -->

<div class="flex-container">

    <?php
    if(empty($data['msg']))
    { 
        ?>
        <!-- firstName , lastName , region , startDate , userEmail , userName , contactNum -->
        <div class="details">
            <div class="left-details">firstName :</div>
            <div class="right-details"><?php echo $data['data']['firstName']; ?></div>
        </div>
        <div class="details">
            <div class="left-details">lastName :</div>
            <div class="right-details"><?php echo $data['data']['lastName']; ?></div>
        </div>
        <div class="details">
            <div class="left-details">region :</div>
            <div class="right-details"><?php echo $data['data']['region']; ?></div>
        </div>
        <div class="details">
            <div class="left-details">startDate :</div>
            <div class="right-details"><?php echo $data['data']['startDate']; ?></div>
        </div>
        <div class="details">
            <div class="left-details">userEmail :</div>
            <div class="right-details"><?php echo $data['data']['userEmail']; ?></div>
        </div>
        <div class="details">
            <div class="left-details">userName :</div>
            <div class="right-details"><?php echo $data['data']['userName']; ?></div>
        </div>
        <div class="details">
            <div class="left-details">contactNum :</div>
            <div class="right-details"><?php echo $data['data']['contactNum']; ?></div>
        </div>
    
    <?php
    }
    else{
        ?>
        
        <?php echo $data['msg']; ?>
        <script src="../script/msg.js"></script>

    <?php
    }
    ?>
</div>