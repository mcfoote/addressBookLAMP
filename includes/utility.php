<?php

function listAllContacts($db) {
    $sql = 'SELECT * FROM contact Join city
            ON contact.cityid=city.id
            ORDER BY contact.id DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getContactById($db, $contactid) {
    $sql = 'SELECT * FROM contact Join city
            ON contact.cityid=city.id
            ORDER BY contact.id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id',$id);
    $id = $contactid;
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function listCities($db) {
    $sql = 'SELECT * FROM city
            ORDER BY id';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll();
    return $result;
}

function getContactByEmail($db, $emailId) {
    $sql='SELECT * FROM contact c JOIN city t
        ON c.cityid=t.id
        WHERE email=:email';
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':email',$email);
    $email = $emailId; 
    $stmt->execute();
    $result=$stmt->fetchAll();
    return $result;
}

function addConant($db, $contact) {
    $sql = 'INSERT INTO contact(name, firstname, email, street, zip_code, cityid)
            VALUES (:name, :firstname, :email, :street, :zip_code, :cityid)';
    $stmt = $db->bindParam(':name', $name);
    $stmt = $db->bindParam(':firstname', $firstname);
    $stmt = $db->bindParam(':email', $email);
    $stmt = $db->bindParam(':street', $street);
    $stmt = $db->bindParam(':zip_code', $zip_code);
    $stmt = $db->bindParam(':cityid', $cityid);
    $name = $contact[0];
    $firstname = $contact[1];
    $email = $contact[2];
    $street = $contact[3];
    $zip_code = $contact[4];
    $cityid = $contact[5];
    $result = $stmt->exectue();
    return $result;

}

function footNoting() {
    $date=new DateTime("now");
    $yr=$date->format('Y');
    echo '<p>';echo "&copy$yr Benedict Daniel Masimbani"; echo '</p>';
}

function tabulate() {
    echo '<tr>';
    echo "<td>$name</td>";
    echo "<td>$firstname</td>";
    echo "<td>$email</td>";
    echo "<td>$street</td>";
    echo "<td>$zip_code</td>";
    echo "<td>$city_name</td>";
    echo '<td><a href="editcontact.php?id='.$id.'"><button class="button">Edit</a>';
    echo '</tr>';
}

?>