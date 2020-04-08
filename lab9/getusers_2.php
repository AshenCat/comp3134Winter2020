
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

        // $sql = isset($_GET['inp']) ? "select * from users where firstname='".$_GET['inp']."';" : "select * from users;";
        $sql = "select * from users where firstname=? and active=1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$_GET['inp']);
        $stmt->execute();
        $result=$stmt->get_result();
	echo $sql;
	echo "<br><br>";
        // $result=$conn->query($sql);
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
        $conn->close();
    ?>
</body>
</html>
