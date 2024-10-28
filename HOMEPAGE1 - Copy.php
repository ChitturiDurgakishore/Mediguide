<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medi-Guide</title>
    <style>
        body{
            background-image:url(bg.jpeg);
            overflow: hidden;
        }
        h1{
            text-align: center;
    margin: 15px;
    color:chartreuse;
    background-color: rgb(7, 6, 6);
    width: fit-content;
    padding: 20px;
    font-style: italic;
    border-radius: 20px;
        }
        button.pharmacy{
    padding: 10px;
    margin:20px;
    border-radius: 30px;
    border-width: 5px;
    border-color: rgb(251, 255, 248);
    background-color: chartreuse;
    cursor: pointer;
    
   
}
button.customer{
    padding:10px;
    margin: 20px;
    border-radius: 30px;
    border-width: 5px;
    border-color: rgb(246, 246, 243);
    background-color: orange;
    cursor: pointer;
}


button.pharmacy:hover{
    transition: 0.5s ease-out;
    background-color: rgb(9, 249, 9);
    padding: 15px;
    box-shadow: 0 0 20px;
    border-color: rgb(8, 8, 8);
}
button.pharmacy:not(:hover){
 transition: 0.5s ease-in-out;
}

button.customer:hover{
    transition: 0.5s ease-out;
    background-color: rgb(9, 249, 9);
    padding: 15px;
    box-shadow: 0 0 20px;
    border-color: rgb(8, 8, 8);
}
button.customer:not(:hover){
 transition: 0.5s ease-in-out;
}

button.customer:hover{
    transition: 0.5s;
    background-color: rgb(238, 139, 9);
    padding: 15px;
    box-shadow: 0 0 20px;
}

img{
    width:170px;
    height:170px;
    border-radius:20px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top:20px;
    margin-bottom:20px;
    cursor:pointer;
}
img:hover{
    width:250px;
    height:250px;
    transition:ease-in-out 1s;
}
img:not(:hover){
    transition: ease-in-out 1s;
}
.scrollimages{
    width: 800px;
    height:200px;
    border:3px solid black;
    align-items: center;
    padding:10px;
    margin:10px;
    background-color: darksalmon;
    cursor: pointer;
}


.container2{
    width:fit-content;
    height: fit-content;
   
    
    margin:20px;
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
</head>
<body>


    <center>
    <div class="wholecontainer">
    <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <h1>MEDI-GUIDE</h1>
        <div class="scrollimages">
        <marquee behavior="bounce" scrollamount="10"><div class="container1">
          <span>
            <img src="story1.jpeg">
            <img src="story2.jpeg">    
            <img src="story3.jpeg">
            <img src="story4.jpeg">
            <img src="story5.jpeg">
            <img src="story6.jpeg">   
           </span>
        </div>
          
        </div></marquee>
        <div class="container2">
         <button class="pharmacy" onclick="window.location.href='pharmacyregister.php'">PHARMACY REGISTRATION </button>
         <button class="pharmacy" onclick="window.location.href='pharmacylogin.php'">PHARMACY LOGIN</button>
        </div>
        <div class="container3">
        
        <button class="customer" onclick="window.location.href='userhome2.php'">CUSTOMER REGISTRATION</button>
        <button class="customer" onclick="window.location.href='userhome2.php'">CUSTOMER LOGIN</button>
        </div>
    </div>
    </center>
</div>  
</body>
</html>