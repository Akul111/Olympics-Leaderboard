<?php


$country_1 = $_GET['country_1'];
$country_2 =$_GET['country_2'];




$servername = "localhost";
$username = "test";
$password = "test";
$dbname = "coa123cdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sqlQuery = "SELECT country.country_name, cyclist.name, SUM(gold), SUM(silver),SUM(bronze),total,country.iso_id
FROM country INNER JOIN cyclist ON country.iso_id = cyclist.iso_id
WHERE country.iso_id = '$country_1' or country.iso_id = '$country_2'
GROUP BY country.iso_id, country.country_name, cyclist.name
ORDER BY country.gold DESC";

$result = mysqli_query($conn, $sqlQuery);

if (mysqli_num_rows($result) > 0){
    echo "<table border = 1>";

    echo "<tr> <td> Country </td> <td>Gold</td> <td>Silver</td> <td>Bronze</td> <td>Total</td> <td>Name</td>";

    $allDataArray = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $allDataArray[] = $row;
    }

    $country_1name = $allDataArray[0]['country_name'];
    $country_2name = '';
    $noOfNameInCountry1 = 0;

    echo "<tr>";
    echo "<td>".$country_1name."</td>";
    echo "<td>".$allDataArray[0]['SUM(gold)']."</td>";
    echo "<td>".$allDataArray[0]['SUM(silver)']."</td>";
    echo "<td>".$allDataArray[0]['SUM(bronze)']."</td>";
    echo "<td>".$allDataArray[0]['total']."</td>";
 
    echo "<td>";
    for($i=0; $i<count($allDataArray); $i++){

        if($allDataArray[$i]['country_name'] != $country_1name){
            $country_2name = $allDataArray[$i]['country_name'];
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>".$country_2name."</td>";
            echo "<td>".$allDataArray[$i]['SUM(gold)']."</td>";
            echo "<td>".$allDataArray[$i]['SUM(silver)']."</td>";
            echo "<td>".$allDataArray[$i]['SUM(bronze)']."</td>";
            echo "<td>".$allDataArray[$i]['total']."</td>";
            break;
        }

            echo $allDataArray[$i]['name'].',';
            $noOfNameInCountry1++;
    }


  
    
    echo "<td>";
    for($i=$noOfNameInCountry1; $i<count($allDataArray); $i++){
        echo $allDataArray[$i]['name'].',';
    
    }
    echo "</td>";
    echo "</tr>";

    echo "</table>";
}



mysqli_close($conn);


    ?>