<?php
require("C:xampp/htdocs/ltwphp/php/students.php");

// Biến lưu trữ data và error
// Biến này phải khai báo ở đây để ở dưới sử dụng sẽ không bị lỗi
$data = array();
$errors = array();

// Biến kiểm tra có phải action edit hay không
$is_update_action = false;

// Trường hợp edit thì ta lấy thông tin để show ra cho người dùng thấy
if (!empty($_GET['id'])) {
    $data = getStudent($_GET['id']);
    $is_update_action = true;
}

// Nếu người dùng click vào nút submit
if (!empty($_POST['add_student'])) {

    // Lấy thông tin
    $data['student_id'] = isset($_POST['id']) ? $_POST['id'] : '';
    $data['student_name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['student_email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $data['student_qq'] = isset($_POST['qq']) ? $_POST['qq'] : '';
    $data['student_sdt'] = isset($_POST['sdt']) ? $_POST['sdt'] : '';

    // Validate
    if (empty($data['student_id'])) {
        $errors['student_id'] = 'Ban chua nhap ID';
    }

    if (empty($data['student_name'])) {
        $errors['student_name'] = 'Ban chua nhap name';
    }

    if (empty($data['student_email'])) {
        $errors['student_email'] = 'Ban chua nhap Email';
    }
    if (empty($data['student_qq'])) {
        $errors['student_qq'] = 'Ban chua nhap Quê Quán';
    }
    if (empty($data['student_sdt'])) {
        $errors['student_sdt'] = 'Ban chua nhap Số Điện Thoại';
    }

    //  Nếu dữ liệu hợp lệ thì thực hiện thao tác update thông tin
    // đồng thời redirect về trang danh sách
    if (empty($errors)) {
        updateStudent($data['student_id'], $data['student_name'], $data['student_email'], $data['student_qq'], $data['student_sdt'], );
        header("Location:student-list.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Thêm sinh viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        * {
            /* reset lại margin và padding cho các tag */
            margin: 0;
            padding: 0;
        }


        .table-hover th,
        .table-hover td {
            padding: 5px;
            text-align: left;
            vertical-align: top;
        }


        a {
            text-decoration: none;
        }
        .table-hover {
            width:290px;
            vertical-align: middle;
        }
        .table-hover {
            margin-left: auto;
            margin-right: auto;
        }
        .back {
            padding-top: 10px;
            text-align: center;
        }
    </style>

</head>

<body>

    <br> <br>
    <form method="post">
        <table border="1" cellspacing="0" cellpadding="10" class="table-hover" align="center">
            <tr>
                <td>Mã SV</td>
                <td>
                    <input type="text" name="id"
                        value="<?php echo !empty($data['student_id']) ? $data['student_id'] : ''; ?>" />
                    <?php echo !empty($errors['student_id']) ? $errors['student_id'] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name"
                        value="<?php echo !empty($data['student_name']) ? $data['student_name'] : ''; ?>" />
                    <?php echo !empty($errors['student_name']) ? $errors['student_name'] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email"
                        value="<?php echo !empty($data['student_email']) ? $data['student_email'] : ''; ?>" />
                    <?php echo !empty($errors['student_email']) ? $errors['student_email'] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>Quê Quán</td>
                <td>
                    <input type="text" name="qq"
                        value="<?php echo !empty($data['student_qq']) ? $data['student_qq'] : ''; ?>" />
                    <?php echo !empty($errors['student_qq']) ? $errors['student_qq'] : ''; ?>
                </td>
            </tr>
            <tr>
                <td>Số Điện Thoại</td>
                <td>
                    <input type="text" name="sdt"
                        value="<?php echo !empty($data['student_sdt']) ? $data['student_sdt'] : ''; ?>" />
                    <?php echo !empty($errors['student_sdt']) ? $errors['student_sdt'] : ''; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="add_student"
                        value="<?php echo ($is_update_action) ? "Cap nhat" : "Thêm mới"; ?>" /></td>
            </tr>
        </table>
    </form>
<div class="back"> <button class="btn-info
"><a href="student-list.php">BACK</a>
    </button> </div>
</body>

</html>