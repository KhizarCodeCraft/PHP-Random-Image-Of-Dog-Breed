<?php
$opts = [
    "http" => [
            "method" => "GET",
            "header" => "Header1: Header1Input" .
            "Header2: Header2Input"
            ]
        ];
$URL='https://dog.ceo/api/breeds/image/random';
//default image set
$src='https://images.dog.ceo/breeds/mountain-swiss/n02107574_1441.jpg';
$context = stream_context_create($opts);

if(isset($_GET['submit'])){
    $context = stream_context_create($opts);

   $data=file_get_contents($URL,false,$context);
   $file = json_decode($data);
   if($file->status=='success'){
    $src=$file->message;
}
else{
    echo "No data found";
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Image shows</title>
    <style>
        .body{
            display:flex;justify-content:center;align-items:center;flex-direction:column
        }
        img{
            border: 2px solid #000;
        }
        input[type='submit']{
            padding: 16px 8px;
            margin: 5px;
            color:#fff;
            background:#000;
            font-size:24px;
            font-weight:500;
            outline:none;
            border:none;
            transition: color 0.5sec;
        }
        input[type='submit']:hover{
            color:#000;
            background:#fff;
        }
        </style>
</head>
<body class="body">
    
      <img src=<?php echo $src?> width='400' >

    <form  method="get" action='index.php'>
    <input type="hidden" />
  <input type="submit" name='submit' value='Next' />
</form>
</body>
</html>