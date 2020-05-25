<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myforum";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*
$sql = "ALTER TABLE questions
change cid sid int(6)
";
if ($conn->query($sql) === TRUE) {
    echo "que table updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "ALTER TABLE User
ADD hash VARCHAR(32) NOT NULL
";
if ($conn->query($sql) === TRUE) {
    echo "user table updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "CREATE TABLE User (
uid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
username VARCHAR(10) NOT NULL,
password VARCHAR(10) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
		echo "user table created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

$sql = "CREATE TABLE Questions (
qid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
uid INT(6) REFERENCES User (uid) ON DELETE CASCADE, 
cid INT(6) REFERENCES Categories(cid) ON DELETE CASCADE, 
ques TEXT NOT NULL,
no_of_report INT(6),
no_of_upvote INT(6),
no_of_downvote INT(6)

)";
if ($conn->query($sql) === TRUE) {
    echo "que table created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "CREATE TABLE Answers (
uid INT(6) REFERENCES User (uid) ON DELETE CASCADE, 
qid INT(6) REFERENCES Questions (qid) ON DELETE CASCADE, 
ans TEXT NOT NULL,
no_of_report INT(6),
no_of_upvote INT(6),
no_of_downvote INT(6)
)";
if ($conn->query($sql) === TRUE) {
    echo "ans table created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "CREATE TABLE Categories (
cid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
cname VARCHAR(30) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "cat table created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "CREATE TABLE Sub_categories(
  subname VARCHAR(30) NOT NULL, 
  cid INT(6) REFERENCES Categories (cid) ON DELETE CASCADE
)";
if ($conn->query($sql) === TRUE) {
    echo "sub cat table created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO User (firstname, lastname, email, username, password)
VALUES ('Akash', 'Desai', 'asd011@chowgules.ac.in', 'asd011', 'chowrum')";
if ($conn->query($sql) === TRUE) {
    echo "New record akash created successfully in user table";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO User (firstname, lastname, email, username, password)
VALUES ('Mehak', 'Shaikh', 'mas006@chowgules.ac.in', 'mas006', 'chowrum')";
if ($conn->query($sql) === TRUE) {
    echo "New record mehak created successfully in user table";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO User (firstname, lastname, email, username, password)
VALUES ('Ayushi', 'Patil', 'abp003@chowgules.ac.in', 'abp003', 'chowrum')";
if ($conn->query($sql) === TRUE) {
    echo "New record ayushi created successfully in user table";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO User (firstname, lastname, email, username, password)
VALUES ('Collin', 'Pereira', 'ctp001@chowgules.ac.in', 'ctp001', 'chowrum')";
if ($conn->query($sql) === TRUE) {
    echo "New record collin created successfully in user table";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

*/


?>