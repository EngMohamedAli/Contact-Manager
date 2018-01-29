<?php

include_once '../Model/Contact.php';

class ContactController
{

    public function index()
    {
        $contacts = array();
        $contact = new Contact;
        $contacts = $contact->getAllContacts();
        $_SESSION['contacts'] = $contacts;
    }

    public function get($id)
    {
        session_start();
        $contact = new Contact;
        $contact = $contact->getContact($id);
        $_SESSION["contact"] = $contact;
        header('Location: View/update.php');
    }

    public function add($name , $number , $address)
    {
        $contact = new Contact;
        $contact->saveContact($name , $number , $address);
        header('Location: View/index.php');
    }


    public function edit($id , $name , $number , $address)
    {
        $contact = new Contact;
        $contact->updateContact($id , $name , $number , $address);
        header('Location: View/index.php');
    }


    public function delete($id)
    {
        $contact = new Contact;
        $contact->removeContact($id);
        header('Location: View/index.php');
    }
}