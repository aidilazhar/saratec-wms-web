<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
    function __construct()
    {
        $this->title = "Roles";
        parent::__construct();
        if (is_logged_in() == false) {
            logout();
            redirect(base_url(LOGIN_URL));
        }

        $this->load->model('Authentication_model');
        $this->load->model('Role_model');
        $this->load->model('Permission_model');
    }

    public function index()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Roles Listing",
            'view' => 'roles/index',
            'back' => null,
        ];

        $roles = $this->Role_model->list();

        $this->load->view('master/index', compact('page', 'roles'));
    }

    public function create()
    {
        $page = [
            'title' => $this->title,
            'subtitle' => "Create Role",
            'view' => 'roles/create',
            'back' => base_url("roles"),
        ];

        $this->load->view('master/index', compact('page'));
    }

    public function store()
    {
        redirect(base_url("roles"));
    }

    public function edit($user_id)
    {
        $user_id = decode($user_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Edit Role",
            'view' => 'roles/edit',
            'back' => base_url("users"),
        ];

        $role = $this->roles[array_search($user_id, array_column($this->roles, 'id'))];

        $this->load->view('master/index', compact('page', 'role'));
    }

    public function update()
    {
        redirect(base_url("roles"));
    }

    public function show($role_id)
    {
        $role_id = decode($role_id);
        $page = [
            'title' => $this->title,
            'subtitle' => "Permission",
            'view' => 'roles/show',
            'back' => base_url("roles"),
        ];

        $perms = $this->Permission_model->list();

        $permissions = [];

        foreach ($perms as $key => $perm) {
            if (!isset($permissions[$perm['parent']])) {
                $permissions[$perm['parent']] = [];
            }

            $permissions[$perm['parent']][] = [
                'id' => $perm['id'],
                'name' => $perm['name']
            ];
        }

        $perm_role = $this->Permission_model->details($role_id);

        $this->load->view('master/index', compact('page', 'perm_role', 'permissions', 'role_id'));
    }

    public function delete()
    {
        redirect(base_url("roles"));
    }

    public function permissionUpdate($role_id)
    {
        $role_id = decode($role_id);

        $posts = $this->input->post('permission');

        $this->Permission_model->delete($role_id);

        foreach ($posts as $post) {
            $data = [
                'permission_id' => $post,
                'role_id' => $role_id,
            ];
            $this->Permission_model->store($data);
        }

        $perms = $this->Permission_model->details($role_id);
        $permissions = $this->Permission_model->permissions($perms);

        $this->session->set_userdata('permissions', $permissions);

        redirect(base_url("roles/" . encode($role_id)));
    }
}
