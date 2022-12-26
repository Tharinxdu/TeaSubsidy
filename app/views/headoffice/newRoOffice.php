<!-- css -->
<!-- <link rel="stylesheet" href="../css/index.css"> -->

    <h2 class="header"><?= $data['heading'] ?></h2>
    <!-- //msgs -->
    <?php echo $data['msg']; ?>
    <!-- <?//php echo date('YnjGis'); ?> -->
    <p class="header">User name,clerk name , accountant name will be always user. they can change it after login.</p>
    <div class="flex-body mr0 pad0 alitems">
        <?php
        if(strpos($data['msg'] , "green") == false)
        { ?>
            <form autocomplete="off" class="addform" action="" method="POST">
            <p>userEmail</p>
            <input type="email" name="email" required value = "<?php echo isset($data['email'])? $data['email'] : ''; ?>" >
            <!-- <p>Username</p>
            <input type="text" name="username" required> -->
            <p>Password</p>
            <input type="password" name="password" required>
            <p>Confirm Password</p>
            <input type="password" name="Cpassword" required>
            <p>Contact Number</p>
            <input type="text" name="contactNo" required value = "<?php echo isset($data['numbr'])? $data['numbr'] : ''; ?>" ><br>
            <p>Region</p>
            <div class="select">
                <select name = "Region" required selected = "<?php echo isset($data['region'])? $data['region'] : ''; ?>" >
                    <option>Select a District</option>
                    <option value = "Matara" <?php echo ($data['region'] == "Matara")? 'Selected' : ''; ?>>Matara</option>
                    <option value = "Galle" <?php echo ($data['region'] == "Galle")? 'Selected' : ''; ?>>Galle</option>
                    <option value = "Rathnapura" <?php echo ($data['region'] == "Rathnapura")? 'Selected' : ''; ?>>Ratnapura</option>
                    <option value = "Uwa" <?php echo ($data['region'] == "Uwa")? 'Selected' : ''; ?>>Uwa</option>
                    <option value = "Nuwara Eliya" <?php echo ($data['region'] == "Nuwara Eliya")? 'Selected' : ''; ?>>Nuwara Eliya</option>
                    <option value = "Kandy" <?php echo ($data['region'] == "Kandy")? 'Selected' : ''; ?>>Kandy</option>
                    <option value = "Kalutara" <?php echo ($data['region'] == "Kalutara")? 'Selected' : ''; ?>>Kalutara</option>
                    <option value = "Kegalle" <?php echo ($data['region'] == "Kegalle")? 'Selected' : ''; ?>>Kegalle</option>
                    <option value = "Puttalam" <?php echo ($data['region'] == "Puttalam")? 'Selected' : ''; ?>>Puttalam</option>
                    <option value = "Ampara" <?php echo ($data['region'] == "Ampara")? 'Selected' : ''; ?>>Ampara</option>
                    <option value = "Badulla" <?php echo ($data['region'] == "Badulla")? 'Selected' : ''; ?>>Badulla</option>
                    <option value = "Monaragala" <?php echo ($data['region'] == "Monaragala")? 'Selected' : ''; ?>>Monaragala</option>
                </select>
            </div>
            <!-- <p>Region</p>
            <input type="text" name="Region" required> -->
            <button class="btn small center mrtop20" type="submit" name="ADD">ADD</button>
        </form>
        <?php
        }
        else{   ?>

            <form autocomplete="off" class="addform" action="" method="POST">
                <p>userEmail</p>
                <input type="email" name="email" required>
                <!-- <p>Username</p>
                <input type="text" name="username" required> -->
                <p>Password</p>
                <input type="password" name="password" required>
                <p>Confirm Password</p>
                <input type="password" name="Cpassword" required>
                <p>Contact Number</p>
                <input type="text" name="contactNo" required><br>
                <p>Region</p>
                <div class="select">
                    <select name = "Region" required>
                        <option>Select a District</option>
                        <option value = "Matara">Matara</option>
                        <option value = "Galle">Galle</option>
                        <option value = "Ratnapura">Ratnapura</option>
                        <option value = "Uwa">Uwa</option>
                        <option value = "Nuwara Eliya">Nuwara Eliya</option>
                        <option value = "Kandy">Kandy</option>
                        <option value = "Kalutara">Kalutara</option>
                        <option value = "Kegalle">Kegalle</option>
                        <option value = "Puttalam">Puttalam</option>
                        <option value = "Ampara">Ampara</option>
                        <option value = "Badulla">Badulla</option>
                        <option value = "Monaragala">Monaragala</option>
                    </select>
                </div>
                <!-- <p>Region</p>
                <input type="text" name="Region" required> -->
                <button class="btn small center mrtop20" type="submit" name="ADD">ADD</button>
            </form>

        <?php
        }
        ?>

    </div>
    <script src="../script/msg.js"></script>