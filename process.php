<?php
$myarry = array(
    "teks 1", "teks 2", "teks 3", "teks 4", "teks 5", "teks 6", "teks 7"
);

//randomize strings
$randomize1 = array_rand($myarry);
$randomize2 = array_rand($myarry);
$randomize3 = array_rand($myarry);

//prepare output array
$myVals = array(
    'satu' => '1. ' . $myarry[$randomize1],
    'dua' => '2. ' . $myarry[$randomize2],
    'tiga' => '3. ' . $myarry[$randomize3],
);

echo json_encode($myVals);
?>