<!DOCTYPE html>
<html lang="en">
<body>
   <h1>Homepage</h1>
   <p><?php echo "My first PHP web app works!" ?></p>
   <ul>
       <li>Operative system: <?= PHP_OS ?></li>
       <li>Web server: <?= $_SERVER['SERVER_SOFTWARE'] ?></li>
       <li>PHP version: <?= phpversion() ?></li>
   </ul>
</body>
</html>
