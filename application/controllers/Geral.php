<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Geral extends CI_Controller
{

	public function index()
	{
        $this->template();
	}

	public function checkLogin()
    {
        $this->load->model('Users');

        if ($this->Users->checkLogin()) {# Return true or false
            echo 'OK';
        } else {
            echo 'Não!';
        }

        var_dump($this->session->userdata());
        die;
    }

	public function setup()
    {
        $data = [];

        $this->template(['setup/setup' => $data]);
    }

    private function template($views = ['login' => []])
    {
        $this->load->view('layout/header');
        $this->load->view('layout/nav');

        foreach ($views as $view => $data) {
            $this->load->view($view, $data);
        }

        $this->load->view('layout/footer');
        $this->load->view('layout/bottom');
    }

    public function resetDatabase()
    {
        $dataSetup = [];

        // Clean data of database
        $this->load->model('DataBase');
        $this->DataBase->reset();

        $dataMessages = [# Show view of the messages
            'message' => 'Sistema de base de dados reiniciado.',
            'type' => 'success'
        ];

        $this->template([
            'setup/setup' => $dataSetup,
            'layout/messages' => $dataMessages
        ]);
    }

    public function insertUsers()
    {
        $dataSetup = [];

        $this->load->model('DataBase');
        $this->DataBase->insertUsers();# Insert three users fake

        $dataMessages = [# Show view of the messages
            'message' => 'Inseridos 3 usuários com sucesso.',
            'type' => 'success'
        ];

        $this->template([
            'setup/setup' => $dataSetup,
            'layout/messages' => $dataMessages
        ]);
    }

    public function insertProducts()
    {
        $dataSetup = [];

        $this->load->model('DataBase');
        $this->DataBase->insertProducts();# Insert three products with movements

        $dataMessages = [# Show view of the messages
            'message' => 'Inseridos 3 produtos e seus movimentos com sucesso.',
            'type' => 'success'
        ];

        $this->template([
            'setup/setup' => $dataSetup,
            'layout/messages' => $dataMessages
        ]);
    }
}

/* End of file Geral.php */
/* Location: ./application/controllers/Geral.php */