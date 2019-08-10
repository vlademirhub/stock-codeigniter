<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Geral extends CI_Controller
{

	public function index()
	{
	    if ($this->session->userdata('userId')) { # Check if exists userId session
	        $data = [
	            'userName' => $this->session->userdata('userName')
            ];

            $this->template(['setup/setup' => $data]);
        } else {
            $dataMessages = $this->session->flashdata('error');

            if ($dataMessages) {
                $this->template(['login' => $dataMessages]); # Login screen
            } else {
                $this->template(); # Login screen
            }
        }
	}

	public function checkLogin()
    {
        if ($this->session->userdata('userId')) { # Check if exists userId session
            redirect('/'); # Setup screen
        } else {
            $this->load->model('Users');

            if ($this->Users->checkLogin()) {# Return true or false
                redirect('geral/setup');
            } else {
                $info = [
                    'message' => 'Usuário ou senha inválidos.',
                    'type' => 'danger'
                ];

                $this->session->set_flashdata('error', $info);

                redirect('/');
            }
        }

    }

	public function setup()
    {
        if ($this->session->userdata('userId')) { # Check if exists userId session
            $data = [
                'userName' => $this->session->userdata('userName')
            ];

            $this->template(['setup/setup' => $data]);
        } else {
            redirect('/'); # Login screen
        }
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
        if ($this->session->userdata('userId')) { # Check if exists userId session
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
        } else {
            redirect('/'); # Login screen
        }
    }

    public function insertUsers()
    {
        if ($this->session->userdata('userId')) { # Check if exists userId session
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
        } else {
            redirect('/'); # Login screen
        }
    }

    public function insertProducts()
    {
        if ($this->session->userdata('userId')) { # Check if exists userId session
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
        } else {
            redirect('/'); # Login screen
        }
    }

    public function logout()
    {
        if ($this->session->userdata('userId')) { # Check if exists userId session
            $this->session->set_userdata('userId', FALSE);
            $this->session->set_userdata('userName', FALSE);
            $this->session->sess_destroy();

            redirect('/');
        } else {
            redirect('/'); # Login screen
        }
    }
}

/* End of file Geral.php */
/* Location: ./application/controllers/Geral.php */