<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model
{
    public function checkLogin()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

//        $params = [
//            $username,
//            $password
//        ];

//        $result = $this->db
//            ->query(
//                'SELECT * FROM
//                 users
//                 WHERE username = ?
//                 AND password = ?',
//                $params
//            ); //TRADITIONAL

        $result = $this->db->from('users')
            ->where('username', $username)
            ->where('password', $password)
            ->get();

        if ($result->num_rows() == 0) {
            return FALSE; # Invalid login
        }

        $userData = $result->row(); # Get user data

        $this->session->set_userdata('userId', $userData->id);
        $this->session->set_userdata('userName', $userData->username);

        return TRUE; # Valid Login
    }
}

/* End of file Users.php */
/* Location: ./application/models/Users.php */