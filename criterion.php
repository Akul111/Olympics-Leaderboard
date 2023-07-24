<?php



$servername = "";
$username = "";
$password = "";
$dbname = "";

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

    // $currentYear = date("Y");
    // $currentMonth = date("m");
    // $currentDay = date("d");

    // for($i =0; $i<count($allDataArrayBig); $i++){
      
    //     if(!empty($allDataArrayBig[$i]['dob'])){
    //         $dob_array = explode('-', $allDataArrayBig[$i]['dob']);
    //         if( $currentMonth<$dob_array[1]){
    //             $allDataArrayBig[$i]['dob'] = $currentYear - $dob_array[0]+1;
    //         }
    //         else if ($currentMonth === $dob_array[1]){
    //             if($currentDay<$dob_array[2]){
    //                 $allDataArrayBig[$i]['dob'] = $currentYear - $dob_array[0]+1;
    //             }
    //             else{
    //                 $allDataArrayBig[$i]['dob'] = $currentYear - $dob_array[0];
    //             }
    //         }
    //         else{
    //             $allDataArrayBig[$i]['dob'] = $currentYear - $dob_array[0];
    //         }
    //     }

    //     else {
    //         $allDataArrayBig[$i]['dob'] = null;
    //     }
    // }//turns dob to age

}
echo json_encode($allDataArrayBig);
mysqli_close($conn);

?>