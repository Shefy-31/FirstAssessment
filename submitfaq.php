<?php
session_start();
$username=$_SESSION["username"];
$password=$_SESSION["password"];
if ( $username == 'admin' && $password =='admin123' ){
$con=mysqli_connect("localhost","root","ceymox123","magento.ceymox");
if(!$con){
    die("Connection failed".mysqli_connect_error());
}
$question = $_POST['question'];
$answer=$_POST['answer'];
if ($question != "" || $answer != ""){
$sql1="insert into ceymox_faq(question,answer)values('$question','$answer')";
mysqli_query($con,$sql1);
}
$sql="select * from ceymox_faq";
$result=mysqli_query($con,$sql);
echo "<table border=1>
    <tr>
        <th>Id</th>
        <th>Question</th>
        <th>Answer</th>
    </tr>";
    while($row=mysqli_fetch_array($result)){
       echo " <tr>
        <td>".$row['faq_id']."</td>
        <td>".$row['question']."</td>
        <td>".$row['answer']."</td>
        </tr>";
    }
echo "</table>";
}
else{
    alert("invalid user");
}
?>