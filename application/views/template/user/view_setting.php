<?php
foreach ($company_status as $key => $value) {
  $expire_date = $value->expire_date;
}



foreach ($payment_login_status as $key => $value) {
  $username = $value->username;
  $password = $value->password;
  $email = $value->email;
  $phone = $value->phone;
}




?>


<style>
  input[type=text] {
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
    border-radius: 10px;
    margin-left: 60px;
  }

  input[type=text]:focus {
    border: 2px solid #1E90FF;
  }

  input[type=password] {
    padding: 12px 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
    border-radius: 10px;
    margin-left: 50px;
  }

  input[type=password]:focus {
    border: 2px solid #1E90FF;
  }
</style>

<!-- lib modal-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>







<main id="main">

  <!--==========================
      About Us Section
    ============================-->
  <section id="status_kasir">
    <div class="container">
      <br><br><br><br>
      <header class="section-header">
        <h3>Status <a href='https://kasir-acien.online/' target="_blank">kasir-acien.online</a></h3>
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

            <h4 class="title">Data Pelanggan</h4>

            <form action="<?php echo base_url('setting/save_button_1') ?>" method="post">
              <table>
                <tr>
                  <th>Username</th>
                  <th><input type="text" disabled name="username" placeholder="username" id="username" minlength="5" maxlength="100" class="input-text" value="<?= $this->session->userdata('username')  ?>">
                  </th>
                </tr>

                <tr>
                  <th>Email</th>
                  <th><input type="text" name="email" placeholder="Email" id="email" minlength="5" maxlength="100" class="input-text" value="<?= $email ?>">
                  </th>
                  <th>
                    <a style="color: red;" class="warning2_label_email" id='warning2_label_email'>(Email Tidak Valid)</a>
                    <a style="color: red;" class="warning3_label_email" id='warning3_label_email'>(Email Tidak Valid)</a>
                    <a style="color: red;" class="warning4_label_email" id='warning4_label_email'>(Tidak Boleh Kosong)</a>
                  </th>

                </tr>


                <tr>
                  <th>No Telepon</th>
                  <th><input type="text" name="phone" placeholder="Nomor Telepon" minlength="5" maxlength="15" id="phone" class="input-text" value="<?= $phone ?>">
                  </th>
                  <th>
                    <a style="color: red;" class="warning2_label_phone" id='warning2_label_phone'>(No Telepon Tidak Valid)</a>
                    <a style="color: red;" class="warning3_label_phone" id='warning3_label_phone'>(No Telepon Tidak Valid)</a>
                    <a style="color: red;" class="warning4_label_phone" id='warning4_label_phone'>(Tidak Boleh Kosong)</a>
                  </th>
                </tr>




              </table>

              <br />

              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" id='save_button_1' data-target="#myModal">Save</button>



              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Konfirmasi Data</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                      <table>


                        <tr>
                          <th><label>Alamat Email</label></th>

                          <th><a class="modal_text_right" id="modal_email"></a></th>


                        </tr>

                        <tr>
                          <th><label>Nomor Telepon</label></th>

                          <th><a class="modal_text_right" id="modal_phone"></a></th>

                        </tr>
                      </table>
                    </div>

                    <div class="modal-footer">
                      <input type="submit" name="save" class="btn btn-info btn-lg" value="Save">

                    </div>
                  </div>

                </div>
              </div>

            </form>
          </div>













          <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">

            <h4 class="title">Password Baru</h4>

            <form action="<?php echo base_url('setting/change_password') ?>" method="post">
              <table>


                <tr>
                  <th>Password Baru</th>
                  <th><input type="password" name="password" placeholder="Min 8 character" minlength="8" maxlength="20" id="password" class="input-text">
                  </th>

                  <th>
                    <a style="color: red;" class="warning2_label_password" id='warning2_label_password'>(Minimal 8 Character)</a>
                    <a style="color: red;" class="warning3_label_password" id='warning3_label_password'>(Tidak Boleh Ada Special Character)</a>
                    <a style="color: red;" class="warning4_label_password" id='warning4_label_password'>(Tidak Boleh Kosong)</a>
                  </th>
                </tr>


                <tr>
                  <th>Konfirmasi Password Baru</th>
                  <th><input type="password" name="confirm_password" placeholder="Konfirmasi" minlength="8" maxlength="20" id="confirm_password" class="input-text">
                  </th>

                  <th>
                    <a style="color: red;" class="warning2_label_confirm_password" id='warning2_label_confirm_password'>(Password Tidak Sama)</a>
                    <a style="color: red;" class="warning4_label_confirm_password" id='warning4_label_confirm_password'>(Tidak Boleh Kosong)</a>
                  </th>
                </tr>




              </table>

              <br />

              <button type="button" class="btn btn-danger btn-lg button_change_password" data-toggle="modal" id='change_password' data-target="#myModal2">Change Password</button>



              <!-- Modal -->
              <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Konfirmasi Password</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                      <table>


                        <tr>
                          <th><label>Password Lama</label></th>

                          <th><input type="password" name="old_password" placeholder="Konfirmasi" id="old_password" class="input-text"></th>
                        </tr>


                      </table>
                    </div>

                    <div class="modal-footer">
                      <input type="submit" name="save" class="btn btn-danger btn-lg" value="Change Password">

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
  $(document).ready(function() {




    $('#email').change(function() {
      var email = $('#email').val();
      var post_id = 'id=' + email;
      if (email != '') {


        var specialChars = "<>!#$%^&*()[]{}?:;|'\"\\,/~`= ";
        var checkForSpecialChar = function(string) {
          for (i = 0; i < specialChars.length; i++) {
            if (string.indexOf(specialChars[i]) > -1) {
              return true
            }
          }
          return false;
        }


        if (email.indexOf("@") < 0) {
          true_logic_email = 0;
          console.log("contains spaces");
          document.getElementById('warning2_label_email').style.display = 'block';
          document.getElementById('warning3_label_email').style.display = 'none';
          document.getElementById('warning4_label_email').style.display = 'none';

          document.getElementById('save_button_1').disabled = true;
        } else if (checkForSpecialChar(email)) {
          true_logic_email = 0;
          console.log("contains sc");

          document.getElementById('warning2_label_email').style.display = 'none';
          document.getElementById('warning3_label_email').style.display = 'block';
          document.getElementById('warning4_label_email').style.display = 'none';

          document.getElementById('save_button_1').disabled = true;
        } else {
          true_logic_email = 1;
          document.getElementById('warning2_label_email').style.display = 'none';
          document.getElementById('warning3_label_email').style.display = 'none';
          document.getElementById('warning4_label_email').style.display = 'none';
          document.getElementById('save_button_1').disabled = false;
        }

      }





    });








    $('#phone').change(function() {
      var phone = $('#phone').val();
      var post_id = 'id=' + phone;
      if (phone != '') {


        var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-=qwertyuiopasdfghjklzxcvbnm";
        var checkForSpecialChar = function(string) {
          for (i = 0; i < specialChars.length; i++) {
            if (string.indexOf(specialChars[i]) > -1) {
              return true
            }
          }
          return false;
        }


        if (phone.indexOf(" ") >= 0) {
          true_logic_phone = 0;
          console.log("contains spaces");
          document.getElementById('warning2_label_phone').style.display = 'block';
          document.getElementById('warning3_label_phone').style.display = 'none';
          document.getElementById('warning4_label_phone').style.display = 'none';

          document.getElementById('save_button_1').disabled = true;
        } else if (checkForSpecialChar(phone)) {
          true_logic_phone = 0;
          console.log("contains sc");

          document.getElementById('warning2_label_phone').style.display = 'none';
          document.getElementById('warning3_label_phone').style.display = 'block';
          document.getElementById('warning4_label_phone').style.display = 'none';

          document.getElementById('save_button_1').disabled = true;
        } else {
          true_logic_phone = 1;
          document.getElementById('warning2_label_phone').style.display = 'none';
          document.getElementById('warning3_label_phone').style.display = 'none';
          document.getElementById('warning4_label_phone').style.display = 'none';

          document.getElementById('save_button_1').disabled = false;
        }

      }





    });


    $('#password').change(function() {


      var password = $('#password').val();
      var post_id = 'id=' + password;

      var confirm_password = $('#confirm_password').val();

      if (password != '') {


        var specialChars = "<>!#$%^&*()_+[]{}?:;|'\"\\,./~`-=";
        var checkForSpecialChar = function(string) {
          for (i = 0; i < specialChars.length; i++) {
            if (string.indexOf(specialChars[i]) > -1) {
              return true
            }
          }
          return false;
        }




        if (password.length < 8) {
          true_logic_password = 0;
          console.log("contains spaces");
          document.getElementById('warning2_label_password').style.display = 'block';
          document.getElementById('warning3_label_password').style.display = 'none';
          document.getElementById('warning4_label_password').style.display = 'none';

          document.getElementById('change_password').disabled = true;
        } else if (checkForSpecialChar(password)) {
          true_logic_password = 0;
          console.log("contains sc");

          document.getElementById('warning2_label_password').style.display = 'none';
          document.getElementById('warning3_label_password').style.display = 'block';
          document.getElementById('warning4_label_password').style.display = 'none';

          document.getElementById('change_password').disabled = true;

        } else if (confirm_password.length >= 8 && confirm_password != password) {
          true_logic_confirm_password = 0;
          console.log("pass not match");
          document.getElementById('warning2_label_confirm_password').style.display = 'block';
          document.getElementById('warning4_label_confirm_password').style.display = 'none';

          document.getElementById('change_password').disabled = true;

        } else {
          true_logic_password = 1;
          document.getElementById('warning2_label_password').style.display = 'none';
          document.getElementById('warning3_label_password').style.display = 'none';
          document.getElementById('warning4_label_password').style.display = 'none';

          document.getElementById('change_password').disabled = false;
        }

      }





    });











    $('#confirm_password').change(function() {
      var confirm_password = $('#confirm_password').val();
      var password = $('#password').val();


      console.log(confirm_password);
      if (confirm_password != '') {




        if (confirm_password != password) {
          true_logic_confirm_password = 0;
          console.log("pass not match");
          document.getElementById('warning2_label_confirm_password').style.display = 'block';
          document.getElementById('warning4_label_confirm_password').style.display = 'none';

          document.getElementById('change_password').disabled = true;

        } else {
          true_logic_confirm_password = 1;
          document.getElementById('warning2_label_confirm_password').style.display = 'none';
          document.getElementById('warning4_label_confirm_password').style.display = 'none';
          document.getElementById('change_password').style.display = 'block';
          document.getElementById('change_password').disabled = false;
        }

      }





    });




  });
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
    min-width: 130px;
  }


  input[type='text'] {
    min-width: 200px;
  }
</style>



<!------------------------------------------ MENCOBA CUSTOM CONTROL !------------------------------------>
<style type="text/css">
  /* class applies to select element itself, not a wrapper element */
  .select-css {
    display: block;
    font-size: 14px;
    font-family: sans-serif;
    font-weight: 700;
    color: #444;
    line-height: 1.3;
    padding: .6em 1.4em .5em .8em;
    width: 100%;
    max-width: 100%;
    /* useful when width is set to anything other than 100% */
    box-sizing: border-box;
    margin: 0;
    border: 1px solid #aaa;
    box-shadow: 0 1px 0 1px rgba(0, 0, 0, .04);
    border-radius: .5em;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    background-color: #fff;
    margin-left: 25px;
    /* note: bg image below uses 2 urls. The first is an svg data uri for the arrow icon, and the second is the gradient. 
    for the icon, if you want to change the color, be sure to use `%23` instead of `#`, since it's a url. You can also swap in a different svg icon or an external image reference
    
  */
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
      linear-gradient(to bottom, #ffffff 0%, #e5e5e5 100%);
    background-repeat: no-repeat, repeat;
    /* arrow icon position (1em from the right, 50% vertical) , then gradient position*/
    background-position: right .7em top 50%, 0 0;
    /* icon size, then gradient */
    background-size: .65em auto, 100%;
  }

  /* Hide arrow icon in IE browsers */
  .select-css::-ms-expand {
    display: none;
  }

  /* Hover style */
  .select-css:hover {
    border-color: #888;
  }

  /* Focus style */
  .select-css:focus {
    border-color: #aaa;
    /* It'd be nice to use -webkit-focus-ring-color here but it doesn't work on box-shadow */
    box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
    box-shadow: 0 0 0 3px -moz-mac-focusring;
    color: #222;
    outline: none;
  }

  /* Set options to normal weight */
  .select-css option {
    font-weight: normal;
  }

  /* Support for rtl text, explicit support for Arabic and Hebrew */
  *[dir="rtl"] .select-css,
  :root:lang(ar) .select-css,
  :root:lang(iw) .select-css {
    background-position: left .7em top 50%, 0 0;
    padding: .6em .8em .5em 1.4em;
  }

  /* Disabled styles */
  .select-css:disabled,
  .select-css[aria-disabled=true] {
    color: graytext;
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22graytext%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
      linear-gradient(to bottom, #ffffff 0%, #e5e5e5 100%);
  }

  .select-css:disabled:hover,
  .select-css[aria-disabled=true] {
    border-color: #aaa;
  }



  h4 {
    color: blue;
  }
</style>




<script type="text/javascript">
  mycode();

  function mycode() {


    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;


    console.log(email);
    document.getElementById("modal_phone").text = phone;
    document.getElementById("modal_email").text = email;


    tid = setTimeout(mycode, 500); // repeat myself
  }
</script>




<style type="text/css">
  .warning2_label_email {
    display: none;
    color: red;
    font-size: 12px;
    font-weight: bold;
  }

  .warning3_label_email {
    display: none;
    color: red;
    font-size: 12px;
    font-weight: bold;
  }



  .warning4_label_email {
    display: none;
    color: red;
    font-size: 12px;
    font-weight: bold;
  }


  .warning2_label_phone {
    display: none;
    color: red;
    font-size: 12px;
    font-weight: bold;
  }

  .warning3_label_phone {
    display: none;
    color: red;
    font-size: 12px;
    font-weight: bold;
  }




  .warning4_label_phone {
    display: none;
    color: red;
    font-size: 12px;
    font-weight: bold;
  }

  .warning2_label_password {
    display: none;
    color: red;
    font-size: 12px;
    font-weight: bold;
  }

  .warning3_label_password {
    display: none;
    color: red;
    font-size: 12px;
    font-weight: bold;
  }



  .warning4_label_password {
    display: none;
    color: red;
    font-size: 12px;
    font-weight: bold;
  }


  .warning2_label_confirm_password {
    display: none;
    color: red;
    font-size: 12px;
    font-weight: bold;
  }

  .warning4_label_confirm_password {
    display: none;
    color: red;
    font-size: 12px;
    font-weight: bold;
  }

  .button_change_password {
    display: none;
  }
</style>