<?php

$counterchiken = $_POST['chikencount'];
$countercow = $_POST['cowcount'];

class Ferm
{
    public $id;
    public static $animal = array();
}
class cow extends Ferm
{
    public static $idcounter = 0;
    public $milk;

    public function __construct()
    {
        $this->id = self::$idcounter++;
    }
    public function GetMilk()
    {
        $milk = rand(8*self::$idcounter,12*self::$idcounter);
        echo "Количество Коров " . self::$idcounter . "<br> Литров Молока " . "{$milk}";
    }
}

class chiken extends Ferm
{
    public static $idcounter = 0;
    public $eggs;

    public function __construct()
    {
        $this->id = self::$idcounter++;
    }
    public function GetEggs()
    {
        $eggs = rand(0,self::$idcounter);
        echo "Количество куриц " . self::$idcounter . "<br> Количество Яиц " . "{$eggs}" . "<br>";
    }
    
}


function addcows($name, $count)
{
    Ferm::$animal[] = array($name, $count); // структурируем данные о животных на ферме
    global $cow;
    for ($i = 1 ; $i <= $count ; $i++)
    {
        $cow[$i] = new cow();
    }
}

function addchikens($name, $count)
{
    Ferm::$animal[] = array($name, $count); // структурируем данные о животных на ферме
    global $chiken;
    for ($i = 1 ; $i <= $count ; $i++)
    {
        $chiken[$i] = new chiken();
    }
}

addcows("Cow", $countercow); // Добавление поштучно коров
addchikens("Chiken", $counterchiken); // Добавление поштучно Куриц

chiken::GetEggs();
cow::GetMilk();


