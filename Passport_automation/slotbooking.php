<html>
    <head>
        <title>Slot Booking</title>
        <link rel="stylesheet" href="passportcss.css"/>
    </head>
    <body>
        <?php
            session_start();
            $uname=$_SESSION["uname"];
        ?>
        <div class="navbar">
            Passport Automation Website
            <table class="navtab">
                <tr>
                    <td width="50"><a href="loginpage.html"><img src="left.png" width="50" /></a></td>
                    <th>Home</th>
                    <th>About</th>
                </tr>
            </table>
        </div>
        <p class="header">Slot Booking</p>
        <form method="POST" class="total">
            <table class="table">
                <tr>
                    <td>Select Your Preferred Day</td>
                    <td>:</td>
                    <td><input type="date" name="date"/></td>
                </tr>
                <tr>
                    <td>Enter Your Preferred Time</td>
                    <td>:</td>
                    <td><input type="time" name="time"/></td>
                </tr>
                <tr>
                    <td>Enter Your Preferred Place of Appointment</td>
                    <td>:</td>
                    <td><input type="text" name="place"/></td>
                </tr>
                <tr>
                    <th colspan="3"><input type='submit' name='sub'/></th>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST["sub"]))
            {
                $date=$_POST["date"];
                $time=$_POST["time"];
                $place=$_POST["place"];
                $conn=mysqli_connect("localhost","root","","passport");
                if(!$conn)
                {
                    die("Connection unsuccessful");
                }
                $sql="insert into slotdetails values('$uname','$date','$time','$place');";
                $res=$conn->query($sql);
                header("Location: final.html");
            }
        ?>
    </body>
</html>