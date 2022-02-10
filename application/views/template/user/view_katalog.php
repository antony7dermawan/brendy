<?php
// foreach ($company_status as $key => $value) {
//   $expire_date = $value->expire_date;

//   $created_date = date('Y-m-d', ($value->created_date));


// }






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
        <h3>Katalog Usaha Tiktok 

        <button class="kasir_title"  onclick='func_pop();' >@storebycici</button>

        

        <script>
       
        
        function func_pop()
        {
          window.open('https://www.tiktok.com/discover/storebycici','_blank');
        }
        </script>
        </h3>
        <p>Yuk Join sebelum Kehabisan!</p>
      </header>

      <div class="row about-container">


        <div class="col-lg-6 content order-lg-1 order-2">


          

          <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
            <h4 class="title"><a>1. Paket Reseller Pewangi Pakaian</a></h4>

            <form action="<?php echo base_url('katalog/paket_pewangi_1') ?>" method="post">
              
              <div class="row">
                <div class="col-25">
                  <label for="fname">Sirens & Love</label>
                </div>
                <div class="col-75">
                  <label for="fname">20 Botol</label>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Roseanne Scarlet</label>
                </div>
                <div class="col-75">
                  <label for="fname">20 Botol</label>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Miss Pandora</label>
                </div>
                <div class="col-75">
                  <label for="fname">20 Botol</label>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Packing Kardus</label>
                </div>
                <div class="col-75">
                  <label for="fname">60 Kardus</label>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Minigold</label>
                </div>
                <div class="col-75">
                  <label for="fname">1 pcs</label>
                </div>
              </div>

          


              <div class="row">
                <div class="col-25">
                  <label for="fname">Total Harga</label>
                </div>
                <div class="col-75">
                  <input type="button"  name="return_data" placeholder="" id="return_data"  class="input-text" value="1,600,000">
                </div>
              </div>


              
      
              
                <br/>
                <a>
                  Note: <a style="color:red;"><?= $this->session->userdata('username')  ?></a><br> 
                  Isi Paket Sesuai Dengan Gambar</a>
                </a><br/><br/>

                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Checkout Paket Pewangi Pakaian</button>




              <!-- Modal -->
              <div class="modal fade" id="myModal1" role="dialog">
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










        <div class="col-lg-6 content order-lg-2 order-2">
         
          <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
            <h4 class="title"><a>2. Paket Usaha Bandel Besar</a></h4>

            <form action="<?php echo base_url('katalog/paket_bandel_besar') ?>" method="post">
              
              <div class="row">
                <div class="col-25">
                  <label for="fname">Coat / Blazer</label>
                </div>
                <div class="col-75">
                  <label for="fname">15 Baju</label>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Plastik Packing Premium</label>
                </div>
                <div class="col-75">
                  <label for="fname">15 Lembar</label>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Pewangi Pakaian</label>
                </div>
                <div class="col-75">
                  <label for="fname">1 Botol Sirens & Love</label>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Minigold</label>
                </div>
                <div class="col-75">
                  <label for="fname">1 pcs</label>
                </div>
              </div>


     

          


              <div class="row">
                <div class="col-25">
                  <label for="fname">Total Harga</label>
                </div>
                <div class="col-75">
                  <input type="button"  name="return_data" placeholder="" id="return_data"  class="input-text" value="1,275,000">
                </div>
              </div>


              
      
              
                <br/>
                <a>
                  Note: <a style="color:red;"><?= $this->session->userdata('username')  ?></a><br> 
                  Isi Paket Sesuai Dengan Gambar</a>
                </a><br/><br/>

                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Checkout Paket Usaha Bandel Besar</button>




              <!-- Modal -->
              <div class="modal fade" id="myModal2" role="dialog">
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


        <div class="col-lg-6 background order-lg-2 order-2 wow fadeInUp">
          <img src="<?php echo base_url() ?>assets/NewBiz/img/promo_gratis_receipt.jpg" class="img-fluid" alt="">
        </div>










        <div class="col-lg-6 content order-lg-3 order-3">
         
          <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
            <h4 class="title"><a>3. Paket Usaha Bandel Kecil</a></h4>

            <form action="<?php echo base_url('katalog/paket_bandel_kecil') ?>" method="post">
              
              <div class="row">
                <div class="col-25">
                  <label for="fname">Coat / Blazer</label>
                </div>
                <div class="col-75">
                  <label for="fname">15 Baju</label>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Plastik Packing Premium</label>
                </div>
                <div class="col-75">
                  <label for="fname">15 Lembar</label>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Pewangi Pakaian</label>
                </div>
                <div class="col-75">
                  <label for="fname">1 Botol Sirens & Love</label>
                </div>
              </div>

          


              <div class="row">
                <div class="col-25">
                  <label for="fname">Total Harga</label>
                </div>
                <div class="col-75">
                  <input type="button"  name="return_data" placeholder="" id="return_data"  class="input-text" value="825,000">
                </div>
              </div>


              
      
              
                <br/>
                <a>
                  Note: <a style="color:red;"><?= $this->session->userdata('username')  ?></a><br> 
                  Isi Paket Sesuai Dengan Gambar</a>
                </a><br/><br/>

                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Checkout Paket Usaha Bandel Kecil</button>




              <!-- Modal -->
              <div class="modal fade" id="myModal3" role="dialog">
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


        <div class="col-lg-6 background order-lg-3 order-3 wow fadeInUp">
          <img src="<?php echo base_url() ?>assets/NewBiz/img/promo_gratis_receipt.jpg" class="img-fluid" alt="">
        </div>









        <div class="col-lg-6 content order-lg-4 order-4">
         
          <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
            <h4 class="title"><a>4. Paket Usaha Paket Reject</a></h4>

            <form action="<?php echo base_url('katalog/paket_reject') ?>" method="post">
              




              <div class="row">
                <div class="col-25">
                  <label for="fname">Coat / Blazer</label>
                </div>
                <div class="col-75">
                  <label for="fname">15 Baju</label>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Plastik Packing Premium</label>
                </div>
                <div class="col-75">
                  <label for="fname">15 Lembar</label>
                </div>
              </div>

          


              <div class="row">
                <div class="col-25">
                  <label for="fname">Total Harga</label>
                </div>
                <div class="col-75">
                  <input type="button"  name="return_data" placeholder="" id="return_data"  class="input-text" value="525,000">
                </div>
              </div>


              
      
              
                <br/>
                <a>
                  Note: <a style="color:red;"><?= $this->session->userdata('username')  ?></a><br> 
                  Isi Paket Sesuai Dengan Gambar</a>
                </a><br/><br/>

                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">Checkout Paket Usaha Reject</button>




              <!-- Modal -->
              <div class="modal fade" id="myModal4" role="dialog">
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


        <div class="col-lg-6 background order-lg-4 order-4 wow fadeInUp">
          <img src="<?php echo base_url() ?>assets/NewBiz/img/promo_gratis_receipt.jpg" class="img-fluid" alt="">
        </div>



      </div>



      <br><br>







    </div>
  </section><!-- #about -->


</main>














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


