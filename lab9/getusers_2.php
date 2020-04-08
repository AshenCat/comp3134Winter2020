
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>igorsmd</title>
</head>
<body>
    <form method="get">
        <input type="text" name="inp">
        <button type="submit">Submit</button>
    </form>
    <?php
        $servername="localhost";
        $username="newuser";
        $password="newuser";
        $dbname="menagerie";

        $conn=new mysqli($servername,$username,$password,$dbname);
        if($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
        $stmt = $conn->prepare("SELECT * FROM users where firstname = ? and active = 1");
	$stmt->bind_param("s",$_GET['inp']);
	$stmt->execute();
	$result = $stmt->get_result();
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()) {
                echo "id: ".$row["ID"]."&emsp;username: ".$row["username"];
                echo "&emsp;firstname: ".$row["firstname"]."&emsp;lastname: ".$row["lastname"];
                echo "&emsp;email: ".$row["email"]."&emsp;active: ".$row["active"];
            	echo "<br>";
	    }
        }
        else {
            echo "0 results";
        }
        $stmt->close();
        $conn->close();
    ?>
</body>
</html>
