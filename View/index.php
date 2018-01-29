<?php
include '../Controller/ContactController.php';
/*
 * Get All Contatcts That Sotred in Session To Diplay Them
 */
session_start();
$contactController = new ContactController;
$contactController->index();
$contacts = (array)$_SESSION["contacts"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Address Book Manager</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
</head>
<body>
<center>
    <h1>Address Book Manager</h1>
    <br>
    <form action="add.php" method="POST">
        <input type="hidden" name="action" value="add"/>
        <input type="submit" class="btn btn-success" value="Add New Contact"/>
    </form>
</center>
<br>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>
    </tfoot>
    <tbody>
    <?php
    foreach ($contacts as $contact)
    {
    ?>
    <tr>
        <td><?php echo $contact->name; ?></td>
        <td><?php echo $contact->number; ?></td>
        <td><?php echo $contact->address; ?></td>
        <td>
            <form action="../routes.php" method="POST" style="display:inline-block;">
                <input type="hidden" name="action" value="updateForm"/>
                <input type="hidden" name="contactID" value="<?php echo $contact->id; ?>"/>
                <input class="btn btn-primary" type="submit" value="Edit"/>
            </form>
            <form action="../routes.php" method="POST" style="display:inline-block;">
                <input type="hidden" name="action" value="delete"/>
                <input type="hidden" name="contactID" value="<?php echo $contact->id; ?>"/>
                <input class="btn btn-danger" type="submit"  value="Delete"/>
            </form>
            </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>