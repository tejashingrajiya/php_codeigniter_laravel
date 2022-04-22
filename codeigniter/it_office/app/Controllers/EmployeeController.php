<?php

namespace App\Controllers;
use App\Models\Employee;
use App\Controllers\BaseController;

class EmployeeController extends BaseController
{
	 // show users list
    public function index()
    {
        $employee = new Employee();
        $data['employees'] = $employee->orderBy('id', 'DESC')->findAll();
        return view('employee/display', $data);
    }
	 // add user form
    public function create(){
	
        return view('employee/create');
    }
	// insert data
    public function store() {
        $employee = new Employee();
        $data = [
            'employee_id'  => $this->request->getVar('employee_id'),
            'employee_name' => $this->request->getVar('employee_name'),
        ];
        $employee->insert($data);
        return $this->response->redirect(base_url('employee/display'));
    }
	 // edit single employee
    public function edit($id){
        $employee = new Employee();
        $data['employee'] = $employee->where('id', $id)->first();
        return view('employee/edit', $data);
    }
    // update user data
    public function update(){
        $employee = new Employee();
        $id = $this->request->getVar('id');
        $data = [
            'employee_id'  => $this->request->getVar('employee_id'),
            'employee_name' => $this->request->getVar('employee_name'),
        ];
        $employee->update($id, $data);
        return $this->response->redirect(base_url('employee/display'));
    }
 
    // delete user
    public function delete($id){
        $employee = new Employee();
        $data['employees'] = $employee->where('id', $id)->delete($id);
        return $this->response->redirect(base_url('employee/display'));
    } 
}
