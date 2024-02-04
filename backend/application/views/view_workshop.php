<?php
$this->load->helper('url');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Workshop | <?= $workshop['Title']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php  if($success != null):?>
<h3>The Workshop Has been Successfully Added! </h3>
You can see the added details below:
<?php endif;?>
    <h1><?=$workshop['Title']?></h1> <br><br><hr>
    <div>
    <?=$workshop['Description']?>
    </div>
    <hr>
    <img src="<?= base_url('Downloads/'.$upload_data['file_name'])?>">
    <hr>
    <img src="<?= base_url('Downloads/'.$upload_data_icon['file_name'])?>">
</body>
</html>