<?php

include 'Controller/ContactController.php';
include 'Model/Contact.php';

if(isset($_POST["action"]))
{
    $action = $_POST["action"];
    if($action === "add")
    {
        $contactController = new ContactController;
        if(empty($_POST["name"]) || empty($_POST["number"]) || empty($_POST["address"]))
        {
            header('Location: View/add.php');
        }
        $contactController->add($_POST["name"] , $_POST["number"] , $_POST["address"]);
    }
    elseif($action === "updateForm")
    {
        $contactController = new ContactController;
        $contactController->get($_POST["contactID"]);
    }

    elseif($action === "update")
    {
        $contactController = new ContactController;
        if(empty($_POST["name"]) || empty($_POST["number"]) || empty($_POST["address"]))
        {
            header('Location: View/update.php');
        }
        $contactController->edit($_POST["contactID"] , $_POST["name"] , $_POST["number"] , $_POST["address"]);
    }

    elseif($action === "delete")
    {
        $contactController = new ContactController;
        $contactController->delete($_POST["contactID"]);
    }
    else
    {
        header('Location: View/index.php');
    }
}

