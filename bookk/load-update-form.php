<?php
 
$student_id = $_POST["id"];


$conn = mysqli_connect("localhost","root","","bookdatabase") or die("Connection Failed");

$sql = "SELECT * FROM product_tabe WHERE id = '$student_id'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){

  while($row = mysqli_fetch_assoc($result)){ 
    $output .= "<tr>
      <td width='90px'>Name</td>
      <td><input type='text' id='edit-name' value='{$row["name"]}'>
          <input type='text' id='edit-id' hidden value='{$row["id"]}'>
      </td>
    </tr>
    <tr>
      <td>photo</td>
      <td><input type='file' id='edit-photo' value='{$row["photo"]}'  required></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><input type='text' id='edit-price' value='{$row["price"]}'></td>
    </tr>
    <tr>
      <td>metatags</td>
      <td><input type='text' id='edit-metatags' value='{$row["metatags"]}'></td>
    </tr>

    <tr>
      <td>categories</td>
      <td><select id='edit-categories'  required>
      <option>IT</option>
      <option>CS</option>
      <option>Mechanical</option>
      <option>chemical</option>
      <option>EXTC</option>
      <option>Electronics</option>
      <option>Civil</option>
    </select></td>
    </tr>
    <tr>
      <td>description</td>
      <td><input type='text' id='edit-description' value='{$row["description"]}'></td>
    </tr>
    <tr>
      <td></td>
      <td><input type='submit' id='edit-submit' value='save'></td>
    </tr>";

  }

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
