<?php
require_once 'User.php';

class Student extends User
{
    private $course;

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;
    }

    public function setAge($age)
		{
			// Если возраст меньше или равен 25:
			if ($age <= 25) {
				// Вызываем метод родителя:
                parent::setAge($age);
			}
		}
}
