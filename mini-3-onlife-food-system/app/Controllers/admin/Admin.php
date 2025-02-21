<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    protected $helpers = ['date'];

    public function __construct()
    {
        // Load helper secara manual
        helper($this->helpers);
    }

    public function index()
    {
        $parser = \Config\Services::parser();

        $pageData = [
            'statistics' => [
                [
                    'total_user' => 24,
                    'total_product' => 5,
                    'new_order' => 4,
                    'monthly_grow' => 12.7,
                ]
            ],
            'page_title' => 'Online Food Ordering System'
        ];

        $data['content'] = $parser->setData($pageData)->render('parser/admin/dashboard_statistics');
        return view('section_admin/dashboard', $data);
    }
}
