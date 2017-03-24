<?php
include("../database_connection.php");

   session_name('adminSession');

function escape_special_char($variable)
{
foreach ($variable as $key => $value) {
    $variable[$key] = htmlspecialchars($value);
}
    return $variable;
}
function user_details_table($display_array, $row) {
    foreach ($display_array as $key => $value) {
    echo "<tr>";
        echo "<th>".$key."</th>";
        echo "<td>".$row[$display_array[$key]]."</td>";
    echo "</tr>";
    }
}

?>
