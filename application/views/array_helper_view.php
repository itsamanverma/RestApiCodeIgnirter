</<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ArrayHelper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>

<body>
    <?php
    echo "<pre>";
    print_r($seo);
    echo "</pre>";
    ?>
<!-- 
    /* function to the description of particular key */
    <p>1. element()</p>
    <?php
    //echo element($key,$array);
    echo element("meta_desc",$seo);
    ?> -->

    <!-- /* function to give the discription for random key*/
    <p>2. random_element </p>

    <?Php
       echo random_element($seo);
    ?> -->
    
    <!-- function to gives the description more than one keys -->
    <p>3. elements()</p>
    <?php
    $new_array = elements(array("meta_desc","meta_key"),$seo);
    print_r($new_array);
    ?>
</body>

</html> 