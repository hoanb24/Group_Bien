<style>
    .add {
        margin-top: 50px;
        text-align: center;
    }

    .add a {
        text-decoration: none;
        color: black;
    }

    h2 {
        text-align: center;
    }

    .tableStyle th,
    .tableStyle td {
        padding: 5px;
        text-align: left;
        vertical-align: top;
    }

    .tableStyle th {
        vertical-align: middle;
        width: 20%;
    }
    .back {
            padding-top: 10px;
            text-align: center;
        }
</style>

<?php

require("C:xampp/htdocs/ltwphp/php/students.php");
$students = getAllStudents();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Danh sách sinh viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h2>Danh sách sinh viên</h2>
    <br>
    <center>
        <form method="post" action="student-search.php">
            <input type="text" value="" name="search" />
            <input type="submit" value="Tìm kiếm" name="search_st" />
        </form>
    </center>
    <br> <br>
    <table border="1" cellspacing="0" align="center" cellpadding="10" class="tableStyle table-striped">
        <tr>
            <td>Mã SV</td>
            <td>Fullname</td>
            <td>Email</td>
            <td>Quê Quán</td>
            <td>Số Điện Thoại</td>
            <td>Action</td>
        </tr>
       
        <?php foreach ($students as $item) { ?>
            <?php if ($item['student_id'] == $_POST['search']) { ?>
                <tr>
                    <td>
                        <?php echo $item['student_id']; ?>
                    </td>
                    <td>
                        <?php echo $item['student_name']; ?>
                    </td>
                    <td>
                        <?php echo $item['student_email']; ?>
                    </td>
                    <td>
                        <?php echo $item['student_qq']; ?>
                    </td>
                    <td>
                        <?php echo $item['student_sdt']; ?>
                    </td>
                    <td>
                        <form method="post" action="student-add.php?id=<?php echo $item['student_id']; ?>">
                            <input type="hidden" value="<?php echo $item['student_id']; ?>" name="student_id" />
                            <input type="submit" value="Update" name="update" class="btn-success" />
                        </form>

                        <form method="post" action="student-delete.php">
                            <input type="hidden" value="<?php echo $item['student_id']; ?>" name="student_id" />
                            <input onclick="return confirm('Ban co chac muon xoa sinh vien nay hay khong?');" type="submit"
                                value="Delete" name="delete" class="btn-danger" />
                        </form>
                    </td>
                </tr>
                <?php break;
            }
            ?>
        <?php } ?>
    </table>
    <div class="add"><a href="student-add.php" text-align="center">THÊM</a>
    </div>
    <div class="back"> <button class="btn-info
"><a href="student-list.php">BACK</a>
</body>

</html>