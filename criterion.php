<?php


$servername = "localhost";
$username = "test";
$password = "test";
$dbname = "coa123cdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);


$sortByGoldQuery = "SELECT  country.iso_id, country.country_name, gold, COUNT(DISTINCT cyclist.cyclist_id) AS cyclistCount,
AVG(DATEDIFF('2012-07-27', cyclist.dob) / 365) AS avgAge
FROM country LEFT JOIN cyclist ON cyclist.iso_id = country.iso_id 
GROUP BY country.iso_id, country.country_name 
ORDER BY country_name ASC;";
$sortByGoldResult = mysqli_query($conn, $sortByGoldQuery);

if (mysqli_num_rows($sortByGoldResult) > 0) {
    $allDataArrayBig = array();
    while ($row = mysqli_fetch_array($sortByGoldResult, MYSQLI_ASSOC)) {
        $allDataArrayBig[] = $row;
    }


}
echo json_encode($allDataArrayBig);
mysqli_close($conn);

?>