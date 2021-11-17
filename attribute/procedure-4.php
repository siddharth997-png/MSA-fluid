<?php
session_start();
// if(!array_key_exists('currentId',$_SESSION)) {
// //if user has not logged in
//     header("Location: 1-loginpage.php");
// } if(!array_key_exists('num-app',$_SESSION)) {
//     header("Location: procedure-1.php");
// } if(!array_key_exists('procedure-start',$_SESSION)) {
//     header("Location: procedure-1.php");
// }

$numApp = 1;
$numTrials = 1;
$numSamples = 10;

$table = '<table class="table table-bordered table-hover"><thead><tr><th class="wider-column">Trial no.</th><th class="wider-column">Sample no.</th>';
for($i=1;$i<=$numSamples;$i++) {
    $table .= '<th>Sample '.$i.'</th>';
}$table.= '</tr></thead><tbody>';
//i = trials
//j = appraisers
//k = samples
//<!-- a111 = appraiser 1 trial 1 sample 1-->
for($i=1;$i<=$numTrials;$i++) {
    $table .= '<tr><th rowspan="'.$numApp.'">Trial '.$i.'</th>';
    for($j=1;$j<=$numApp;$j++) {
        $table .= '<th>Appraiser '.$j.'</th>';
        for($k=1;$k<=$numSamples;$k++) {
            $table .= '<td>
            <select name="tva'.$j.$i.$k.'" id="idtv1" required>
                <option value="none" selected disabled hidden>
                    Select
                </option>
                <option value="1">Accept</option>
                <option value="0">Reject</option>
            </select> 
            </td>';
        } if($j != $numApp) {
            $table .= '</tr><tr>';
        } else {
            $table .= '</tr>';
        }
    }
} $table .= "</tbody></table>";

$true_values = $_SESSION['vals'];
print_r($true_values);

if(isset($_POST['submit-button'])) {
    echo '<br>';
    print_r($_POST);
    echo '<br>';
    include('../connection.php');
    if(mysqli_connect_error()) {
        die("Connection error");
    }
    $correctness = array();
    $false_accepts = array();
    $false_rejects = array();

    for($i=1;$i<=$numTrials;$i++) {
        for($j=1;$j<=$numApp;$j++) {
            for($k=1;$k<=$numSamples;$k++) {
                if (!array_key_exists(''.$i.$j,$correctness)) {
                    $correctness[''.$i.$j] = 0;
                } if(!array_key_exists(''.$i.$j,$false_rejects)) {
                    $false_rejects[''.$i.$j] = 0;
                } if(!array_key_exists(''.$i.$j,$false_accepts)) {
                    $false_accepts[''.$i.$j] = 0;
                }
                if($true_values[$k] === $_POST["tva".$j.$i.$k]) {
                    $correctness[''.$i.$j] += 1;
                } else if($true_values[$k] === 1 && $_POST["tva".$j.$i.$k] === 0) {
                    $false_rejects[''.$i.$j] += 1;
                } else if($true_values[$k] === 0 && $_POST["tva".$j.$i.$k] === 1) {
                    $false_accepts[''.$i.$j] += 1; 
                }
            }
            $correctness[$i.$j] /= $numSamples;
        }
    }
    echo '<br>cor : ';
    print_r($correctness);
    echo '<br>';
}
    

?>

<html>
    <head>
        <title>Gauge R and R Report</title>

        <link rel="stylesheet" href="../style.css">

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

        <script type="text/javascript" src="../jquery.min.js"></script>

        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <style type="text/css">

            .container-fluid{

                text-align: center;
                margin-left: 5%;
                margin-right: 5%;
                background-color: #e0e5e1;
                width: 90%;
                margin-top: 20px;
                border: 1px solid black;
                border-radius: 10px;
                font-family: sans-serif;
                margin-bottom: 10px;
                float: left;
                overflow: auto;

            } input{

                border:none;
                border-radius: 5px;
                width: 90%;

            } .wider-column{

                width: 120px;

            } h1{

                margin: 10px;

            } #id-submit{

                width: 60%;
                margin-left: 20%;
                margin-right: 20%;
                margin-bottom: 15px;

            } #display-calculations {
                
                display: none;
                
            }

        </style>

    </head>
    <body>
        <div class="container-fluid">
            <h1>Attribute R&amp;R Study</h1>
            <form method="POST" id="input-table" autocomplete="on">
                <?php
                    echo $table;
                ?>
            <input type="submit" class="btn btn-dark" id="id-submit" name="submit-button" value="Next" style="background-color:#1095a2;">
        </div>
    </body>

</html>