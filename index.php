<?php 
ob_start();
require_once('./classes/DBConnection.php');
$db = new DBConnection();

$page = isset($_GET['p']) ? $_GET['p'] : "forms";
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form Builder</title>
    <?php include('./header.php') ?>
    
    <!-- Add CSS for the "Go To" button and loading animation -->
    <style>
        /* CSS for the "Logout" button */
        #go-to-button {
            position: fixed;
            top: 10px;
            right: 20px;
            z-index: 9999;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #go-to-button:hover {
            background-color: #0056b3;
        }

        /* CSS for the loading animation */
        #loading-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9998;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        #loading-animation {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body class=''>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 border-bottom border-light mb-2" id="top-nav">
        <a class="navbar-brand" href="./">Form Builder App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-menu" aria-controls="nav-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-menu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item nav-forms">
                    <a class="nav-link" href="./index.php?p=forms"><i class="fa fa-th-list"></i> Forms</a>
                </li>
                <li class="nav-item nav-manage_forms">
                    <a class="nav-link" href="./index.php?p=manage_forms"><i class="fa fa-plus"></i> Create New</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <?php include("./".$page.".php") ?>
    </div>
    
    <!-- "Go To" button to index.php with loading animation -->
    <a href="#" id="go-to-button">Logout</a>

    <!-- Loading animation -->
    <div id="loading-container">
        <img id="loading-animation" src="loading.webp" alt="Loading">
    </div>

    <script>
        $(function(){
            var page = "<?php echo $page ?>";

            $('#nav-menu').find(".nav-item.nav-"+page).addClass("active");

            // Add JavaScript code to show loading animation and delay the redirect
            $('#go-to-button').on('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior

                // Show loading animation
                $('#loading-container').fadeIn(300);

                setTimeout(function() {
                    window.location.href = "./login.php"; // Redirect after 3 seconds
                }, 700);
            });
        })
    </script>
</body>
</html>
