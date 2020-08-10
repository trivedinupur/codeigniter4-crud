<?php
namespace App\Controllers;

use App\Models\StudentModel;
use Config\Services;

class Student extends BaseController
{
    protected $helpers = ['url', 'form'];
    protected $model = null;

    public function __construct()
    {
        $this->model = new StudentModel();
        $this->validation = Services::validation();
        $this->listingUrl = base_url('student');
    }

    public function index()
    {
        $queryParams = $this->request->fetchGlobal('get');
        $data = [
            'students' => $this->model->findIndex($queryParams),
            'genderEnum' => $this->model->enum['gender'],
            'pager' => $this->model->pager,
            'queryParams' => $queryParams,
            'listingUrl' => $this->listingUrl,
            'title' => 'Students',
        ];

        return view('/student/index', $data);
    }

    public function add()
    {
        $template = 'student/edit';
        $viewVars = [
            'validation' => $this->validation,
            'genderEnum' => $this->model->enum['gender'],
            'type' => 'add',
            'formUrl' => base_url('/student/add'),
            'title' => 'Add Student',
        ];

        if ($this->request->getMethod() !== 'post') {
            return view($template, $viewVars);
        }

        $this->validation->reset();
        $this->validation->setRules(
            $this->model->getValidationRules(),
            $this->model->getValidationMessages()
        );

        $isValid = $this->validation->withRequest($this->request)
           ->run();

        if (!$isValid) {
            $viewVars['record'] = $this->request->getPost();

            return view($template, $viewVars);
        }

        if ($this->model->save($this->request->getPost())) {
            $this->session->setFlashdata('success', 'Successfully created record');
        } else {
            $this->session->setFlashdata('error', 'Some error occured while saving record');
        }

        return redirect()->to($this->listingUrl);
    }

    public function edit($id = null)
    {
        if (empty($id)) {
            $this->session->setFlashdata('error', 'Incomplete url');

            return redirect()->to($this->listingUrl);
        }

        $template = 'student/edit';

        $record = $this->model->find($id);

        $viewVars = [
            'validation' => $this->validation,
            'genderEnum' => $this->model->enum['gender'],
            'type' => 'add',
            'formUrl' => base_url('/student/edit/' . $id),
            'title' => 'Edit Student' . ' #' . $record->id . ' [' . $record->name() . ']',
            'record' => $record->toArray(),
        ];

        if (!in_array($this->request->getMethod(), ['post', 'put'], true)) {
            return view($template, $viewVars);
        }

        $this->validation->reset();
        $this->validation->setRules(
            $this->model->getValidationRules(),
            $this->model->getValidationMessages()
        );

        $isValid = $this->validation->withRequest($this->request)
           ->run();

        if ($isValid) {
            if ($this->model->save($this->request->getPost())) {
                $this->session->setFlashdata('success', 'Successfully edited record');
            } else {
                $this->session->setFlashdata('error', 'Some error occured while saving record');
            }

            return redirect()->to($this->listingUrl);
        } else {
            $viewVars['record'] = $this->request->getPost();
        }

        return view($template, $viewVars);
    }

    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            $this->session->setFlashdata('success', 'Successfully deleted record');
        } else {
            $this->session->setFlashdata('error', 'Could not delete record');
        }

        return redirect()->to($this->listingUrl);
    }
}
