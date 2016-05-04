<?php
include("w3.html");
?>

<?php
  if (isset($_REQUEST["confirmed"])) {
  $Day = $_REQUEST["Day"];
  $Hour = $_REQUEST["Hour"];
  $City = $_REQUEST["City"];
  $AType = $_REQUEST["AType"];

  //echo var_dump($Day)." ".var_dump($Hour)." ".var_dump($City)." ".$AType;



//Connect to server
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "myDB";

//Insert Data
// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }else{
    echo "Connected<br>";
  }

//SELECT and DISPLAY
  $sql = "SELECT id, Days, Hours, Cities, ATypes FROM Events
  WHERE Days=$Day AND Hours=$Hour";
/*WHERE Days=$Day, Hours=$Hour, Cities=$City, ATypes=$AType";*/
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
       ?>
       <div class="eventResult">
       <table class="resultTable"><tr><th>ID</th><th>Day</th><th>Hour</th><th>City</th><th>Type</th></tr>
       <?php
       // output data of each row
       while($row = $result->fetch_assoc()) {
      ?>
      <tr><td><? echo $row["id"] ?></td><td><? echo $row["Days"] ?></td><td><? echo $row["Hours"] ?></td>
          <td><? echo $row["Cities"] ?></td><td><? echo $row["ATypes"] ?></td></tr>
       <?php } ?>
       </table>
       </div>
       <?php
  } else {
       echo "0 results";
  }
  $conn->close();
}
?>

</body>
</html>
