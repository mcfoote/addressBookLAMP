<?php
function listAllContacts($db) {
    $sql = 'SELECT * FROM contact Join city
            ON contact.cityid=city.id
            ORDER BY contact.id DESC';
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll();
    return $result;
}


?>