<?php
session_start();
if(!array_key_exists('currentId',$_SESSION)) {
    header("Location: 1-loginpage.php");
}if(!array_key_exists('num-app',$_SESSION)) {
    header("Location: procedure-1.php");
} if(!array_key_exists('procedure-start',$_SESSION)) {
    header("Location: procedure-1.php");
}
?>

<html>

    <head>
    
        <title>Appraisers</title>
    
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="../style.css">
        
        <script type="text/javascript" src="../jquery.min.js"></script>
        
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        
        
        
        <style type="text/css">
            
            .container{
                
                text-align: center;
                background-color: #e0e5e1;
                margin-left: 25%;
                margin-right: 25%;
                width: 50%;
                margin-top: 50px;
                border: 1px solid black;
                border-radius: 10px;
                font-family: sans-serif;
                margin-bottom: 10px;
                
            } h1{
                
                margin: 20px;
                
            } .form-control{
                
                margin-left: 15%;
                margin-right: 15%;
                width: 70%;
                margin-top: 20px;
                margin-bottom: 20px;
                
            } #jquery-errors{
                
                display: none;
                margin-left: 15%;
                margin-right: 15%;
                width: 70%;
                
            }
            
        </style>
        
    </head>
    
    <body>
    
        <div class="container text-center" id="secondary-container">
            
            <h1>Attribute R&amp;R Study</h1> 
            <div class="alert " role="alert">
                <b>
                Please enter the true values for all the parts. 1(true) value indicates that the parth is valid and 0(false) indicates the the part is not valid
                </b>
            </div>
                
        </div>
            <select name="" id="">
            <option value="none" selected disabled hidden>
                Select an Option
            </option>
            <option value="0">0</option>
            <option value="1">1</option>
            </select> 
        
        <script type="text/javascript">
        
            
        </script>
    
    </body>


</html>