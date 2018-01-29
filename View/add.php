<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Contact</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
</head>
<body>
<center>
    <br>
    <h2>Add Contact</h2>
    <br>
<form action="../routes.php" method="POST">
    <table>
        <tr><td>Name:</td><td><input type="text" name="name" /></td></tr>
        <tr><td>Phone Number:</td><td><input type="text" name="number" /></td></tr>
        <tr><td>Address:</td><td><input type="text" name="address" /></td></tr>
        <tr><td colspan="2" align="center"><input class="btn btn-success" type="submit" value="Save" /></td></tr>
        <input type="hidden" name="action" value="add" />
    </table>
</form>
    <br>
    <form action="index.php" method="POST">
        <input type="submit" class="btn btn-primary" value="Back To Contact List"/>
    </form>
</center>
</body>
</html>