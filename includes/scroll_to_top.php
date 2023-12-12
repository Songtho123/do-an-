<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scroll to Top</title>
    <style>
        #scrollToTopBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 50%; /* Make it circular */
            padding: 15px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Optional: Add a subtle shadow */
        }

        /* Style the arrow */
        #scrollToTopBtn::before {
            content: '\2191'; /* Unicode arrow-up character */
            font-size: 20px;
            line-height: 20px;
            vertical-align: middle;
        }
    </style>
</head>
<body>

    <!-- Your page content goes here -->

    <button id="scrollToTopBtn" onclick="scrollToTop()"></button>

    <script>
        // Function to scroll to the top of the page
        function scrollToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        // Show/hide the "Scroll to Top" button based on scroll position
        window.onscroll = function() {
            showScrollToTopButton();
        };

        function showScrollToTopButton() {
            var button = document.getElementById("scrollToTopBtn");
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                button.style.display = "block";
            } else {
                button.style.display = "none";
            }
        }
    </script>
</body>
</html>
