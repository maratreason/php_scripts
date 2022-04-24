<?php

class Car {
    // Зададим свойства (по сути переменные класса):
    public $color; // цвет автомобиля
    public $fuel; // количество топлива

    // Команда ехать:
    public function go()
    {
        // какой-то PHP код
    }
    
    // Команда поворачивать:
    public function turn()
    {
        // какой-то PHP код
    }
    
    // Команда остановиться:
    public function stop()
    {
        // какой-то PHP код
    }
}

$myCar = new Car; // командуем заводу сделать автомобиль
	
// Устанавливаем свойства объекта:
$myCar->color = 'red'; // красим в красный цвет
$myCar->fuel = 50; // заливаем топливо

echo "<pre>";
print_r($myCar);
echo "</pre>";


// Объявляем класс:
class User
{
    public $name;
    public $age;
}

// Создаем объект нашего класса:
$user = new User;

$user = new User; // создаем объект нашего класса
$user->name = 'john'; // записываем имя в свойство name
$user->age = 25; // записываем возраст в свойство age

echo $user->name; // выводим записанное имя
echo $user->age; // выводим записанный возраст
