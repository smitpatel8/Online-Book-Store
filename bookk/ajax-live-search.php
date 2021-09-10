<?php
require "config.php";
session_start();
$dk = $_SESSION['email'];

$search_value = $_POST["search"];

$conn = mysqli_connect("localhost","root","","bookdatabase") or die("Connection Failed");

$sql = "SELECT * FROM product_tabe WHERE name LIKE '%{$search_value}%' AND email='$dk'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
 $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
                
                <th>Name</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Categories</th>
                <th width="90px">Delete</th>
              </tr>';

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr><td>{$row["name"]}</td><td><img src='upload-image/{$row["photo"]}' height='40px' width='60px'></td><td>{$row["price"]}</td><td>{$row["categories"]}</td><td align='center'><button Class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr>";
              }
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
<!-- <td align='center'><button class='edit-btn' data-eid='{$row["id"]}'>Edit</button></td>
                <th width="90px">Edit</th>
 -->