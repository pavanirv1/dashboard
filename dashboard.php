<?php
header('Access-Control-Allow-Origin: *');
if($_POST["submit"] && $_POST["submit"]=="Submit") {
    if ($_POST["newName"] != "" && $_POST["newAmt"] != "" && $_POST["newDate"] != "") {
        echo "New Entry Submitted...";
        $oldSeedData = file_get_contents('seedData.txt');
        $newJSONEntry = "[{\"name\":\"".$_POST['newName']."\",\"amount\":".$_POST["newAmt"].",\"date\":\"".$_POST["newDate"]."\"}]";
        $newSeedData = json_encode(array_merge(json_decode($oldSeedData), json_decode($newJSONEntry)));

        if($newSeedData!="" && $newSeedData!=null) {
            $fp = fopen('seedData.txt', 'w');
            fwrite($fp, $newSeedData);
            fclose($fp);
        }

    } else {
        echo "Please Enter All values for a new Entry.<br>";
        echo "<input type='button' value='Back' onclick=\"location.href='dashboard.php';\">";
//        echo "<input type='button' value='Back' onclick='javascript:history.go(-1)'>";
        exit();
    }
}
echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/vis/4.19.1/vis.min.js\"></script>
    <script src=\"https://code.jquery.com/jquery-2.2.4.js\"></script>
    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js\"></script>
    <script src=\"//code.jquery.com/jquery-1.12.4.js\"></script>
    <script src=\"https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js\"></script>
  <link href=\"https://cdnjs.cloudflare.com/ajax/libs/vis/4.19.1/vis.min.css\" rel=\"stylesheet\" type=\"text/css\" />
  <link href=\"https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css\" rel=\"stylesheet\" type=\"text/css\" 
  />";
echo "<link rel='stylesheet' href='dashboard.css' type='text/css'>";


echo "<form id='mainForm' name='mainForm' method='POST' onsubmit='return validateForm()'>";
echo "<div id=\"newEntry\">";
echo "<h1>Dashboard</h1>";
echo "<h2>Add New Entry: </h2>";
echo "<br>";
echo "<input name='newName' placeholder='Enter New Name' type='text'>&nbsp";
echo "<input name='newAmt' placeholder='Enter New Amount' type=''>&nbsp";
echo "<input name='newDate' placeholder='Date' type='date'>&nbsp";
echo "<input type='submit' name='submit' value='Submit'> ";
echo "</div>";
echo "</form>";
echo "<br>";
echo "<div id=\"visualization\">";
echo "<input type='button' name='reset' id='reset' value='Reset'> ";
echo "<br>";
//echo "<p>Click on the chart to hide/show text.</p>";
echo "</div>";
echo "<br>";
echo "
<div id='allTablesDiv'>
<div id=\"visualTable\">
<h2>Monthly Table: </h2>
<table id='dataTable'></table>";
echo"</div>";
echo "<br>";
echo "
<div id=\"visualFullTable\">
<h2>Full Table: </h2>
<table id='dataFullTable'></table>";
echo"</div></div>";
echo "<br>";
echo "<script src='dashboard.js'></script>";
