<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $post->slug; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            font-size: 24px;
            text-align: center;
        }

        .content {
            margin-top: 20px;
        }

        .print-button {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1><?php echo $post->title; ?></h1>
    <div class="content">
        <?php echo nl2br($post->body); ?>
    </div>
    <div class="print-button">
        <button onclick="window.print()">In bài viết</button>
    </div>
</body>

</html>