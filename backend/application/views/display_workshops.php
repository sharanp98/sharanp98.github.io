<?php
    $this->load->helper('url');
    $this->load->helper('form');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Workshops | Cult-A-Way</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.js"></script>

</head>
<body>
<h1> Workshops</h1>

<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>Title</th>
    <th>Delete</th>

  </tr>
  <?php
  $i=1;
  foreach($data as $row)
  {
  echo "<tr>";
 
  echo "<td>".$row->Title."</td>";
  echo "<td><a href='deletedata?sno=".$row->Sno."'>Delete</a></td>";
  echo "</tr>";
  $i++;
  }
   ?>
</table>

</body>

</html>