<html>
    <head>
        <title>Sign in</title>
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
            <table cellspacing="10" id="full" class="full">
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="uname"/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="pass"/></td>
                </tr>
                <tr>
                    <th colspan="3"><input type="submit"/></th>
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
                {
                    die("Connection failed");
                }
                $sql="select * from accounts where username='$uname';";
                $res=$conn->query($sql);
                $check=0;
                while($row=$res->fetch_assoc())
                {
                    if($row["password"]==$pass)
                    {
                        $check=1;
                    }
                }
                if($check==1)
                {
                    session_start();
                    $_SESSION["uname"]=$uname;
                    $_SESSION["pass"]=$pass;
                    echo "<script>
                            document.getElementById('full').innerHTML=
                                '<tr><td id=\"par1\"></td></tr><tr><td id=\"par2\"></td></tr>';";
                    
                    echo "document.getElementById('par1').innerHTML=
                                'You have successfully logged in!';";
                        
                    echo "document.getElementById('par2').innerHTML=
                                '<a href=\"registerpage.php\"><input type=\"button\" value=\"Next\"/></a>';</script>";
                }
                else
                {
                    echo "<script>
                            document.getElementById('full').innerHTML=
                                '<tr><td id=\"par1\"></td></tr><tr><td id=\"par2\"></td></tr>';";
                    
                    echo "document.getElementById('par1').innerHTML=
                            'The entered values are invalid. Please try again...';";
                    echo "document.getElementById('par2').innerHTML=
                            '<a href=\"signin.php\"><input type=\"button\" value=\"OK\"/></a>';</script>";
                }
            }
        ?>

    </body>
</html>