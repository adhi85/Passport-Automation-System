<html>
    <head>
        <title>Payment</title>
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
                    <td width="50"><a href="registerpage.php"><img src="left.png" width="50" /></a></td>
                    <th>Home</th>
                    <th>About</th>
                </tr>
            </table>
        </div>
        <p class="header">Payment</p>
        <form method="POST" class="total">
            <table class="table">
                <tr>
                    <td>Card Number</td>
                    <td>:</td>
                    <td><input type="number" name="cardnum"/></td>
                </tr>
                <tr>
                    <td>Time of Expiry</td>
                    <td>:</td>
                    <td><input type="text" name="expiry"/></td>
                </tr>
                <tr>
                    <td>CVV</td>
                    <td>:</td>
                    <td><input type="password" name="cvv"/></td>
                </tr>
                <tr>
                    <td>Name on card</td>
                    <td>:</td>
                    <td><input type="text" name="cardname"/></td>
                </tr>
                <tr>
                    <th colspan="3"><input type="submit" name="sub" value="Make Payment"/></th>
                </tr>
            </table>
        </form>
        <?php
            $websitecardnum=1010323254547676;
            if(isset($_POST["sub"]))
            {
                $cardnum=$_POST["cardnum"];
                $expiry=$_POST["expiry"];
                $cvv=$_POST["cvv"];
                $cardname=$_POST["cardname"];
                $conn=mysqli_connect("localhost","root","","bank");
                if(!$conn)
                {
                    die("Connection unsuccessful!");
                }
                $sql="select * from bankaccounts where 
                    card_number=$cardnum and expiry_m_y='$expiry' and cvv='$cvv' and name_on_card='$cardname' and balance>=1500;";
                $res=$conn->query($sql);
                $count=0;
                while($row=$res->fetch_assoc())
                {
                    $count+=1;
                }
                if($count==0)
                {
                    echo "<script>alert('Unsuccessful!');</script>";
                }
                else
                {/*
                    $to="vishweshak070902@gmail.com";
                    $subject="Passport Verification";
                    $msg="112212 this is OTP :)";
                    $headers.='From: ananthakrishnan20bcs7@iiitkottayam.ac.in';
                    echo "<script>alert('Successful!  $to');</script>";
                    $retval=mail($to,$subject,$msg,$headers);
                    if( $retval == true ) 
                    {
                        echo "Message sent successfully...";
                    }
                    else
                    {
                        echo "Message could not be sent...";
                    }*/
                    $sql="update bankaccounts set balance=balance-1500 where card_number=$cardnum;";
                    $res=$conn->query($sql);
                    $sql="update bankaccounts set balance=balance+1500 where card_number=$websitecardnum;";
                    $res=$conn->query($sql);
                    echo "<div class='total'>Payment Successful!!!<br>";
                    echo "<a href='slotbooking.php'><input type='button' value='Next'/></a></div>";
                }
            }
        ?>
    </body>
</html>