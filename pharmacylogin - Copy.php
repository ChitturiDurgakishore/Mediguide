<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
           body{
                background-image: url(bg.jpeg);
            }
            .wholepage{
                border: 3px solid black;
                margin: 5px;
            }
            h1{
                margin: 30px;
                background-color: chartreuse;
                border: 5px solid black;
                width: fit-content;
                padding: 20px;
                 font-style: italic;
                 border-radius: 20px;
            }
            h3{
                background-color: rgb(7, 6, 6);
                color: palevioletred;
                width: fit-content;
                border: 3px solid black;
                border-radius: 10px;
                padding:10px;
                margin:30px;
            }
            input{
                margin: 18px;
                position: relative;
                padding: 5px;
            }

            .registerbutton{
                padding: 10px;
                margin: 10px;
                background-color: rgba(91, 202, 13, 0.79);
                color: black;
                border-radius: 30px;

            }
            .registerbutton:hover{
                transition: 0.5s ease-in-out;
                background-color:rgb(106, 248, 18);
                padding:15px;

            }
            .registerbutton:not(:hover){
                 transition: 0.5s ease-in-out;
            }

            button{
                padding: 10px;
                margin: 20px;
                background-color: orange;
                color: black;
                border-radius: 30px;

            }
            button:hover{
                transition: 0.5s ease-in-out;
                background-color:orangered;
                padding:15px;

            }
            button:not(:hover){
                 transition: 0.5s ease-in-out;
            }
            .container{
                width:max-content;
                height: max-content;
                padding: 10px;
                background-color: khaki;
                border: 4px solid black;
                border-radius: 20px;
                margin: 10px;
            }
            
        </style>

<body>
    <div class="wholepage">
    
        <center>
            <div>
                <h1>MEDI-GUIDE</h1>
                
            </div>
            <div class="container">
            <h3>PHARMACY LOGIN</h3>
                <form method="post" action="">
                    <div>
                        EMAIL<input type="email" name="email" required>
                    </div>
                    <div>
                        PHARMACYNAME<input type="text" name="name" required>
                    </div>
                    <div>
                        PASSWORD<input type="password" name="password" required>
                    </div>
                    <span>
                        <button type="submit" name="submit">SUBMIT</button>
                        <button type="reset" name="clear" onclick="window.location.href='pharmacylogin.php'">CLEAR</button>
                    </span>
                    <?php
                    session_start();

                    if (isset($_POST['submit'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $pharmacyname=$_POST['name'];
                        $_SESSION['pharmacyname']=$pharmacyname;
                       
                        

                        $conn = new mysqli("localhost", "root", "", "mediguide");
                        $sql = "SELECT * FROM pharmacyregistration WHERE email = ? AND password = ? AND pharmacyname=?";
                        $ps = $conn->prepare($sql);
                        $ps->bind_param("sss", $email, $password , $pharmacyname);
                        $ps->execute();
                        $result = $ps->get_result();

                        if ($result->num_rows == 1) {
                            $row = $result->fetch_assoc();
                            $phoneno = $row['phoneno']; 
                            

                            echo "<br>LOGIN SUCCESSFUL";
                            header("Location:pharmacyhome.php");
                        } else {
                            echo "<br>INVALID PASSWORD OR USERNAME";
                        }
                    }
                    ?>
                </form>
                <div>
                    <p>Don't have an account?</p>
                </div>
                <div>
                    <button onclick="window.location.href='pharmacyregister.php'" class="registerbutton">REGISTRATION</button>
                </div>
            </div>
        </center>
        
    </div>
</body>
