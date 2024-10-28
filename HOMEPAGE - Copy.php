<html>
    <head>
        <title>MEDI-GUIDE</title>
        <style>
body{
    background-image: url('bg.jpeg');
    background-attachment: fixed;
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


h1{
    margin: 15px;
    color: palevioletred;
    background-color: rgb(7, 6, 6);
    width: fit-content;
    padding: 20px;
    font-style: italic;
    border-radius: 20px;
    
}


h5{
    background-color: rgb(247, 245, 242);
    padding: 10px;
    width: fit-content;
    border-radius: 10px;
    
}
p{
    margin: 10px;
    
    
    
}
.wholepage{
    border:3px solid black;
    
}

div.container{
    width:fit-content;
    height: 100px;
    background-color: burlywood;
    padding: 10px;
    border: 2px solid rgb(17, 17, 18);
    margin-bottom: 10px;

}
.logo{
    margin: 20px;
    margin-top: 10px;
}
img{
    width:150px;
    height:150px;
    display: flex;
}

        </style>
    </head>
    <body>
        
          <div class="wholepage">
            
            <center>
            
            <h1>MEDI-GUIDE</h1>
           
            <br>
           <MARQUEE> <H5 STYLE="font-size: larger;">Welcome to MEDI-GUIDE</H5></MARQUEE>
            
            <div>
             <span>
                <img src="mediguide1.jpeg">
              <button class="pharmacy" onclick="window.location.href='pharmacyregister.php'">PHARMACY REGISTRATION </button>
              <button class="customer" onclick="window.location.href='customerregister.php'">CUSTOMER REGISTRATION</button>    
             </span>
            </div>
            <div>
             <p>already have an account ?</p>
             <button class="pharmacy" onclick="window.location.href='pharmacylogin.php'">PHARMACY LOGIN</button>
             <button class="customer" onclick="window.location.href='customerlogin.php'">CUSTOMER LOGIN</button>
            </div>
            <div class="container">
             <p><i>MEDIGUIDE IS PLATFORM WHERE YOU CAN FIND ALL THE MEDICINE AVAILABILITY IN YOUR NEARBY MEDICAL SHOPS i.e.PHARMACY STORES.</i></p>
            </div>
          </div>
        </center>
    </body>
</html>