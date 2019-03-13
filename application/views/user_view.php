<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User_details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>

<body>
    <table>
        <tr>
            <th style="color:crimson">User Id</th>
            <th style="color:crimson">username</th>
            <th style="color:crimson">company</th>
        </tr>
        <?php
        foreach ($userArray as $key => $value) {
            // echo "<pre>";
            // print_r($value);
            // echo "</pre>";

            echo "<tr>
                    <td>".$value['id']."</td>
                    <td>".$value['username']."</td>
                    <td>".$value['company']."</td>
                    </tr>";

            // echo "<tr>
            //         <td>" . $value->id . "</td>
            //         <td>" . $value->username . "</td>
            //         <td>" . $value->company . "</td>
            //         </tr>";
        }
        ?>
        <!-- <tr>
            <td>1</td>
            <td> <?= $userArray['username']; ?></td>
            <td> <?= $userArray['company']; ?></td>
        </tr> -->
    </table>
</body>

</html>

<!-- <?php
        echo "<pre>";
        print_r($userArray);
        echo "</pre>";
        ?> --> 