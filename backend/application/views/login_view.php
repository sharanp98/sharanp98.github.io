<?php 
$this->load->helper('url');
$this->load->helper('form');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Cult-A-Way</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php echo form_open('user/login_user')?>
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="submit">
    </form>
</body>
</html>