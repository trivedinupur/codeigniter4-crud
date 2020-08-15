<?php
namespace CodeIgniter;

use CodeIgniter\Test\ControllerTester;

class StudentTest extends \CodeIgniter\Test\CIUnitTestCase
{
    use ControllerTester;

    public function testStudentIndex()
    {
        $result = $this->controller(\App\Controllers\Student::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
    }

    public function testStudentEdit()
    {
        $result = $this->controller(\App\Controllers\Student::class)
            ->execute('edit', 6);

        $this->assertTrue($result->isOK());
    }
}
