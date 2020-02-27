<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Sąlyga: Sukurkite klase kurios atžvilgiu kuriamam objektui privalėtume paduoti parametrą ‘Automobilio marke’. Pvz.: Audi, BMW …
// Šią klasę paveldės kita klasė kuri turės metodą addCarInfo. Šis metodas reikalaus prie objekto priskirti papildomą informaciją. Pvz.: Modelis, Metai, kaina.
// Naudojama: Vienas failas, index.php
// Aprašymas: panaudojus pirmą klasę ir ją iš var_dump’inus gaunate tik Automobilio marke. Panaudojus antrą klasę, jos metodą ir iš var_dump’inus gauname masyvą su visa automobilio informacija.

// class Car
// {
//     public $carBrand;
//
//     public function __construct($carBrand){
//         $this->carBrand = $carBrand;
//     }
// }
//
// class CarInfo extends Car
// {
//     public $model;
//     public $price;
//     public $age;
//
//     public function addCarInfo($model, $price, $age){
//         $this->model = $model;
//         $this->price = $price;
//         $this->age = $age;
//     }
// }
// $obj = New Car('Audi');
// var_dump($obj);
//
// $obj1 = New CarInfo('Audi');
// $obj1->addCarInfo('A6', 44000, 2016);
// var_dump($obj1);

// 2. Sąlyga: Sukurti klasę kurios objektas turetų ilgą string’ą. Teksto pastraipą kuri susidarytų 5 ir daugiau sakinius.
// Ši klasė turi turėti pirmą metodą kuris mūsų paduotą stringą paverstu visomomis didžiosiomis raidėmis.
// Ir mantrą metodą kuris mums ekrane atvaizduotų sio stringo pirmus 15 simbolių arba mažiau. Negali būti žodis nukirptas viduryje, Turi matytis pilnas žodis. Gale šio sutrumpinto teksto turi būti tritaškis.
// Naudojama: Vienas failas, index.php
// Aprašymas: stringas-> Mano vardas Tomas ir aš esu Botanikas. Atvaizduojama panaudojus metods -> MANO VARDAS ...

// class Stringas
// {
//     public $text;
//
//     public function __construct($text){
//         $this->text = $text;
//     }
//
//     public function upper(){
//         print strtoupper($this->text) . '<br>';
//     }
//
//     public function cut(){
//         print mb_strimwidth($this->text, 0, 11) . ' ...' . '<br>';
//     }
//
//     public function view($story_desk, $chars){
//         $story_desk = substr($story_desk, 0, $chars);
//         $story_desk = substr($story_desk, 0, strrpos($story_desk, ' '));
//         $story_desk = $story_desk . ' ...';
//         print $story_desk;
//     }
// }
//
// $obj = New Stringas('Naktį pasnigo, miškas nubalo. Nendrės, juosiančios ežerėlį, buvo tarytum paslaptingi hieroglifai, kaligrafo įrėžti į tylą, neperskaitomi, todėl nebylūs');
// $obj->view($obj->text, 16);

// 3.Sąlyga: Sukurti skaičiuotuvą naudojant klasę/es ir jos/jų metodą/us. Skaičiuotuvas turi galėti atlikti sudėties, atimties, daugybos, dalybos veiksmus. Turėtų mygtuką ištrinti rezultatą.
// Naudojama: Vienas failas, index.php
// Aprašymas: 2+6*5/2 =  20 (rezultatas atspausdinamas ekrane). Sąlyga yra teisinga, nes po kiekvieno skaičiaus įvedimo mes spaudžiam mygtuką kuris atlieka butent tą veiksmą.



class Calc
{
    public $number = 0;

    public function multiply($number){
            $this->number *= $number;
        }

    public function divide($number){
        $this->number /= $number;
    }

    public function sum($number){
        $this->number += $number;
    }

    public function minus($number){
        $this->number -= $number;
    }

    public function resetNumber(){
        $this->number = 0;
    }
}

class Form
{
    public function calcForm(){
        print "
            <form method=\"POST\">
                    <input name=\"number\" placeholder=\"Insert number\" type=\"number\">
                    <button name=\"daugyba\">*</button>
                    <button name=\"dalyba\">/</button>
                    <button name=\"sudetis\">+</button>
                    <button name=\"atimtis\">-</button>
                    <button name=\"istrinti\">Delete result</button>
                </form>
        ";
    }
}

class Controller extends Calc
{
    public function listen($numberFromInput){
        if(isset($_POST['daugyba'])){
            $this->multiply($numberFromInput);
        }elseif(isset($_POST['dalyba'])){
            $this->divide($numberFromInput);
        }elseif(isset($_POST['sudetis'])){
            $this->sum($numberFromInput);
        }elseif(isset($_POST['atimtis'])){
            $this->minus($numberFromInput);
        }elseif(isset($_POST['istrinti'])){
            $this->resetNumber();
        }
    }
}

$form = New Form();
$controller = New Controller();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php $form->calcForm(); ?>
</body>
</html>