<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'AppDBConnection.php';

class Contact
{
    public $id;
    public $name;
    public $number;
    public $address;
    public function __construct()
    {
        $this->id = 0;
        $this->name = "";
        $this->number = "";
        $this->address = "";
    }

    public function getAllContacts()
    {
        $connection = AppDBConnection::getConnection();
        $contacts = array();
        $sql = "SELECT * FROM contacts ORDER BY name ASC";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contact = new Contact;
                $contact->id = $row["id"];
                $contact->name = $row["name"];
                $contact->number = $row["number"];
                $contact->address = $row["address"];
                $contacts[] = $contact;
            }
        }
        $connection->close();
        return $contacts;
    }

    public function getContact($id)
    {
        $connection = AppDBConnection::getConnection();
        $contact = new Contact;
        $sql = "SELECT * FROM contacts WHERE id=?";
        if($statment = $connection->prepare($sql)) {
            $statment->bind_param("i", intval($id));
            $statment->execute();
            $contact = $statment->get_result();
            $statment->close();
            $connection->close();
        }
        else{
            var_dump($connection->error);
        }
        return $contact->fetch_object();
    }


    public function saveContact($name , $number , $address)
    {
        $connection = AppDBConnection::getConnection();
        $sql = "INSERT INTO contacts (name , number , address) VALUES (?, ?, ?)";
        $statment = $connection->prepare($sql);
        $statment->bind_param("sss" , $name , $number , $address);
        $statment->execute();
        $statment->close();
        $connection->close();
    }

    public function updateContact($id , $name , $number , $address)
    {
        $connection = AppDBConnection::getConnection();
        $sql = "UPDATE contacts SET name=? , number=? , address=? WHERE id=?";
        $statment = $connection->prepare($sql);
        $statment->bind_param("sssi" , $name , $number , $address , intval($id));
        $statment->execute();
        $statment->close();
        $connection->close();
    }

    public function removeContact($id)
    {
        $connection = AppDBConnection::getConnection();
        $sql = "DELETE FROM contacts WHERE id=?";
        if($statment = $connection->prepare($sql)) {
            $statment->bind_param("i", intval($id));
            $statment->execute();
            $statment->close();
            $connection->close();
        }

    }

}