<?php include 'database.php'; ?>
<?php
    //Create SELECT query
    $query = "SELECT * FROM shoutit";
    $shouts = mysqli_query($db, $query); //Often named $results, not $shouts
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shout It!</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div id="container">
            <header>
                <h1>Shout It!</h1>
            </header>
            <div id="shouts">
                <ul>
                    <?php while($row = mysqli_fetch_assoc($shouts)) : ?>
                        <li class="shout">
                            <span class="time"><?php echo $row['time']; ?> &mdash; </span><strong><?php echo $row['user']; ?></strong>: <?php echo $row['message']; ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div id="input">
                <?php if (isset($_GET['error'])) : ?>
                    <div class="error">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($_GET['success'])) : ?>
                    <div class="success">
                        <?php echo $_GET['success']; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="process.php">
                    <input type="text" name="user" placeholder="Enter username">
                    <input type="text" name="message" placeholder="Enter message">
                    <input class="shout-btn" type="submit" name="submit" value="Send">
                </form>
            </div>
        </div>
    </body>
</html>