<?php

class Database{
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DATABASE = 'flights';
    public $flights;
    public $flight_from;
    public $flight_to;
    public $flight_number;
    public $flight_date;
    public static $database;

    public function __construct($flight_from,$flight_to,$flight_number,$flight_date){
        $this->from=$flight_from;
        $this->to=$flight_to;
        $this->flight_number=$flight_number;
        $this->flight_date=$flight_date;
        try{
            self::$database = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);
        }catch(Exception $error){
            echo 'Nepavyksta prisijungti prie duomenu bazes';
        }
    }
    public function setFlights(){
      return $this->flights = self::$database->query("INSERT INTO flights(flight_from, flight_to, flight_number, flight_date) VALUES ('{$this->from}','{$this->to}','{$this->flight_number}','{$this->flight_date}')");
    
    }
    public function getFlights(){
       $this->flights = self::$database->query('SELECT * FROM flights')
       ->fetch_all(MYSQLI_ASSOC);
    }
}
$db = new Database("Palanga","Oslas","B236","2023-04-02");

$db->setFlights();
$db->getFlights();
echo '<pre>';
print_r($db->flights);

?>