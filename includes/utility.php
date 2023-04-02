<?php
function listAllContacts($db) {
    $sql = 'SELECT * FROM contact Join city
            ON contact.cityid=city.id
            ORDER BY contact.id DESC';
}
?>