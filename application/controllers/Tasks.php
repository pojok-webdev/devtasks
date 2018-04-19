<?php
class Tasks extends CI_Controller{
    function __construct(){
        parent::__construct();
        $_SESSION['username'] = 'puji';
        $this->load->model("task");
    }
    function add(){
        $data = array(
            'feedData'=>'Tasks',
            'formtitle'=>'Penambahan Task',
            'role'=>1
        );
        $this->load->view("tasks/add",$data);
    }
    function edit(){
        $id = $this->uri->segment(3);
        $task = $this->task->get($id);
        $data = array(
            'feedData'=>'Tasks',
            'formtitle'=>'Edit Task',
            'obj'=>$task,
            'role'=>1
        );
        $this->load->view("tasks/edit",$data);
    }
    function index(){
        $tasks = $this->task->gets();
        $data = array(
            'feedData'=>'Tasks',
            'formtitle'=>'Tasks',
            'objs'=>$tasks["result"],
            'total'=>$tasks["total"],
            'role'=>1
        );
        $this->load->view('tasks/index',$data);
    }
    function save(){
        $params = $this->input->post();
        $this->task->save($params);
        redirect('/tasks');
    }
    function update(){
        $params = $this->input->post();
        $this->task->update($params);
        redirect('/tasks');
    }
}