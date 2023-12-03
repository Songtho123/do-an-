<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sliding Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #postContainer {
            display: flex;
            overflow-x: hidden;
        }

        .post {
            min-width: 100%;
            box-sizing: border-box;
            padding: 20px;
            transition: 0.5s;
        }
    </style>
</head>
<body>

    <div id="postContainer">
        <?php
        // Example posts
        $posts = [
            "Post 1 content goes here.",
            "Post 2 content goes here.",
            "Post 3 content goes here."
        ];

        foreach ($posts as $post) {
            echo '<div class="post">' . $post . '</div>';
        }
        ?>
    </div>

    <script>
        var currentIndex = 0;
        var posts = document.querySelectorAll('.post');

        function showPost(index) {
            if (index >= 0 && index < posts.length) {
                currentIndex = index;
                var translateValue = -currentIndex * 100 + '%';
                document.getElementById('postContainer').style.transform = 'translateX(' + translateValue + ')';
            }
        }

        function nextPost() {
            showPost(currentIndex + 1);
        }

        function prevPost() {
            showPost(currentIndex - 1);
        }

        // Adjust the transition duration based on your preference
        document.getElementById('postContainer').style.transition = 'transform 0.5s ease-in-out';
    </script>

</body>
</html>
