<html>
    <head>
        <title>Sign up</title>
        <link rel="stylesheet" href="passportcss.css"/>
    </head>
    <body>
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
        
        <form method="POST" class="total">
            <table id="full" cellspacing="10" class="full">
                <tr>
                    <td>Choose a Username</td>
                    <td>:</td>
                    <td><input type="text" name="uname"/></td>
                </tr>
                <tr>
                    <td>Choose a Password</td>
                    <td>:</td>
                    <td><input type="password" name="pass"/></td>
                </tr>
                <tr>
                    <th colspan="3"><input type="submit"/></th>
                </tr>
                <tr>
                    <th colspan="3"><p id="par1"></p><p id="par2"></p></th>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST["uname"]) && isset($_POST["pass"]))
            {
                $uname=$_POST["uname"];
                $pass=$_POST["pass"];
                $conn=mysqli_connect("localhost","root","","passport");
                if(!$conn)
                    die("Connection failed");
                $sql="select * from accounts where username='$uname';";
                $res=$conn->query($sql);
                $count=0;
                while($row=$res->fetch_assoc() && $count!=1)
                {
                    $count=1;
                }
                if($count==0)
                {   session_start();
                    $_SESSION["uname"]=$uname;
                    $_SESSION["pass"]=$pass;
                    echo "<script>document.getElementById('full').innerHTML=
                            '<tr><td id=\"par1\"></td></tr><tr><td id=\"par2\"></td></tr>';";
                    echo "document.getElementById('par1').innerHTML=
                        'This username is available. User Account has been created.';";

                    echo "document.getElementById('par2').innerHTML=
                        '<form><a href=\"registerpage.php\"><input type=\"button\" value=\"Next\"/></a></form>';</script>";
                    
                    $sql="insert into accounts values('$uname','$pass');";
                    $res=$conn->query($sql);
                }
                else
                {
                    echo "<script>document.getElementById('full').innerHTML=
                            '<tr><td id=\"par1\"></td></tr><tr><td id=\"par2\"></td></tr>';";
                    echo "document.getElementById('par1').innerHTML=
                        'This username is already taken. Please choose a different username.';";

                    echo "document.getElementById('par2').innerHTML=
                        '<form><a href=\"signup.php\"><input type=\"button\" value=\"OK\"/></a></form>';</script>";
            
                }
            }
        ?>
    </body>
</html>