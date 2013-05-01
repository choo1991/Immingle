<?php
include "header.php";
?>
<div class="column">
    <h1>Immingle</h1>
    <p>
        <strong>Hipster ipsum</strong> Ennui whatever messenger bag seitan ethical next level. Authentic fingerstache dreamcatcher wolf. Blue bottle post-ironic narwhal +1 disrupt thundercats marfa, echo park sriracha lo-fi photo booth. Mixtape single-origin coffee beard chambray. Literally fanny pack ethnic, mustache terry richardson jean shorts freegan mlkshk.
    </p>
    <div>
        <img id= "cover" src='http://speaktomeevents.files.wordpress.com/2013/03/la-oe-ling-gangnam-style-20121012-001.jpg' alt = 'welcome' />
    </div>
</div>
<div class="column">
    <div class = "box">
        <h2>Log in</h2>
        <form action = "login.php">
            <label for="username">Username or Email:</label><br>
            <input type="text" name = "username"><br>
            <label for="password">Password: </label> <br>
            <input type ="password" name ="password"><br>
            <input type="checkbox" name ="remember" value="remember">
            <label class="small" for="remember">Remember me</label>
            <input type="submit" value= "Submit">
        </form>
    </div>
    <div class = "box">
        <h2>Join</h2>
        <form action = "register.php">
            <label for="username">Email address:</label> <br>
            <input type="email" name = "email"><br>
            <input type="checkbox" name ="tos" value="tos">
            <label class="small" for="tos">I agree to Immingle's term's of service</label>
            <input type="submit" value= "Submit">
        </form>
    </div>
</div>
<?php
    include "footer.php";
?>