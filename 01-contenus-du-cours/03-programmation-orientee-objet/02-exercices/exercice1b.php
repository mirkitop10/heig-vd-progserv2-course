<?php
require_once __DIR__ . '/exercice1.php';


$janeDoe = new Person("Jane", "Doe", 25, "jane.doe@example.com");
$johnSmith = new Person("John", "Smith", 17, "john.smith");

echo $janeDoe->getFullName() .      "<br>";
if ($janeDoe->isAdult()) {
    echo "Majeur" . "<br>";
} else {
    echo "mineur" . "<br>";
}
echo $janeDoe->getEmail() . "<br>";
if ($janeDoe->getDomainEmail()) {
    echo $janeDoe->getDomainEmail() . "<br>";
} else {
    echo "invalide" . "<br>";
}


echo $johnSmith->getFullName() . "<br>";
if ($johnSmith->isAdult()) {
    echo "Majeur" . "<br>";
} else {
    echo "mineur" . "<br>";
}
echo $johnSmith->getEmail() . "<br>";

if ($johnSmith->getDomainEmail()) {
    echo $johnSmith->getDomainEmail() . "<br>";
} else {
    echo "invalide" . "<br>";
}
