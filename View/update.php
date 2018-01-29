<?php
/*
 * Get Choosen Contatct That Sotred in Session To Diplay his Data To Update it
 */
session_start();
$contact = $_SESSION["contact"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Contact</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
</head>
<body>
<center>
    <br>
    <h2>Edit Contact</h2>
    <br>
<form action="../routes.php" method="POST">
    <table>
        <tr><td>Name:</td><td><input type="text" name="name" value="<?php echo $contact->name; ?>" /></td></tr>
        <tr><td>Phone Number:</td><td><input type="text" name="number" value="<?php echo $contact->number; ?>" /></td></tr>
        <tr><td>Address:</td><td><input type="text" name="address" value="<?php echo $contact->address; ?>" /></td></tr>
        <tr><td colspan="2" align="center"><input class="btn btn-primary" type="submit" value="Update" /></td></tr>
        <input type="hidden" name="contactID" value="<?php echo $contact->id; ?>" />
        <input type="hidden" name="action" value="update" />
    </table>
</form>
    <br>
    <form action="index.php" method="POST">
        <input type="submit" class="btn btn-primary" value="Back To Contact List"/>
    </form>
</center>
</body>
</html>