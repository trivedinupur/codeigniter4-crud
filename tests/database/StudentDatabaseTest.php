<?php
namespace Tests\Database;

use App\Models\StudentModel;
use CodeIgniter\Test\CIDatabaseTestCase;

class StudentDatabaseTest extends CIDatabaseTestCase
{
    protected $studentModel;

    public function setUp(): void
    {
        parent::setUp();

        $this->studentModel = new StudentModel();

        // Extra code to run before each test
    }

    public function testModelIndex()
    {
        $records = $this->studentModel->findIndex();

        // Make sure the count is as expected
        $this->assertCount(2, $records);
    }

    public function testModelSaveRecord()
    {
        $data = [
            'first_name' => 'test',
            'last_name' => 'test',
            'dob' => '1990-10-12',
            'gender' => 'female',
        ];
        $saved = $this->studentModel->saveRecord($data);

        $this->assertTrue($saved);
    }

    public function testModelDeleteRecord()
    {
        $deleted = $this->studentModel->deleteRecord(29) === false ? false : true;

        $this->assertTrue($deleted);
    }
}
