<!-- css -->
<link rel="stylesheet" href="../css/index.css">

    <h2 class="header"><?= $data['heading'] ?></h2>
    <!-- //msgs -->
    <?php echo $data['msg']; ?>
    <!-- <?//php echo date('YnjGis'); ?> -->
    <p class="header">User name,clerk name , accountant name will be always user. they can change it after login.</p>
    <div class="flex-body mr0 pad0 alitems">
        <form autocomplete="off" class="addform" action="" method="POST">
            <p>userEmail</p>
            <input type="email" name="email" required>
            <!-- <p>Username</p>
            <input type="text" name="username" required> -->
            <p>Password</p>
            <input type="password" name="password" required>
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
            <button class="btn mrtop20" type="submit" name="ADD">ADD</button>
        </form>
    </div>
    <script src="../script/msg.js"></script>