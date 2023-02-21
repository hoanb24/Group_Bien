<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Nếu là delete thì thực hiện thao tác này
if (!empty($_POST['delete']))
{
    require ("C:xampp/htdocs/ltwphp/php/students.php");
    $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
    deleteStudent($student_id);
}

// Cuối cùng là chuyển hướng về trang danh sách
header("Location:student-list.php");
     ?>
</body>
</html>

