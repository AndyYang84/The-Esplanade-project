<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database</title>
</head>

<style>
    table{
        background-color: yellow;
    }
</style>

<body>
    <table>
    <tr>
        <th>LOT</th>
        <th>TYPOLOGY</th>
        <th>AVAILABILITY</th>
        <th>AREA</th>
        <th>PRICE</th>
    </tr>


    <?php
        $servername = "localhost";
        $username = "nxmb9kw6_Andy";
        $password = "MacroV2019!";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, "nxmb9kw6_tp");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";

        $sql='select * from typology';
        $result = mysqli_query( $conn, $sql );


        if(mysqli_num_rows($result) > 0){
            while($row =$result-> fetch_assoc()){
                if($row['AVA']==1){$ava='Available';}else{$ava='Sold Out';}
                 echo "<tr><td>".$row['LOT']."</td><td>".$row['TYPOLOGY']."</td><td>".$ava."</td><td>".$row['AREA']."</td><td>".$row['PRICE']."</td><tr>";
            } 
            echo "</table> <br> <p>There are ".mysqli_num_rows($result)." rows in database.";
        }
        else{
             echo "<br>0 result from the database";
            }

        mysqli_close($conn);
    ?>





</body>

</html>