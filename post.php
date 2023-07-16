<?php
include_once 'database.php';

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    $query = "SELECT * FROM posts WHERE id = $postId";
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    // Eğer geçerli bir post id'si yoksa, anasayfaya yönlendir.
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $post['title']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .header {
            padding: 30px;
            background-color: #343a40;
            color: #fff;
            text-align: center;
        }

        .header h2 {
            margin: 0;
            font-size: 30px;
            font-weight: bold;
        }

        .content {
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .content h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .content p {
            line-height: 1.5;
        }

        .back-button {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <h2><?php echo $post['title']; ?></h2>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <a href="index.php" class="btn btn-primary back-button">Anasayfa'ya Dön</a>
        </div>

        <div class="content">
            <h2><?php echo $post['title']; ?></h2>
            <p><?php echo $post['content']; ?></p>
        </div></br>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
