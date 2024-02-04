<?php
    $this->load->helper('url');
    $this->load->helper('form');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Events | Cult-A-Way</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.js"></script>
    
</head>
<body>
<h1>Add Event</h1>
    <?php echo form_open_multipart('workshop/add_new_workshop')?><br>
    <input type="text" name="Title" placeholder="Enter Event Title"><br><br>
    <textarea id="editor" name="Description">Enter Event Description Here.</textarea><br><br>
    <label>Browse Poster:</label><input type="file" name="poster_file"><br>
    <label>Browse Image: </label><input type="file" name="image_file"><br><br><br>
    <label>Registeration URL:</label><textarea id="editor" name="registerlink"></textarea><br><br>
    <br>
    <label>Technical/Cultural (0 for technical)</label>
    
    <select name="category">
  <option value="0">0</option>
  <option value="1">1</option>
  
   </select> 
    <input type="submit">
    </form>
</body>
<script>var editor = new Jodit('#editor');</script>
</html>