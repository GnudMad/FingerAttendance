<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <link rel="stylesheet" type="text/css" href="css/Users.css">
    <script>
        $(window).on("load resize ", function() {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
            $('.tbl-header').css({'padding-right':scrollWidth});
        }).resize();
    </script>
</head>

<body>
    <?php include'header.php'; ?> 
    <main>
        <section>
            <!--User table-->
            <h1 class="slideInDown animated">Danh sách nhân viên</h1>
            <div class="tbl-header slideInRight animated">
                <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>CCCD</th>
                    <th>Giới tính</th>
                    <th>Email</th>
                    <th>Finger ID</th>
                    </tr>
                </thead>
                </table>
            </div>
            
            <div class="tbl-content slideInRight animated">
                <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <?php
                    //Connect to database
                    require'connectDB.php';

                        $sql = "SELECT * FROM users WHERE NOT username='' ORDER BY id DESC";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo '<p class="error">SQL Error</p>';
                        }
                        else{
                        mysqli_stmt_execute($result);
                            $resultl = mysqli_stmt_get_result($result);
                        if (mysqli_num_rows($resultl) > 0){
                            while ($row = mysqli_fetch_assoc($resultl)){
                    ?>
                                <TR>
                                <TD><?php echo $row['id'];?></TD>
                                <TD><?php echo $row['username'];?></TD>
                                <TD><?php echo $row['serialnumber'];?></TD>
                                <TD><?php echo $row['gender'];?></TD>
                                <TD><?php echo $row['email'];?></TD>
                                <TD><?php echo $row['fingerprint_id'];?></TD>
                                </TR>
                    <?php
                            }   
                        }
                    }
                    ?>
                </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>