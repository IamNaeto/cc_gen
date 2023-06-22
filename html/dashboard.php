<?php
        session_start();
        require_once("../php/connect.php");
        $query = "SELECT * FROM card_details WHERE username = '{$_SESSION['username']}'";
        $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
</head>

<body>
    <div class="dash-container">
        <!-- side bar section -->
        <div class="side-bar">
            <div class="bar-menu">
                <img src="../img/Logo.png" alt="" class="side-img">
                <p class="current" id="dashboardNav"><img src="../img/Dashboard.png" alt=""> Dashboard</p>
                <p id="profileNav"><img src="../img/User.png" alt=""> Profile</p>
                <p id="downloadNav"> <img src="../img/import.png" alt="">Downloaded Cards</p>
                <p id="savedNav"><img src="../img/folder.png" alt=""> Saved Cards</p>
            </div>
        </div>
        <!-- dashboard section -->
        <div class="dashboard">
            <div class="dashboard-container">
                <div class="dash-head">
                    <h1>Dashboard</h1>

                    <div class="dashhead-user">
                        <i class="fa fa-user-circle"></i>
                        <p>
                            <?php echo $_SESSION['firstname']; ?>
                        </p>
                        <div class="user-prop">
                            <i class="fa fa-chevron-circle-down" id="user-icon"></i>
                            <div class="user-links">
                                <a href="../index.php">Home</a>
                                <a href="card-library.php">Card Library</a>
                                <a href="documentations.php">Documentations</a>
                                <a href="about.php">About</a>
                                <a href="../php/logout.php">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- users info section -->
                <div class="users-info">
                    <div class="info">
                        <i class="fa fa-user-circle"></i>
                        <div>
                            <h2>Hello
                                <?php echo $_SESSION['firstname'].' '.$_SESSION['surname']; ?>
                            </h2>
                            <p>Welcome Back</p>
                        </div>
                    </div>
                    <div class="lastlog">
                        <p>Your last login was on</p>
                        <h3>Thursday 15th June 2023</h3>
                    </div>
                </div>

                <!-- Actions section -->
                <div class="actions">
                    <div class="download sec">
                        <img src="../img/download-icon.png" alt="">
                        <div class="load-count">
                            <h2>0</h2>
                            <p>Downloaded Cards</p>
                        </div>
                    </div>
                    <div class="saved sec">
                        <img src="../img/save-icon.png" alt="">
                        <div class="load-count">
                            <h2>0</h2>
                            <p>Saved Cards</p>
                        </div>
                    </div>
                </div>

                <!-- downloaded cards sec -->
                <div class="downloads-details">
                    <h1>Downloaded Cards</h1>
                    <table class="table table-bordered">
                        <thead>
                                <th>Card Type</th>
                                <th>Card Number</th>
                                <th>CVV</th>
                                <th>Expiry Date</th>
                        </thead>
		    <tbody>
			<?php
                                while($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                        <td><?php echo $row['card_type']; ?></td>
                                        <td><?php echo $row['card_number']; ?></td>
                                        <td><?php echo $row['cvv']; ?></td>
                                        <td><?php echo $row['expiry_date']; ?></td>
                                </tr>
                        <?php } ?>
                   </tbody>
                </table>

                </div> <!--end of table inserted -->
            </div>


            <!-- Profile Section Dashboard -->
            <div class="profile-container" id="profile">
                <div class="dash-head">
                    <h1>Profile</h1>

                    <div class="dashhead-user">
			<i class="fa fa-user-circle"></i>
			<p><?php echo $_SESSION['firstname']; ?></p>
                        <div class="user-prop">
                            <i class="fa fa-chevron-circle-down" id="user-icon"></i>
                            <div class="user-links">
                                <a href="">Home</a>
                                <a href="">Card Library</a>
                                <a href="">Documentations</a>
                                <a href="">About</a>
                                <a href="">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-box">
                    <div class="profile-photo">
			<i class="fa fa-user-circle"></i>
			<h1><?php echo $_SESSION['firstname'].' '.$_SESSION['surname']; ?></h1>
                 	<p><?php echo $_SESSION['email']; ?></p>
                    </div>
                    <div class="profile-details">
                        <h1>Users Details</h1>
                        <form action="#profile" id="usersDetails">
			    <div class="form-container">
				<div class="left">
                                	<label for="">First Name</label><br>
                                	<input type="text" name="fname" value="<?php echo $_SESSION['firstname']; ?>" class="fName" readonly><br>

                            		<label for="">Last Name</label><br>
                           		<input type="text" name="lname" value="<?php echo $_SESSION['surname']; ?>" class="lName" readonly><br>
                           	</div>

                           	<div class="right">
                                	<label for="">UserName</label><br>
                            		<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" class="userN" readonly><br>

                            		<label for="">Email Address</label><br>
                            		<input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" class="userMail" readonly>
                           	</div>
                            </div>

                            <input type="submit" value="Edit" class="edit btn"> <input type="submit" value="Save"
                                class="save btn" disabled>
                        </form>
                    </div>
                </div>

            </div>

            <!-- downloaded cards dashboard -->
            <div class="download-wrapper">
                <div class="dash-head">
                    <h1>Downloaded Cards<h1>

                            <div class="dashhead-user">
                                <i class="fa fa-user-circle"></i>
                                <p>User</p>
                                <div class="user-prop">
                                    <i class="fa fa-chevron-circle-down" id="user-icon"></i>
                                    <div class="user-links">
                                        <a href="">Home</a>
                                        <a href="">Card Library</a>
                                        <a href="">Documentations</a>
                                        <a href="">About</a>
                                        <a href="">Sign Out</a>
                                    </div>

                                </div>
                            </div>
                </div>
                <!-- download history -->
                <div class="download-history">
                    <div class="download-num">
                        <h3>All Downloaded Cards </h3>
                        <h3>(0)</h3>
                    </div>

                    <div class="card-search">
                        <p>Quick search a card</p>
                        <div>
                            <input type="text" placeholder="Enter Card Name" class="cardNameInput">
                            <input type="submit" value="Search" id="search">
                        </div>
                    </div>
                </div>

                <div class="downloads-details">
		    <table class="table table-bordered">
			 <thead>
                                <th>Card Type</th>
                                <th>Card Number</th>
                                <th>CVV</th>
                                <th>Expiry Date</th>
                        </thead>
                  	<tbody>
                        <?php
                                while($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                        <td><?php echo $row['card_type']; ?></td>
                                        <td><?php echo $row['card_number']; ?></td>
                                        <td><?php echo $row['cvv']; ?></td>
                                        <td><?php echo $row['expiry_date']; ?></td>
                                </tr>
                        <?php } ?>
                   	</tbody>
                   </table>
                </div>
            </div>

            <!-- saved cards dashboard -->
            <div class="saved-wrapper">
                <div class="dash-head">
                    <h1>Saved Cards<h1>

                            <div class="dashhead-user">
                                <i class="fa fa-user-circle"></i>
                                <p>User</p>
                                <div class="user-prop">
                                    <i class="fa fa-chevron-circle-down" id="user-icon"></i>
                                    <div class="user-links">
                                        <a href="">Home</a>
                                        <a href="">Card Library</a>
                                        <a href="">Documentations</a>
                                        <a href="">About</a>
                                        <a href="">Sign Out</a>
                                    </div>

                                </div>
                            </div>
                </div>
                <!-- saved history -->
                <div class="download-history">
                    <div class="download-num">
                        <h3>All Saved Cards </h3>
                        <h3>(0)</h3>
                    </div>

                    <div class="card-search">
                        <p>Quick search a card</p>
                        <div>
                            <input type="text" placeholder="Enter Card Name" class="cardNameInput">
                            <input type="submit" value="Search" id="search">
                        </div>
                    </div>
                </div>

                <div class="downloads-details">
                    <table class="table table-bordered">
			 <thead>
                                <th>Card Type</th>
                                <th>Card Number</th>
                                <th>CVV</th>
                                <th>Expiry Date</th>
                        </thead>
                   	<tbody>
                        	<?php
                                while($row = mysqli_fetch_assoc($result)) {
                        	?>
                                <tr>
                                        <td><?php echo $row['card_type']; ?></td>
                                        <td><?php echo $row['card_number']; ?></td>
                                        <td><?php echo $row['cvv']; ?></td>
                                        <td><?php echo $row['expiry_date']; ?></td>
                                </tr>
                        	<?php } ?>
                   	</tbody>			
                    </table>
                </div>
            </div>
        </div>

    </div>

    <footer>
        <p>Copyright © 2023. CC_Gen. All rights reserved.</p>

        <div class="socials">
            <a href="#">
                <i class="fa fa-facebook-square"></i>
            </a>
            <a href="#">
                <i class="fa fa-twitter-square"></i>
            </a>
            <a href="#">
                <i class="fa fa-instagram"></i>
            </a>
        </div>

        <div class="foot-links">
            <a href="../index.php">Home</a>
            <a href="html/card-library.php">Card Library</a>
            <a href="html/documentations.php">Documentations</a>
            <a href="about.php">About</a>
        </div>

    </footer>

    <script src="../script/dashboard.js"></script>
</body>

</html>
