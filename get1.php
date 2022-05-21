<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
    <thead>
        <tr>
            <th>Group</th>
            <th>Day</th>
            <th>Number</th>
            <th>Auditorium</th>
            <th>Disciple</th>
            <th>Type</th>
            <th>Teacher</th>
        </tr>
    </thead>
    <tbody>

        <?php

        if (isset($_GET[''])) {
            include 'connection.php';
            $group = $_GET['group'];
            $type = 'Laboratory';

            $cursor = $collection->find( //);

                [
                    'group' => $group,
                    'type' => $type
                ],
                []
            );

            $result = "";
            foreach ($cursor as $document) {

                $day = $document['day'];
                $number = $document['number'];
                $auditorium = $document['auditorium'];
                $disciple =  $document['disciple'];
                $teacher = $document['teacher'];

                if (is_object($teacher)) {
                    $teacher = (array)$teacher;
                    $teacher = (implode(' ', $teacher));
                }
                $result = $result . "<tr><td>$group</td><td>$day</td><td>$number</td><td>$auditorium</td><td>$disciple</td><td>$type</td><td>$teacher</td></tr>";
            }
            echo $result;
        }
        ?>
    </tbody>
</table>
<?php
echo "<script> localStorage.setItem('$group', '$result'); </script>";
?>