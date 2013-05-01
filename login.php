	<?php 

// 	if(isset($_REQUEST['username']) and isset($_REQUEST['password'])){
// 		$user = $_REQUEST['username'];
// 		$pass = $_REQUEST['password'];
// 		authenticateUser($user, $pass);
// 		$to = $_REQUEST['email'];
// 		$subject = "foo";
// 		$message = "bar";
// 		$from = "jvillars19@gmail.com";
// 		mail($to, $subject, $message, $headers);
// 		echo "Please check your email.";

// 	}else{
// 		echo "an error occurred, please go back";
// 	}
// function authenticateUser()
	?>

    <?php
    // include the hashing class
    // require ("resources/phpass/PasswordHash.php");

    // if the user has submitted the form
    if(isset($_POST['submit'])){

    // protect the posted value then store them to variables
    $email = protect($_REQUEST['email']);
    $password = protect($_REQUEST['password']);

    //// setup header
    //include "resources/php/header.php";

    //select all rows from the table where the username matches the one entered by the user
    $res = mysql_query("SELECT * FROM `users` WHERE `email` = '".$email."'");
    $num = mysql_num_rows($res);

    // setup display area
    echo '<div class="c13"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="69%" align="left">';

        //check if there was not a match
        if($num == 0){
            //if not display an error message
            ?>

            <p>The <b>e-mail address</b> you have supplied does not exist in our database!</p>
            <ul>
                <li><a href="index.php">Try again</a></li>
                <li><a href="register.php">Register a new account</a></li>
            </ul>
            <!-- // close display area -->
            </tr></td></table></div>
                <?php
            // setup footer
            include "footer.php";
            exit;

        }else { //if there was continue checking

        //select all rows where the username and password match the ones submitted by the user
        $res = mysql_query("SELECT * FROM `users` WHERE `email` = '".$email."' AND `password` = '".$password."'");
        $num = mysql_num_rows($res);
        //check if there was not a match
            if($num == 0){
                //if not display error message
                ?>
                <p>The <b>password</b> you supplied does not match the one for that e-mail address in our database!</p>
                <ul>
                    <li><a href="index.php">Try again</a></li>
                    <li><a href="register.php">Register a new account</li>
                </ul>
                <!--// close display area-->
                </tr></td></table></div>

                <?php
                // setup footer
                include "footer.php";
                exit;
            }
        }
    }else{ //post was unsuccessful
        echo '<p>an error occurred</p>
                <ul>
                    <li><a href="index.php">Try again</a></li>
                    <li><a href="register.php">Register a new account</li>
                </ul>';
    }
    ?>


</body>

</html>

