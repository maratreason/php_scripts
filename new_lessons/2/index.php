<?
    require_once 'Student.php';
    require_once 'EmployeesCollection.php';
    require_once 'Employee.php';

    $student = new Student;
	
	$student->setAge(24);    // укажем корректный возраст
	echo $student->getAge() . '<br>'; // выведет 24 - возраст поменялся
	
	$student->setAge(30);    // укажем некорректный возраст
	echo $student->getAge() . '<br>'; // выведет 24 - возраст не поменялся

    $employeesCollection = new EmployeesCollection;
	
	$employeesCollection->add(new Employee('john', 100));
	$employeesCollection->add(new Employee('eric', 200));
	$employeesCollection->add(new Employee('kyle', 300));
	
	echo $employeesCollection->getTotalSalary() . '<br>'; // выведет 600

	echo '<pre>';
    print_r($employeesCollection->get());
	echo '</pre>';