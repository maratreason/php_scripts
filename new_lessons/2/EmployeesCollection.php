<?php

class EmployeesCollection
{
    private $employees = []; // массив работников, по умолчанию пустой

    // Получаем всех работников в виде массива:
    public function get()
    {
        return $this->employees;
    }

    // Подсчитываем количество хранимых работников:
    public function count()
    {
        return count($this->employees);
    }

    // Добавляем нового работника:
    public function add($employee)
    {
        $this->employees[] = $employee; // $employee - объект класса Employee
    }

    // Находим суммарную зарплату:
    public function getTotalSalary()
    {
        $sum = 0;

        // Перебираем работников циклом:
        foreach ($this->employees as $employee) {
            $sum += $employee->getSalary(); // получаем з/п работника через метод getSalary()
        }

        return $sum;
    }
}
