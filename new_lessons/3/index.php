<?php

class Employee
{
    private $name;
    private $salary;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of salary
     */ 
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     *
     * @return  self
     */ 
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }
}

class Student
{
    public $name;
    public $scholarship;

    public function __construct($name, $scholarship)
    {
        $this->name = $name;
        $this->scholarship = $scholarship;
    }
}

$arr = [];

$arr[] = new Employee('Alan', 3500);
$arr[] = new Student('Max', 1000);
$arr[] = new Student('Elena', 1000);
$arr[] = new Student('Sibastian', 1200);
$arr[] = new Employee('Arianna', 2300);

$salary = 0;
$scholarship = 0;

foreach($arr as $unit) {
    if ($unit instanceof Employee) {
        echo 'Worker Name: ' . $unit->getName() . '. - Salary: ' . $unit->getSalary() . '<br>';
        $salary += $unit->getSalary();
    }
    if ($unit instanceof Student) {
        echo 'Student Name: ' . $unit->name . '. - Scholarship: ' . $unit->scholarship . '<br>';
        $scholarship += $unit->scholarship;
    }
}

echo 'Salary Summ of employees: ' . $salary . '<br>';
echo 'Scholarship Summ of students: ' . $scholarship . '<br>';
