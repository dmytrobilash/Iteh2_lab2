<!DOCTYPE HTML>
<html>

<head>
    <title>Лабораторна работа 2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function getGroup() {
            let group = document.getElementById("group").value;
            let result = localStorage.getItem(group);
            //console.dir(localStorage);
            //console.log(result);
            document.getElementById('res').innerHTML = result;
        }
        function getTeacherAndDisciple() {
            let teacher = document.getElementById("teacher").value;
            let disciple = document.getElementById("disciple").value;
            let teacherAndDisciple = teacher + " " + disciple; 
            //alert(teacher);
            //alert(teacherAndDisciple);
            let result = localStorage.getItem(teacherAndDisciple);
            //console.dir(localStorage);
            //console.log(result);
            document.getElementById('res').innerHTML = result;
        }
        function getAuditorium(){
            let auditorium = document.getElementById("auditorium").value;
            let result = localStorage.getItem(auditorium);
            //console.dir(localStorage);
            //console.log(result);
            document.getElementById('res').innerHTML = result;
        }
        function clearLocarStorage(){
            localStorage.clear();
        }
    </script>
</head>

<body>

    <form method="get" action="get1.php">
        <!--Занятие группы-->
        <p>Вывести расписание занятий группы <select name="group" id="group" onchange="getGroup()">

                <?php
                include 'connection.php';

                $group = $collection->distinct("group");

                foreach ($group as $document) {
                    echo "<option>";
                    print($document);
                    echo "</option>";
                }
                echo '</select>';

                ?>

                <input type="submit" name="SubmButtonGroup" value="Ок"></p>
    </form>

    <form method="get" action="get2.php">

        <!--Занятие преподавателя-->
        <p>Вывести расписание занятий преподавателя по дисциплине <select name="teacher" id=teacher onchange="getTeacherAndDisciple()">

                <?php
                include 'connection.php';

                $group = $collection->distinct("teacher");

                foreach ($group as $document) {
                    echo "<option>";
                    print_r($document);
                    echo "</option>";
                }
                echo '</select>';

                ?>

        дисциплина<select name="disciple" id=disciple onchange = getTeacherAndDisciple()>

                <?php
                include 'connection.php';

                $group = $collection->distinct("disciple");

                foreach ($group as $document) {
                    echo "<option>";
                    print_r($document);
                    echo "</option>";
                    }
                    echo '</select>';

                ?>

                <input type="submit" name="SubmButtonTeacherAndDisciple" value="Ок"></p>
    </form>

    <form method="get" action="get3.php">
        <!--Занятие аудитории-->
        <p>Вывести расписание аудитории <select name="auditorium" id="auditorium" onchange="getAuditorium()">

                <?php
                include 'connection.php';

                $auditorium = $collection->distinct("auditorium");

                foreach ($auditorium as $document) {
                    echo "<option>";
                    print_r($document);
                    echo "</option>";
                }
                echo '</select>';

                ?>
                <input type="submit" name="SubmButtonAuditorium" value="Ок"></p>

    </form>
    <button onclick="clearLocarStorage()">Очистить</button>
    <table border='1'>
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
        <tbody id="res">

        </tbody>
    </table>

</body>
</html>