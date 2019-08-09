<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DataBase extends CI_Model
{
    public function reset()
    {
        // (TRUNCATE TABLE) Manually

        $this->db->empty_table('users'); # Delete from users all users
        $this->db->empty_table('products'); # Delete from products all products
        // When clean the table of the products automatically clear of the movements

        // Reset AUTO_INCREMENT
        $this->db->query('ALTER TABLE users AUTO_INCREMENT = 1');
        $this->db->query('ALTER TABLE products AUTO_INCREMENT = 1');
        $this->db->query('ALTER TABLE movements AUTO_INCREMENT = 1');
    }

    public function insertUsers()
    {
        // Insert test users

        // (TRUNCATE TABLE) Manually
        $this->db->empty_table('users'); # Delete from users all users
        $this->db->query('ALTER TABLE users AUTO_INCREMENT = 1');

        $data = [
            'username' => 'admin',
            'password' => md5('admin')
        ];

        $this->db->insert('users', $data);

        $data = [
            'username' => 'ana',
            'password' => md5('ana')
        ];

        $this->db->insert('users', $data);

        $data = [
            'username' => 'rui',
            'password' => md5('rui')
        ];

        $this->db->insert('users', $data);
    }

    public function insertProducts()
    {
        // Insert test products and movements

        // (TRUNCATE TABLE) manually
        $this->db->empty_table('products');
        $this->db->query('ALTER TABLE products AUTO_INCREMENT = 1');

        $data = [
            [
                'designation' => 'Ryzen Threadripper 2970WX',
                'quantity' => 10
            ],
            [
                'designation' => 'Ryzen 5 1600',
                'quantity' => 20
            ],
            [
                'designation' => 'Ryzen 7 2700',
                'quantity' => 30
            ]
        ];

        $this->db->insert_batch('products', $data); # Insert multiples data

        // (TRUNCATE TABLE) manually
        $this->db->empty_table('movements');
        $this->db->query('ALTER TABLE movements AUTO_INCREMENT = 1');

        $data = [
            [
                'product_id' => 1,
                'quantity' => 10,
                'date' => date('Y-m-d H:m:s')
            ],
            [
                'product_id' => 2,
                'quantity' => 20,
                'date' => date('Y-m-d H:m:s')
            ],
            [
                'product_id' => 3,
                'quantity' => 30,
                'date' => date('Y-m-d H:m:s')
            ]
        ];

        $this->db->insert_batch('movements', $data); # Insert multiples data
    }
}

/* End of file DataBase.php */
/* Location: ./application/models/DataBase.php */