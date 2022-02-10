<?php

$paid = "<br> Bukti Pembayaran Sudah Diterima,<br> menunggu konfirmasi (maksimal 12 jam)";
foreach ($company_status as $key => $value) {
  $expire_date = $value->expire_date;
}


foreach ($select_existing_payment as $key => $value) {
  $date = $value->date;
  $time = $value->time;
  $username = $value->username;
  $total_day = $value->total_day;
  $payment_value = $value->payment_value;
  $payment_photo = $value->payment_photo;
  $aproval = $value->aproval;
  if ($aproval == 'f') {
    $aproval_text = 'Belum Diterima';
  }

  if ($aproval == 't') {
    $aproval_text = "Pembayaran Diterima </a>";
  }

  $status_pembayaran = '';
  $status_pembayaran = ' Menunggu bukti pembayaran';
  if ($payment_photo != '') {
    $status_pembayaran = $paid;
  }
}
?>






<style>


input[type=button], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
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





<!-- lib modal-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- lib upload img-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<main id="main">
  <!--==========================About Us Section============================-->
  <section id="status_kasir">
    <div class="container"><br><br><br><br>
      <header class="section-header">
        <h3>Status <a href='https://kasir-acien.online/' target='_blank'>kasir-acien.online</a></h3>
        <p>Silahkan melakukan payment sebelum expire date</p>
      </header>
      <div class="row about-container">
        <div class="col-lg-6 content order-lg-1 order-2">
          <p></p>
          <div class="icon-box wow fadeInUp">
            <h4 class="title"><a href="">Expire Date</a></h4>
            <p class="description">Masa Berlaku Aplikasi <a href='https://kasir-acien.online/' target="_blank">kasir-acien.online</a>Berakhir pada
            <h1 class='expire_date_warning'><?= date('d-M-Y', strtotime($expire_date)) ?></h1>
            </p>
          </div>
          <div class="alert alert-danger mt-5"><a id='status_pembayaran'><?= ($status_pembayaran) ?></a></div>
          <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
            <h4 class="title"><a href="">Menunggu Pembayaran</a></h4>
            <form action="<?php echo base_url('status_kasir/checkout') ?>" method="post">

              <div class="row">
                <div class="col-25">
                  <label for="fname">Tanggal Pembelian</label>
                </div>
                <div class="col-75">
                  <input type="button" minlength="5" maxlength="100" class="input-text" value="<?= date('d-M-Y', strtotime($date)) . ' / ' . date('H:i', strtotime($time)) ?>">
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label for="fname">Username</label>
                </div>
                <div class="col-75">
                  <input type="button" minlength="5" maxlength="100" class="input-text" value="<?= $username  ?>">
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label for="fname">Durasi Paket</label>
                </div>
                <div class="col-75">
                  <input type="button" minlength="5" maxlength="100" class="input-text" value="<?= $total_day . ' Hari' ?>">
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label for="fname">Total Tagihan</label>
                </div>
                <div class="col-75">
                  <input type="button" minlength="5" maxlength="100" class="input-text" value="<?= number_format($payment_value) ?>">
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="fname">Status Pembayaran</label>
                </div>
                <div class="col-75">
                  <input type="button" minlength="5" maxlength="100" class="input-text" value="<?= ($aproval_text) ?>">
                </div>
              </div>


              <br /><button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal3">Metode Pembayaran</button>&nbsp;
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Upload Bukti Pembayaran</button><br /><br /><button style="margin-left: 100px;" type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Batalkan Transaksi</button><br /><br />
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Apakah Kamu Yakin Untuk Membatalkan Transaksi?</h4><button type="button" class="close" data-dismiss="modal">&times;
                        </button>
                      </div>
                      <div class="modal-footer"><button type="submit" name="cancel" style="margin-left: 100px;" type="button" class="btn btn-danger btn-lg">Batalkan Transaksi</button></div>
                    </div>
                </div>
              </div>
            </form>
            <!-- Modal -->
            <div class="modal fade" id="myModal3" role="dialog">
              <div class="modal-dialog">
                
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Metode Pembayaran</h4><button type="button" class="close" data-dismiss="modal">&times;
                    </button>
                  </div>
                  <div class="modal-body">
                    <table><?php
                            foreach ($list_bank as $key => $value) {
                              echo "<tr>";
                              echo "<th>";
                              echo "Nama Bank";
                              echo "</th>";

                              echo "<th>";
                              echo $value->bank;
                              echo "</th>";
                              echo "</tr>";


                              echo "<tr>";
                              echo "<th>";
                              echo "Atas Nama";
                              echo "</th>";



                              echo "<th>";
                              echo $value->atas_nama;
                              echo "</th>";
                              echo "</tr>";


                              echo "<tr>";
                              echo "<th>";
                              echo "Nomor Rekening";
                              echo "<hr />";
                              echo "</th>";

                              echo "<th>";
                              echo $value->nomor_rekening;
                              echo "<hr />";
                              echo "</th>";
                              echo "</tr>";

                              echo "<tr>";
                              echo "<th><br>";

                              echo "</th>";
                              echo "</tr>";
                            }

                            ?></table>
                  </div>
                </div>
              </div>
            </div>
            </form>
            <!-- Modal upload payment-->
            <div class="modal fade" id="myModal2" role="dialog">
              <div class="modal-dialog">
               
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Upload Bukti Pembayaran</h4><button type="button" class="close" data-dismiss="modal">&times;

                    </button>
                  </div>
                  <form method="post" id="upload_form" align="center" enctype="multipart/form-data">
                    <div class="modal-body"><input type="file" name="image_file" id="image_file" /><br /><br />
                      <div id="uploaded_image"><?php
                                                if ($payment_photo != '') {
                                                  echo '<img src="' . base_url() . 'upload/' . $payment_photo . '" width="300" height="225" class="img-thumbnail" />';
                                                }

                                                ?></div>
                    </div>
                    <div class="modal-footer"><input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" /></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp"><img src="<?php echo base_url() ?>assets/NewBiz/img/promo_gratis_receipt.jpg" class="img-fluid" alt=""></div>
      </div><br><br>
    </div>
  </section>
  <!-- #about -->
</main>
<!-- #masukin IMG ajax -->
<script>
  $(document).ready(function() {
      $('#upload_form').on('submit', function(e) {
          e.preventDefault();

          if ($('#image_file').val() == '') {
            alert("Please Select the File");
          } else {
            $.ajax({

                url: "<?php echo base_url(); ?>status_kasir/ajax_upload",
                //base_url() = http://localhost/tutorial/codeigniter  
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                  $('#uploaded_image').html(data);

                  document.getElementById("status_pembayaran").text = "Bukti Pembayaran Sudah Diterima, menunggu konfirmasi (maksimal 12 jam)";
                }
              }

            );
          }
        }

      );
    }

  );







</script>
<style type="text/css">
  .expire_date_warning {
    color: red;
    font-weight: bold;
  }

  .img-fluid {
    height: 600px;
  }


  table tr th {
    min-width: 150px;
  }
</style>