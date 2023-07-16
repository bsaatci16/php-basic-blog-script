<?php
include_once 'database.php';

$query = "SELECT * FROM posts ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kişisel Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Kişisel Blog</a>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h1 class="text-center mb-4">Blog Yazıları</h1>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="blog-title"><?php echo $row['title']; ?></h2>
                            <p class="blog-content"><?php echo substr($row['content'], 0, 200) . "..."; ?></p>
                            <a href="post.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Devamını Oku</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-4">
                <div class="about-section">
                    <h2>Blog Hakkında</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique lacus eu urna posuere, vitae eleifend nunc efficitur. Sed vitae nisl ultricies, faucibus dui id, accumsan dui. Etiam rhoncus fermentum dapibus. Sed tristique neque vitae nunc ultrices luctus. Fusce ultrices felis non massa fringilla, sed lobortis ipsum dapibus.</p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
