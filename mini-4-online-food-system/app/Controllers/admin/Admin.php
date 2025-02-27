<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Product;
use App\Models\ProductModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    protected $helpers = ['date'];
    private $modelUser;
    private $modelProduct;

    public function __construct()
    {
        // Load helper secara manual
        helper($this->helpers);
        $this->modelUser = new UserModel();
        $this->modelProduct = new ProductModel();
    }

    public function index()
    {
        $parser = \Config\Services::parser();

        $allUser = $this->modelUser->findAll();
        $allProduct = $this->modelProduct->findAll();

        $pageData = [
            'userStatistics' => [
                [
                    'total_users' => $this->modelUser->getTotalUsers($allUser),
                    'active_users' => count($this->modelUser->findActiveUsers($allUser)),
                    'new_users_this_month' => 0,
                    'growth_percentage' => 0
                ]
            ],
            'page_title' => 'Online Food System',
            'product_statistics_cell' => view_cell('ProductStatisticsCell', ['products' => $allProduct], HOUR, 'cache_product_statistics'),
        ];

        $data['content'] = $parser->setData($pageData)->render('parser/admin/dashboard_statistics');
        return view('section_admin/dashboard', $data);
    }

    public function getUsers()
    {
        $table = new \CodeIgniter\View\Table();
        $users = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'dob' => new Time('2000-06-10'),
                'age' => 25,
                'gender' => 'Male',
                'status' => 'ACTIVE',
                'activity_history' => null
            ],
            [
                'id' => 2,
                'name' => 'Rayen Exa',
                'dob' => new Time('2000-05-13'),
                'age' => 25,
                'gender' => 'Male',
                'status' => 'ACTIVE',
                'activity_history' => null
            ],
            [
                'id' => 3,
                'name' => 'Valeni Ferna',
                'dob' => new Time('2000-02-16'),
                'age' => 25,
                'gender' => 'Female',
                'status' => 'INACTIVE',
                'activity_history' => null
            ],
        ];


        $table->addRow(["ID", "Nama", "Date of Birth", 'Age', 'Gender', 'Status']);
        foreach ($users as $row) {
            $row['dob'] = date('F d, Y', strtotime($row['dob']));
            $table->addRow($row);
        }

        return view('section_admin/user_list', ['table' => $table->generate(), 'cache' => MINUTE * 15, 'cache_name' => 'cache_user_list']);
    }
}
