<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="passportcss.css"/>
    </head>

    <body>
        <?php
            session_start();
            $uname=$_SESSION["uname"];
            $pass=$_SESSION["pass"];
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
        <p class="header">Registration</p>
        <form method="POST" class="table">
            <table cellpadding="5px" border="0" class="table">
                <tr><th colspan="3">General Details</th></tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><input type="text" name="fullname"/></td>
                </tr>
                <tr>
                    <td>DOB</td>
                    <td>:</td>
                    <td><input type="date" name="dob"/></td>
                </tr>
                <tr>
                    <td>Email ID</td>
                    <td>:</td>
                    <td><input type="text" name="email"/></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="gen" value="M"/>Male
                        <input type="radio" name="gen" value="F"/>Female
                        <input type="radio" name="gen" value="N"/>Other
                    </td>
                </tr>
                <tr>
                    <td>Marital Status</td>
                    <td>:</td>
                    <td>
                        <select name="marstat">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Separated">Separated</option>
                            <option value="Widow/Widower">Widow/Widower</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Permanent Address</td>
                    <td>:</td>
                    <td><textarea rows="5" cols="20" name="address" placeholder="Enter address here"></textarea></td>
                </tr>
                <tr>
                    <td>District</td>
                    <td>:</td>
                    <td><input type="text" name="district" ></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td>:</td>
                    <td><input type="text" name="state"/></td>
                </tr>
                <tr>
                    <td>Police Station</td>
                    <td>:</td>
                    <td><input type="text" name="po"/></td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td>:</td>
                    <td><input type="number" name="mob"/></td>
                </tr>   
                <tr>
                    <td>Father's Name</td>
                    <td>:</td>
                    <td><input type="text" name="father"/></td>
                </tr>
                <tr>
                    <td>Mother's Name</td>
                    <td>:</td>
                    <td><input type="text" name="mother"/></td>
                </tr>
                <tr><th colspan="3"></th></tr>
                <tr><th colspan="3">Emergency Contact Details</th></tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><input type="text" name="emname"/></td>
                </tr>
                <tr>
                    <td>Permanent Address</td>
                    <td>:</td>
                    <td><textarea rows="5" cols="20" name="emaddress" placeholder="Enter address here"></textarea></td>
                </tr>
                
                <tr>
                    <td>Mobile Number</td>
                    <td>:</td>
                    <td><input type="number" name="emmob"/></td>
                </tr> 
                <tr>
                    <td>Email ID</td>
                    <td>:</td>
                    <td><input type="text" name="ememail"/></td>
                </tr>
                <tr>
                    <th colspan="3"><input type="submit" name="sub"/></th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>
            
        <?php
            echo "Username is ".$uname;
            echo "<br>";
            echo "Password is ".$pass;
            if(isset($_POST["sub"]) && isset($_POST["gen"]))
            {
                $name=$_POST["fullname"];
                $dob=$_POST["dob"];
                $email=$_POST["email"];
                $gen=$_POST["gen"];
                $marstat=$_POST["marstat"];
                $address=$_POST["address"];
                $distr=$_POST["district"];
                $state=$_POST["state"];
                $ps=$_POST["po"];
                $mob=$_POST["mob"];
                $fath=$_POST["father"];
                $moth=$_POST["mother"];
                $emname=$_POST["emname"];
                $emaddr=$_POST["emaddress"];
                $emmob=$_POST["emmob"];
                $ememail=$_POST["ememail"];
                echo "<br><BR>$name<br>$dob<br>$email<br>$gen<br>$marstat<br>$address<br>$distr<br>$state";
                echo "<br>$ps<br>$mob<br>$fath<br>$moth<br>$emname<br>$emaddr<br>$emmob<br>$ememail";
                $conn=mysqli_connect("localhost","root","","passport");
                if(!$conn)
                {
                    die("Connection was not possible");
                }
                $sql="select * from registration where username='$uname' or email='$email' or mobile='$mob';";
                $res=$conn->query($sql);
                $count=0;
                while($row=$res->fetch_assoc())
                {
                    $count=1;
                }
                if($count==0)
                {
                    echo "<script>
                            var str='<div class=\"total\">Registration was successful!!!';
                            str+='<br><a href=\"confirmpage.php\"><input type=\"button\" value=\"Next\"/></a></div>';
                            document.getElementsByTagName('body')[0].innerHTML=str;
                        </script>";
                    $_SESSION["fullname"]=$name;
                    $_SESSION["dob"]=$dob;
                    $_SESSION["email"]=$email;
                    $_SESSION["gen"]=$gen;
                    $_SESSION["marstat"]=$marstat;
                    $_SESSION["address"]=$address;
                    $_SESSION["district"]=$distr;
                    $_SESSION["state"]=$state;
                    $_SESSION["po"]=$ps;
                    $_SESSION["mob"]=$mob;
                    $_SESSION["father"]=$fath;
                    $_SESSION["mother"]=$moth;
                    $_SESSION["emname"]=$emname;
                    $_SESSION["emaddress"]=$emaddr;
                    $_SESSION["emmob"]=$emmob;
                    $_SESSION["ememail"]=$ememail;
                }
                else
                {
                    echo "<script>
                            var str='<div class=\"total\">You are using details that have already been taken up by another customer. Please try again...';
                            str+='<br><a href=\"registerpage.php\"><input type=\"button\" value=\"OK\"/></a></div>';
                            document.getElementsByTagName('body')[0].innerHTML=str;
                        </script>";
                }
            }
            
        ?>
    </body>
</html>