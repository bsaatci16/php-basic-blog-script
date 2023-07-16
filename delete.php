<?php
include_once 'database.php';

// Admin Key kontrolü
$adminKey = 'admin123'; // Değiştirebilirsiniz, güvenli bir anahtar kullanın
if (isset($_POST['admin_key']) && $_POST['admin_key'] === $adminKey) {
    // Yazıyı sil
    $postId = $_POST['post_id'];

    $query = "DELETE FROM posts WHERE id=$postId";
    mysqli_query($conn, $query);

    // Yönlendirme
    header("Location: admin.php");
    exit();
}

// Get the post id from URL parameter
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Get the post data from the database
    $query = "SELECT * FROM posts WHERE id = $postId";
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    // If no post id is provided, redirect to admin.php
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Yazısını Sil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h2 class="text-center mb-0">Blog Yazısını Sil</h2>
                    </div>
                    <div class="card-body">
                        <h3 class="blog-title"><?php echo $post['title']; ?></h3>
                        <p class="blog-content"><?php echo $post['content']; ?></p>
                        <form method="POST" onsubmit="return confirm('Bu blog yazısını silmek istediğinizden emin misiniz?');">
                            <input type="hidden" name="post_id" value="<?php echo $postId; ?>">
                            <div class="form-group">
                                <label for="admin_key">Admin Key:</label>
                                <input type="password" class="form-control" id="admin_key" name="admin_key" required>
                            </div>
                            <button type="submit" class="btn btn-danger btn-block">Sil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
