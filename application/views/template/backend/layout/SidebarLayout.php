<div class="pcoded-navigation-label">Navigation</div>
<ul class="pcoded-item pcoded-left-item">


    <!-- Diluar Grouping disini -->
    <li <?php if ($this->uri->segment(2) == "buku_besar") {
            echo 'class="pcoded-hasmenu"';
        } ?>>
        <a href="<?= base_url("a_c_dashboard/"); ?>" class="waves-effect waves-dark">
            <span class="pcoded-micon">
                <i class="feather icon-credit-card"></i>
            </span>
            <span class="pcoded-mtext">Dashboard</span>
        </a>


       

        <a href="<?= base_url("a_c_t_web_visit/"); ?>" class="waves-effect waves-dark">
            <span class="pcoded-micon">
                <i class="feather icon-credit-card"></i>
            </span>
            <span class="pcoded-mtext">Web Visit Transaction</span>
        </a>


    </li>










</ul>