<?php
$connect = mysqli_connect('localhost', 'root', 'cSharpMain(88)', 'nathaniel95975_alphabetic_pagination');
$char = '';
if(isset($_GET["char"]))
{
    $char = $_GET["char"];
    $char = preg_replace('#[^a-z]#i', '', $char);
    $query = "SELECT * FROM tbl_student WHERE student_name LIKE '$char%'";
}
else
{
    $query = "SELECT * FROM tbl_student ORDER BY student_id";
}
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Webslesson Tutorial | How to Create Alphabetic Pagination in PHP with Mysql</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br /><br />
<div class="container" style="width:1100px;">
    <h2 align="center">How to Create Alphabetic Pagination in PHP with Mysql</h2>
    <h3 align="center">Student Data</h3>
    <br /><br />
    <div class="table-responsive">
        <div align="center">
            <?php
            $character = range('A', 'Z');
            echo '<ul class="pagination">';
            foreach($character as $alphabet)
            {
                echo '<li><a href="index.php?character='.$alphabet.'">'.$alphabet.'</a></li>';
            }
            echo '</ul>';
            ?>
        </div>
        <table class="table table-bordered">
            <tr>
                <th width="20%">ID</th>
                <th width="50%">Student Name</th>
                <th width="30%">Student Phone</th>
            </tr>
            <?php
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                    <tr>
                        <td><?php echo $row["student_id"]; ?></td>
                        <td><?php echo $row["student_name"]; ?></td>
                        <td><?php echo $row["student_phone"]; ?></td>
                    </tr>
                    <?php
                }
            }
            else
            {
                ?>
                <tr>
                    <td colspan="3" align="center">Data not Found</td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>