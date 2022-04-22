<?php

namespace App\Controllers;
use App\Models\Customer;
use App\Controllers\BaseController;

class CustomerController extends BaseController
{
	 // show users list
    public function index()
    {
         $customer = new Customer();
        $data['customers'] = $customer->orderBy('id', 'DESC')->findAll();
        return view('customer/list',$data);
    }
	 // add user form
    public function create(){
        return view('customer/create');
    }
 
    // insert data
    public function store() {
        $customer = new Customer();
        $data = [
            'name' => $this->request->getVar('name'),
            'mobile'  => $this->request->getVar('mobile'),
        ];
        $customer->insert($data);
        return $this->response->redirect(base_url('customer'));
    }
	 // show single user
    public function edit($id){
        $customer = new Customer();
        $data['customers'] = $customer->where('id', $id)->first();
        return view('customer/edit', $data);
    }
    // update user data
    public function update(){
        $customer = new Customer();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'mobile'  => $this->request->getVar('mobile'),
        ];
        $customer->update($id, $data);
        return $this->response->redirect(base_url('customer'));
    }
 
    // delete user
    public function delete($id){
        $customer = new Customer();
        $data['customers'] = $customer->where('id', $id)->delete($id);
        return $this->response->redirect(base_url('customer'));
    }    
}
