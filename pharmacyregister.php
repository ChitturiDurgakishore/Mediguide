<?php
include 'db_connection.php';
include 'functions.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
            body{
                background-image: url(bg.jpeg);
                
            }
            .wholepage{
                 border: 5px solid black;
                 border-radius: 10px;
                 padding-bottom:700px;
            }
            
            h1{
                margin: 15px;
                color:chartreuse;
                background-color: black;
                width: fit-content;
                padding: 20px;
                 font-style: italic;
                 border-radius: 20px;
            }
            h3{
                background-color:darksalmon;
                color:black;
                width: fit-content;
                border: 3px solid black;
                border-radius: 10px;
                padding:10px;
                margin:10px;
                margin-bottom: 20px;
            }
            input{
                margin: 5px;
                position: relative;
                padding: 5px;
            }
            .loginbutton{
                padding: 10px;
                margin: 10px;
                background-color: rgba(91, 202, 13, 0.79);
                color: black;
                border-radius: 30px;

            }
            .loginbutton:hover{
                transition: 0.5s ease-in-out;
                background-color:rgb(106, 248, 18);
                padding:15px;

            }
            .loginbutton:not(:hover){
                 transition: 0.5s ease-in-out;
            }

            button{
                padding: 10px;
                margin: 10px;
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
            .formpage{
                background-color:khaki;
                width:fit-content;
                height:fit-content;
                padding-top:20px;
                padding-bottom:50px;
                padding-right: 50px;
                padding-left: 50px;
                border: 3px solid black;
                border-radius: 20px;
            }
            .bubbles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.bubble {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color:rgba(128, 128 , 128, 0.5);
    animation: bubble 3s infinite;
}

.bubble:nth-child(1) {
    animation-delay: 0s;
    left: 10%;
}

.bubble:nth-child(2) {
    animation-delay: 0.5s;
    left: 30%;
}

.bubble:nth-child(3) {
    animation-delay: 1s;
    left: 50%;
}

.bubble:nth-child(4) {
    animation-delay: 1.5s;
    left: 70%;
}

.bubble:nth-child(5) {
    animation-delay: 2s;
    left: 90%;
}

@keyframes bubble {
    0% {
        transform: translateY(0);
        opacity: 0;
    }
    100% {
        transform: translateY(-100vh);
        opacity: 1;
    }
}

        </style>

<body>
    <div class="wholepage">
     <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <center>
            
            <div>
                <h1>MEDI-GUIDE</h1>
            </div>
            <div class="formpage">
                <h3>PHARMACY REGISTRATION</h3>
           
            <div class="container">
                <form method="post" action="">
                    <ul>
                    <div>
                    <ol> PHARMACY NAME<input type="text" name="name" required></ol>
                    </div>
                    <div>
                    <ol>PHONE NUMBER<input type="text" name="phoneno" required></ol>
                    </div>
                    <div>
                    <ol>  EMAIL<input type="email" name="email" required></ol>
                    </div>
                    <div>
                    <ol> PASSWORD<input type="password" name="password" required></ol>
                    </div>
                    <div>
                    <ol> CONFIRM PASSWORD<input type="password" name="repassword" required></ol>
                    </div>
                    
                    </ul>
                    <span>
                        <button type="submit" name="submit">SUBMIT</button>
                        <button type="reset" name="clear" onclick="window.location.href='pharmacyregister.php'">CLEAR</button>
                    </span>
                    <?php
                    if (isset($_POST['submit'])) {
                        $username = $_POST['name'];
                        $phoneno = $_POST['phoneno'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $password_confirm = $_POST['repassword'];

                        if (strcmp($password, $password_confirm) === 0) {
                            $sql = "INSERT INTO pharmacyregistration (pharmacyname, phoneno, email, password) VALUES (?, ?, ?, ?)";
                            $ps = $conn->prepare($sql);
                            $ps->bind_param("ssss", $username, $phoneno, $email, $password);
                            $ps->execute();

                            createUserTable($username);

                            echo "<br>REGISTRATION SUCCESSFUL<br>LOGIN NOW";
                        } else {
                            echo "<br>Password does not match";
                        }
                    }
                    ?>
                </form>
                <div></div>
                <p>Already have an account?</p>
                <div>
                    <button onclick="window.location.href='pharmacylogin.php'" class="loginbutton">LOGIN</button>
                </div>
                </div>
            </div>
        </center>
        </div>
        </div>
    </div>
</body>
