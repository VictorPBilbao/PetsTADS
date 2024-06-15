<?php
require_once 'main.php';

runDbCommand("DEFINE TABLE IF NOT EXISTS Pets SCHEMAFULL");

$result = runDbCommand("
DEFINE FIELD name ON TABLE Pets TYPE string;
DEFINE FIELD image ON TABLE Pets TYPE string;
DEFINE FIELD description ON TABLE Pets TYPE string;
");

$result = runDbCommand("
CREATE Pets CONTENT {
    name: 'Belinha',
    image: 'uploads/belinha.jpg',
    description: 'É uma cachorra muito brincalhona e adora correr no parque. Seu hobby favorito é morder os chinelos do dono e de vez em quando, roubar um pedaço de carne da mesa. Ela é muito carinhosa e adora um carinho na barriga.'
}
");

$result = runDbCommand("
CREATE Pets CONTENT {
    name: 'Frajola',
    image: 'uploads/frajola.jpeg',
    description: 'É um gato muito preguiçoso e adora dormir o dia todo. Seu hobby favorito é deitar no sol e dormir. Ele é muito carinhoso e adora um carinho na barriga. Além disso, ele é muito brincalhão e adora brincar com bolinhas de lã.'
}
");

$result = runDbCommand("
CREATE Pets CONTENT {
    name: 'Nemo',
    image: 'uploads/nemo.jpg',
    description: 'É um peixe muito bonito e adora nadar no aquário. Seu hobby favorito é nadar e brincar com as plantas do aquário. Ele é muito carinhoso e adora um carinho na barriga. Além disso, ele é muito brincalhão e adora brincar com os outros peixes.'
}
");
