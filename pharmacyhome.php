<html>
    <head>
        <title>HOME PAGE</title>
        <style>
          body{
            background-image: url(bg.jpeg); 
            border: 4px solid black; 
            padding: 30px;   
            
          }
          h1{
                margin: 30px;
                color:black;
                background-color: chartreuse;
                width: fit-content;
                padding: 20px;
                 font-style: italic;
                 border-radius: 20px;
                 border: 3px solid black;
            }
            h4{
              color: palevioletred;
                background-color: rgb(7, 6, 6);
                
                width: fit-content;
                border: 3px solid black;
                border-radius: 10px;
                padding:10px;
                margin:30px;
            }
            p{
              font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
          .wholepage{
            display: flex;
            margin:10px;
            padding: 10px;
            
          }
          .wholecontainer{
          
            width: fit-content;
            background-color: transparent;
            border:3px solid black;
            border-radius: 20px;
            margin: 30px;
            padding: 20px;
          }
          .container1{
            display: flex;
            
            width:fit-content;
            height: fit-content;
            background-color:khaki ;
            align-content: center;
            margin: 70px;
            padding: 90px;
            border: 2px solid black;
          }
          .container1:hover{
            background-color:darksalmon;
            transition: 0.5s ease-in-out;
          }
          .container1:not(:hover){
            transition: 0.5s ease-in-out;
          }
          .container2{
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 30px;
          }

          .btn1{
            margin-top: 80px;
          }
          p{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
          }
          button{
                padding: 10px;
                margin: 20px;
                background-color: orange;
                color: black;
                border-radius: 30px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: larger;
                border-color: greenyellow;
            }
            button:hover{
                transition: 0.5s ease-in-out;
                background-color:orangered;
                padding:15px;
                
                border: 5px solid black;
            }
            button:not(:hover){
                 transition: 0.5s ease-in-out;
            }
            .bubbles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
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
    </head>
    <body>
    
        <div class="wholepage">
        
        <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="container2">
                <div><button class="btn1" onclick="window.location.href='pharmacydataentry.php'">DATA ENTRY</button></div>
                <div><button onclick="window.location.href='pharmacydatamodify.php'">DATA MODIFY</button></div>
                <div><button onclick="window.location.href='pharmacyexceldata.php'">DATA THROUGH EXCEL</button></div>
                <div><button onclick="window.location.href='pharmacydata.php'">INVENTORY</button></div>
            </div>
            
            
                
            <center><h1>MEDI-GUIDE</h1>
                <NAV class="container1">
                
                    <p><i>MEDIGUIDE helps you to digitize your pharmacy.<br><br>
                    Whenever you want to check whether the medicine is available in your store.<br> 
                    You no longer need to search it in the shelves.<br>
                    You can go to our website to check the availability of the medicine.</i></p>
                </NAV>
                </center>
            
        </div>
    </body>
</html>
