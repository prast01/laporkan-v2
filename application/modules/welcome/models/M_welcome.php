<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_welcome extends CI_Model
{

    public $username_user;
    public $pass_user;

    public function cek_login()
    {
        $post = $this->input->post();
        $this->username_user = $post['user'];
        $this->pass_user = hash('sha256', $post['password']);

        if ($this->db->get_where('tb_user', ['username_user' => $this->username_user, 'pass_user' => $this->pass_user])->row() != null) {
            $token = $this->get_token();
            $res = array("res" => 1, "data" => $this->db->get_where('tb_user', ['username_user' => $this->username_user, 'pass_user' => $this->pass_user])->row(), "token" => $token);
        } else {
            $res = array("res" => 0, "msg" => "Username atau Password anda salah");
        }
        return json_encode($res);
    }

    public function getPegawai($id_pegawai)
    {
        $res = array("res" => 1, "data" => $this->db->get_where('tb_pegawai', ['id_pegawai' => $id_pegawai])->row());
        return json_encode($res);
    }

    public function getPosisi($posisi)
    {
        $res = array("res" => 1, "data" => $this->db->get_where('tb_posisi', ['id_posisi' => $posisi])->row());
        return json_encode($res);
    }
    public function getLevel($level)
    {
        $res = array("res" => 1, "data" => $this->db->get_where('tb_level_user', ['id_level_user' => $level])->row());
        return json_encode($res);
    }

    public function search($title)
    {
        $this->db->where(["level_user" => "3"]);
        $this->db->like('username_user', $title, 'both');
        $this->db->order_by('username_user', 'ASC');
        $this->db->limit(5);
        return $this->db->get('tb_user')->result();
    }


    // GET TOKEN
    private function get_token()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://admin.corona.jatengprov.go.id/api/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('username' => 'jeparakab@tanggap.in', 'password' => '70l935803'),
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Content-Type: multipart/form-data"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $hsl = json_decode($response, true);
        // $token = $hsl['token_type'] . " " . $hsl['access_token'];
        $token = $hsl['access_token'];

        return $token;
    }
}

/* End of file M_welcome.php */
