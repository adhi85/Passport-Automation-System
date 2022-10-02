<html>
    <head>
        <title>Confirmation</title>
        <link rel="stylesheet" href="passportcss.css"/>
    </head>
    <body>
        <?php
            session_start();
            $uname=$_SESSION["uname"];
            $pass=$_SESSION["pass"];
            $name=$_SESSION["fullname"];
            $dob=$_SESSION["dob"];
            $email=$_SESSION["email"];
            $gen=$_SESSION["gen"];
            $marstat=$_SESSION["marstat"];
            $address=$_SESSION["address"];
            $distr=$_SESSION["district"];
            $state=$_SESSION["state"];
            $ps=$_SESSION["po"];
            $mob=$_SESSION["mob"];
            $fath=$_SESSION["father"];
            $moth=$_SESSION["mother"];
            $emname=$_SESSION["emname"];
            $emaddr=$_SESSION["emaddress"];
            $emmob=$_SESSION["emmob"];
            $ememail=$_SESSION["ememail"];
        ?>
        <div class="navbar">
            Passport Automation Website
            <table class="navtab">
                <tr>
                    <td width="50"><a href="registerpage.php"><img src="left.png" width="50" /></a></td>
                    <th>Home</th>
                    <th>About</th>
                </tr>
            </table>
        </div>
        <p class="header">Confirm</p>
        <?php
        echo "<table bgcolor='#CCCCFF' width='100%' cellpadding='5' border='1' cellspacing='0' class='table1'>
            <colgroup>
                <col width='50%' style='background-color:#193655'>
                <col style='background-color:#375576'>
            </colgroup>
            <tr><th colspan='3' bgcolor='#16477c' style='color:white;'>Applicant details</th></tr>
            <tr><td>Username</td><td>$uname</td></tr>
            <tr><td>Name</td><td>$name</td></tr>
            <tr><td>DOB</td><td>$dob</td></tr>
            <tr><td>Email</td><td>$email</td></tr>
            <tr><td>Gender</td><td>$gen</td></tr>
            <tr><td>Address</td><td>$address</td></tr>
            <tr><td>District</td><td>$distr</td></tr>
            <tr><td>State</td><td>$state</td></tr>
            <tr><td>Police Station</td><td>$ps</td></tr>
            <tr><td>Mobile Number</td><td>$mob</td></tr>    
            <tr><td>Father's Name</td><td>$fath</td></tr>
            <tr><td>Mother's Name</td><td>$moth</td></tr></table>
            <br>
            <table bgcolor='#CCCCFF' cellpadding='5' border='1' cellspacing='0' class='table1' width='100%'>
            <colgroup>
                <col width='50%' style='background-color:#193655'>
                <col style='background-color:#375576'>
            </colgroup>
            <tr><th colspan='3' bgcolor='#16477c' style='color:white;'>Emergency contacts</th></tr>
            <tr><td>Name</td><td>$emname</td></tr>
            <tr><td>Address</td><td>$emaddr</td></tr>
            <tr><td>Mobile Number</td><td>$emmob</td></tr>
            <tr><td>Email</td><td>$ememail</td></tr></table>";

        echo "<br><br><form method='POST'><center>
                <input type=\"submit\" name=\"confirmed\" value=\"I confirm the given details are correct\"/>
                <a href='registerpage.php'><input type=\"button\" value=\"No, I want to go back\"/>
                    </a></center></form>";

        if(isset($_POST["confirmed"]))
        {
            echo "<br><br>Yes...";
            $conn=mysqli_connect("localhost","root","","passport");
                if(!$conn)
                {
                    die("Connection was not possible");
                }
            $sql="insert into registration values('$uname','$name','$dob','$email','$gen','$marstat','$address',
                        '$distr','$state','$ps',$mob,'$fath','$moth');";
            $res=$conn->query($sql);
            $sql="insert into emergency_contact values('$uname','$emname','$emaddr',$emmob,'$ememail');";
            $res=$conn->query($sql);
            header("Location: payment.php");
        }
        ?>
    </body>
</html>