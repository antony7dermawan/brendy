<?php
foreach ($company_status as $key => $value) {
  $expire_date = $value->expire_date;

  $created_date = date('Y-m-d', ($value->created_date));


}




?>







<!-- lib modal-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<style>


input[type=button], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  color: black;
  text-align: left;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}



.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
  margin-left: 20px;
}

.col-75 {
  float: left;
  width: 50%;
  margin-top: 6px;
  margin-left: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

<main id="main">

  <!--==========================
      About Us Section
    ============================-->
  <section id="status_kasir">
    <div class="container">
      <br><br><br><br>
      <header class="section-header">
        <h3>Status 

        <button class="kasir_title"  onclick='func_pop();' >kasir-acien.online</button>

        

        <script>
        <?php

        if($created_date == date('Y-m-d'))
        {
          //echo "setTimeout(func_pop, 10000);";
        }
        ?>
        
        function func_pop()
        {
          window.open('https://kasir-acien.online/','_blank');
        }
        </script>
        </h3>
        <p>Silahkan melakukan payment sebelum expire date</p>
      </header>

      <div class="row about-container">


        <div class="col-lg-6 content order-lg-1 order-2">
          <p>

          </p>

          <div class="icon-box wow fadeInUp">

            <h4 class="title"><a href="">Expire Date</a></h4>
            <p class="description">Masa Berlaku Aplikasi <a href='https://kasir-acien.online/' target="_blank">kasir-acien.online</a> Berakhir pada
            <h1 class='expire_date_warning'><?= date('d-M-Y', strtotime($expire_date)) ?></h1>
            </p>
          </div>

          <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
            <h4 class="title"><a href="">Pilih Paket</a></h4>

            <form action="<?php echo base_url('status_kasir/tambah') ?>" method="post">
              



              <div class="row">
                <div class="col-25">
                  <label for="fname">Username</label>
                </div>
                <div class="col-75">
                  <input type="button" name="username" placeholder="username" id="username" minlength="5" maxlength="100" class="input-text" value="<?= $this->session->userdata('username')  ?>">
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label for="fname">Pilihan Paket</label>
                </div>
                <div class="col-75">
                  <select required name="m_c_payment_method_id" class='m_c_payment_method_id' id='m_c_payment_method_id'>
                        <option value="" disabled selected>Pilih Paket</option>
                        <?php
                        foreach ($pilihan_payment as $key => $value) {
                          echo "<option value='" . $value->id . "' >".$value->show_text . ' - Rp' . number_format($value->value)."</option>";
                        }
                        ?>
                  </select>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Total Harga</label>
                </div>
                <div class="col-75">
                  <input type="button"  name="return_data" placeholder="" id="return_data"  class="input-text" value="">
                </div>
              </div>


              
      
              
                <br/>
                <a>
                  Note: Username <a style="color:red;"><?= $this->session->userdata('username')  ?></a><br> 
                  dan password pada saat Anda registrasi<br>
                  digunakan untuk login pada halaman <a href='https://kasir-acien.online/' target="_blank">kasir-acien.online</a>
                </a><br/><br/>

                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Checkout</button>




              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Konfirmasi Pesanan</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                      <p class='return_data2'></p>
                    </div>

                    <div class="modal-footer">
                      <input type="submit" name="checkout" class="btn btn-info btn-lg" value="Checkout">

                    </div>
                  </div>

                </div>
              </div>

            </form>
          </div>



        </div>


        <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
          <img src="<?php echo base_url() ?>assets/NewBiz/img/promo_gratis_receipt.jpg" class="img-fluid" alt="">
        </div>
      </div>
      <br><br>



    </div>
  </section><!-- #about -->


</main>














<script type="text/javascript">

$(document).ready(function () {

    $('#ph2').mouseenter(function () {

      var html = '';

        $(this).find('option').each(function () {

            if ($(this).css('display') !== 'none') {

                html = html + '<option>' + $(this).text() + '</option>';   
            }
        });

        $(this).html(html);
    })
});

  $(document).ready(function() {

    $(".m_c_payment_method_id").change(function() {
      var m_c_payment_method_id = $(this).val();
      var post_id = 'id=' + m_c_payment_method_id;

      $.ajax({
        type: "POST",
        url: '<?php echo base_url('ajax/A_check_checkout_value') ?>',
        data: post_id,
        cache: false,
        success: function(reading_feedback) {
          

          document.getElementById("return_data").value=reading_feedback;
          

          console.log(reading_feedback);
        }
      });









      $.ajax({
        type: "POST",
        url: '<?php echo base_url('ajax/A_check_checkout_confirmation') ?>',
        data: post_id,
        cache: false,
        success: function(reading_feedback2) {
          $(".return_data2").html(reading_feedback2);

          console.log(reading_feedback2);
        }
      });



    });
  });







  mycode();

  function mycode() {


    var value1 = document.getElementById("m_c_payment_method_id").value;
    var value = document.getElementById("m_c_payment_method_id").label;




    tid = setTimeout(mycode, 500); // repeat myself
  }
</script>





<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js" type="text/javascript"></script>

<style type="text/css">
  .expire_date_warning {
    color: red;
    font-weight: bold;
  }

  .img-fluid {
    height: 600px;
  }


  table tr th {
    min-width: 130px;
  }


  .kasir_title
  {
    border-color: red;
    border-radius: 10px;
    border-width: 5px;
    color: black;
    background-color: white;
  }
  .perintah
  {
    color: red;
    font-size: 15px;
  }
</style>



<!------------------------------------------ MENCOBA CUSTOM CONTROL !------------------------------------>


