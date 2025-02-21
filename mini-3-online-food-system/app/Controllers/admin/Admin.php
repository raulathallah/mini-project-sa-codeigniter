<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Product;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    protected $helpers = ['date'];
    private $product_model;

    public function __construct()
    {
        // Load helper secara manual
        helper($this->helpers);
        $this->product_model = new M_Product();
    }

    public function index()
    {
        $parser = \Config\Services::parser();

        $pageData = [
            'statistics' => [
                [
                    'total_user' => 3,
                    'total_product' => 5,
                    'new_order' => 4,
                    'monthly_grow' => 12.7,
                ]
            ],
            'page_title' => 'Online Food System',
            'product_statistics_cell' => view_cell('ProductStatisticsCell', ['products' => $this->product_model->getAllProduct()], HOUR, 'cache_product_statistics'),
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
