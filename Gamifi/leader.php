<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="viewport"content="width=device-width, minimum-scale=1.0, initial-scale=1">
<style>
body{background:#FCDDEF}
header{background:rgba(180, 40, 80, 0.9);
height:80px;}
#lng{color:white; font-family:comic sans MS; font-size:300%;}
#l{color:rgba(180, 40, 80, 0.9);  font-family:comic sans MS;font-size:200%;}
</style>
</head>
<body>
<header>
<label id="lng">EduJoy</label>
</header>
<br>
<label id="l">LeaderBoard</label></body></html><?php

 $db = mysqli_connect('localhost', 'root', '', 'game');

 # Prepare the SELECT Query
  $selectSQL = 'SELECT `username`,`points` FROM `users` order by `points` desc';
 # Execute the SELECT Query
  if( !( $selectRes = mysqli_query( $db,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
  }else{
    ?>
<br><br><center><table border="3" width="500px" height="300px" style="background:black;color:yellow;font-family:comic sans MS; font-size:30px;">
  <thead>
    <tr>
      <th height="30px" >Name</th>
      <th>Score</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          echo "<tr><td>{$row['username']}</td><td>{$row['points']}</td></tr>\n";
        }
      }
    ?>
  </tbody>
</table>
    <?php
  }

?>
