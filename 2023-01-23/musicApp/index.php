<?php
session_start();
/* 
    CRUD:
    CREATE
    READ
    UPDATE
    DELETE
    
    MVC:
    Model - Atsakingi už duomenų paėmimą iš duomenų bazės
    View - Šablonai kurie sukompiliuojami pagal perduodamą informaciją
    Controller - Kontroliuoja prieš tai buvusių dviejų sekcijų veiklą
*/

// include 'models/Database.php';
// include 'models/Videos.php';
// include 'models/Categories.php';

// include 'controllers/Homepage.php';

//Funkcija automatiskai uzkraunanti klases
function autoload_classes($klase) {
    $klase = str_replace('\\', '/', $klase);

    if(is_file($klase . '.php'))
        include $klase . '.php';
}

spl_autoload_register('autoload_classes');

// $categories = new Categories();
// $videos = new Videos();

//print_r($videos->getDatabase());
// echo '<pre>';

//Įrašo pridėjimas
// echo $videos->addRecord([
//     'name' => 'Geriausias video',
//     'video_url' => 'https://youtube.com',
//     'thumbnail_url' => 'https://youtube.com'
// ])->getRecordId();

// print_r($videos->getRecords());

//Įrašo atnaujinimas
// $videos->updateRecord(4, [
//     'name' => 'Naujas įrašas',
//     'video_url' => 'https://youtube.com/1',
//     'thumbnail_url' => 'https://youtube.com/2'
// ]);

//Įrašo ištrynimas
// $videos->deleteRecord(5);

// print_r($videos->updateRecord(8, [
//     'name' => 'Naujas įrašas',
//     'video_url' => 'https://youtube.com/1',
//     'thumbnail_url' => 'https://youtube.com/2'
// ])->getRecords());


//Kategorijos pridėjimas
// echo $categories->addRecord([
//     'name' => 'Sports',
// ])->getRecordId();

// print_r($categories->getRecords());

//Kategorijos atnaujinimas
// $categories->updateRecord(4, [
//     'name' => 'Naujas įrašas',
// ]);

//Kategorijos ištrynimas
// $categories->deleteRecord(5);

// print_r($categories->updateRecord(8, [
//     'name' => 'Naujas įrašas';   
// ])->getRecords());

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch($page) {
    case 'category':
        Controllers\Homepage::byCategory($_GET['id']);
        break;
    case 'video':
        Controllers\SingleVideo::showVideo($_GET['id']);
        break;    
    case 'register':
        Controllers\Register::addUser();
        break; 
    case 'login':
        Controllers\Register::loginUser();  
        break;
    case 'user':
        Controllers\Userpage::userPage();
        break;            
    default:
        Controllers\Homepage::index();
}