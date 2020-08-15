<?php
namespace App\Controllers;

use App\Models\StudentModel;

class Student extends BaseController
{
    protected $helpers = ['url', 'form'];
    protected $model = null;
    protected $validation = null;
    protected $listingUrl = null;

    public function __construct()
    {
        $this->model = new StudentModel();
        $this->validation = $this->model->validation;
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

        $saved = $this->model->saveRecord($this->request->getPost());

        if (!$saved) {
            $viewVars['record'] = $this->request->getPost();

            return view($template, $viewVars);
        }

        $this->session->setFlashdata('success', 'Successfully created record');

        return redirect()->to($this->listingUrl);
    }

    public function edit($id)
    {
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

        $saved = $this->model->saveRecord($this->request->getPost());

        if (!$saved) {
            $viewVars['record'] = $this->request->getPost();

            return view($template, $viewVars);
        }

        $this->session->setFlashdata('success', 'Successfully edited record');

        return redirect()->to($this->listingUrl);
    }

    public function delete($id)
    {
        if ($this->model->deleteRecord($id)) {
            $this->session->setFlashdata('success', 'Successfully deleted record');
        } else {
            $this->session->setFlashdata('error', 'Could not delete record');
        }

        return redirect()->to($this->listingUrl);
    }
}
