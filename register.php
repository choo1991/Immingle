<?php
include 'header.php';
// needs to include forms to submit to login.php
// this form should include an email address and a password field
?>
<script type = "text/javascript" src= "validate.js"/></script>
<h1>Immingle</h1>
<div class = "column">
    <div class = "box">

        <h2>Set-Up Account</h2>
        <form action = "login.php">
            <label for="pass">Password:</label><br>
            <input type ="password" name = "pass"><br>
            <label for="fname">First Name:</label><br>
            <input type = "text" name = "fname"><br>
            <label for= "lname">Last Name:</label><br>
            <input type = "text" name = "lname"><br>
            <label for= "country">Native Country:</label><br>
            <select id= "country">/</select><br>
            <label for="city">Current City:</label><br>
            <input type = "text"><br>
            <label for="language">Primary Language?</label><br>
            <select id= "language"></select><br>
            <div id="blocked">
                <input type="submit" value = "Next">
            </div>

        </form>


    </div>





</div>
<?php
include 'footer.php';
?>



























<?php
include footer.php;
?>