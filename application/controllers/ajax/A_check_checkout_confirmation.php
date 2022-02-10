<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_check_checkout_confirmation extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_m_c_payment_method');
    }

    public function index()
    {
        $m_m_c_payment_method_id = ($this->input->post("id"));
        $read_select = $this->m_m_c_payment_method->select_by_id($m_m_c_payment_method_id);
        foreach ($read_select as $key => $value) {
            echo "<table>";
            echo "<tr>";

            echo "<th>";
            echo 'Pilihan Paket';
            echo "</th>";

            echo "<th>";
            echo $value->show_text;
            echo "</th>";

            echo "</tr>";



            echo "<tr>";
            echo "<th>";
            echo "<hr />";
            echo 'Total Harga';
            echo "</th>";

            echo "<th>";
            echo "<hr />";
            echo 'Rp' . number_format($value->value);
            echo "</th>";

            echo "</tr>";
            echo "</table>";
        }
    }
}
