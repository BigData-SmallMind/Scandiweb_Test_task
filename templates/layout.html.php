<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include 'normalize.css' ?>
        <?php include 'layout.css' ?>
        <?php include "$style.css" ?>
    </style>
</head>

<body>
    <header>
        <h1>Scandiweb test task</h1>
    </header>


    <main>
        <?php echo $output; ?>
    </main>

    <footer>
        <div class="footer-nest">&copy; Mohamed Farid <?php echo date('Y')?></div>
    </footer>
</body>

</html>