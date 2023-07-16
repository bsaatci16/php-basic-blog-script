<?php
include_once 'database.php';

// Admin Key kontrolü
$adminKey = 'admin123'; // Değiştirebilirsiniz, güvenli bir anahtar kullanın
if (isset($_POST['admin_key']) && $_POST['admin_key'] === $adminKey) {
    // Yeni blog yazısını ekle
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    mysqli_query($conn, $query);

    // Yönlendirme
    header("Location: admin.php");
    exit();
}

// Tüm blog yazılarını getir
$query = "SELECT * FROM posts ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Sayfası</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center mb-0">Admin Sayfası</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="title">Başlık:</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="content">İçerik:</label>
                                <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="admin_key">Admin Key:</label>
                                <input type="password" class="form-control" id="admin_key" name="admin_key" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Yazıyı Ekle</button>
                        </form>
                    </div>
                </div>

                <div class="mt-4">
                    <h2 class="text-center mb-4">Tüm Blog Yazıları</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Başlık</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['title']; ?></td>
                                    <td>
                                        <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary mr-2">Güncelle</a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Sil</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
