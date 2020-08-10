<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';

    protected $returnType = 'App\Entities\Student';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['first_name', 'last_name', 'dob', 'gender'];

    protected $useTimestamps = true;

    protected $validationRules = [
        'first_name' => 'required|alpha|max_length[50]',
        'last_name' => 'required|alpha|max_length[50]',
        'dob' => 'required|valid_date|check_dob',
        'gender' => 'required',
    ];

    protected $validationMessages = [
        'first_name' => [
            'required' => 'This field is required',
            'max_length' => 'This field cannot exceed {param} characters in length.',
            'alpha' => 'This field may only contain alphabetical characters.',
        ],
        'last_name' => [
            'required' => 'This field is required',
            'max_length' => 'This field field cannot exceed {param} characters in length.',
            'alpha' => 'This field may only contain alphabetical characters.',
        ],
        'dob' => [
            'required' => 'This field is required',
            'check_dob' => 'Age must be between 18 to 30 years.',
        ],
        'gender' => [
            'required' => 'This field is required',
        ],
    ];
    protected $skipValidation = false;

    public $enum = [
        'gender' => [
            'female' => 'Female',
            'male' => 'Male',
            'transgender' => 'Transgender',
        ],
    ];

    public function findIndex(array $queryParams = [])
    {
        $query = $this
            ->orderBy('id', 'desc');

        if (isset($queryParams['keyword'])) {
            $query
                ->like('first_name', $queryParams['keyword'])
                ->orLike('last_name', $queryParams['keyword'])
                ->orLike('gender', $queryParams['keyword'])
                ->orLike('dob', $queryParams['keyword']);
        }

        return $query->paginate(2);
    }
}
