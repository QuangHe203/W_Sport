<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs</title>
    <link rel="stylesheet" href="../css/programs.css">
</head>
<body>
    <div class="main">
        <div class="header">Programs</div>
        <div class="items">
            <form action="" method="post" class="form-item">
                <input class="search" type="text" placeholder="Search">
                <select id="sport" name="sportlist" form="sportform">
                    <option value="Sport">Sport</option>
                    <option value="League">League</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                </select>

                <select id="all" name="all" form="all">
                    <option value="all">All</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                </select>


                <input id="btn" type="button" value="Create Program">
            </form>
            
        </div>
    </div>
    <script>
        document.getElementById("btn").addEventListener("click", function() {
            window.location.href = "../PHP/newprogram.php";
        });
    </script>
</body>
</html>