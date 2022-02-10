<div class="card">
  <div class="card-header">
    <form action='<?php echo base_url("a_c_dashboard/date_dashboard"); ?>' class='no_voucer_area' method="post" id=''>
      <table>
        <tr>
          <th>
            Tanggal Transaksi:
          </th>
          <th>
            <form action='/action_page.php'>
              <input type='date' class='form-control' name='date_dashboard' value='<?= $this->session->userdata('date_dashboard') ?>' onchange='this.form.submit();'>
          </th>
        </tr>
      </table>



    </form>
  </div>
  <div class="card-block">
    <!-- Menampilkan notif !-->
    <?= $this->session->flashdata('notif') ?>
    <!-- Tombol untuk menambah data akun !-->


    <div class="table-responsive dt-responsive">
      <table id="dom-jqry" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Date</th>
            <th>Username</th>
            <th>NO WA</th>
            <th>Payment Value</th>
            <th>Nomor Resi</th>
            <th>photo</th>

            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($list_t_payment as $key => $value) {
            
              echo "<tr>";
              echo "<td>" . ($key + 1) . "</td>";
              echo "<td>" . date('d-m-Y', strtotime($value->date)) . " / " . date('H:i', strtotime($value->time)) . "</td>";
              echo "<td>" . $value->username . "</td>";
              echo "<td>" . $value->no_hp . "</td>";
              echo "<td>";


              if ($value->aproval == 0) {
                $ok_color = 'red';

                echo "<a href='" . site_url('a_c_dashboard/done_payment/' . $value->id) . "' ";
          ?>
                onclick="return confirm('Apakah kamu yakin ini Sudah Benar?')"
          <?php
                echo "> <i class='fa fa-check f-w-600 f-16 text-c-" . $ok_color . "'></i></a>";
              }

              if ($value->aproval == 1) {
                $ok_color = 'green';
                echo "<a";
                echo "> <i class='fa fa-check f-w-600 f-16 text-c-" . $ok_color . "'></i></a>";
              }

              echo  number_format($value->harga);

              echo "</td>";
              echo "<td>" . $value->nomor_resi . "</td>";




              echo "<td>" . $value->payment_photo . "</td>";

              //satu button
              echo "<td>";











              echo "<a href='javascript:void(0);' data-toggle='modal' data-target='#Modal_Edit' class='btn-edit' data-id='" . $value->id . "'>";
              echo "<i class='icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green'></i>";
              echo "</a>";

              echo "<a href='" . site_url('a_c_dashboard/delete/' . $value->id) . "' ";

              echo "onclick=\"return confirm('Apakah kamu yakin ingin menghapus data ini?')\"";


              echo "> <i class='feather icon-trash-2 f-w-600 f-16 text-c-red'></i></a>";

              echo "</td>";


              echo "</tr>";
            
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>















<!-- MODAL EDIT AKUN !-->
<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form action="<?php echo base_url('a_c_dashboard/edit_action') ?>" method="post" autocomplete="off" id='edit_data'>
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">
          <input type="hidden" name="id" value="" class="form-control">

          <div class="form-group">
              <label>Nomor Resi</label>
              <input type='text' class='form-control' placeholder='Nomor Resi' name='nomor_resi'>
          </div>


          <div class="form-group">
            <label>Bukti Pembayaran</label>
            <div class="searchable">


              <img src="" name='payment_photo' width="300" height="225" class="img-thumbnail" />




            </div>
          </div>








          <div class="modal-footer">

            <style type="text/css">
              .created_form {
                float: left;
                margin right: : 20px;
                font-size: 10px;
              }
            </style>
            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>

          </div>

        </div>


        <script>
          const read_data = <?= json_encode($list_t_payment) ?>;
          console.log(read_data);
          let elModalEdit = document.querySelector("#Modal_Edit");
          console.log(elModalEdit);
          let elBtnEdits = document.querySelectorAll(".btn-edit");
          [...elBtnEdits].forEach(edit => {
            edit.addEventListener("click", (e) => {
              let id = edit.getAttribute("data-id");
              let User = read_data.filter(user => {
                if (user.id == id)
                  return user;
              });
              const {
                nomor_resi,
                payment_photo: payment_photo

              } = User[0];

              elModalEdit.querySelector("[name=id]").value = id;

              elModalEdit.querySelector("[name=nomor_resi]").value = nomor_resi;

              elModalEdit.querySelector("[name=payment_photo]").src = "<?php echo base_url() ?>" + "upload/" + payment_photo;






            })
          })
        </script>

    </form>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {
    $('select').selectize({
      sortField: 'text'
    });
  });
</script>



<style type="text/css">
  div.searchable {
    width: 100%;

  }

  .searchable input {
    width: 100%;
    height: 30px;
    font-size: 14px;
    padding: 10px;
    -webkit-box-sizing: border-box;
    /* Safari/Chrome, other WebKit */
    -moz-box-sizing: border-box;
    /* Firefox, other Gecko */
    box-sizing: border-box;
    /* Opera/IE 8+ */
    display: block;
    font-weight: 400;
    line-height: 1.6;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    background: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right .75rem center/8px 10px;
  }


  .searchable ul {
    display: none;
    list-style-type: none;
    background-color: #fff;
    border-radius: 0 0 5px 5px;
    border: 1px solid #add8e6;
    border-top: none;
    max-height: 180px;
    margin: 0;
    overflow-y: scroll;
    overflow-x: hidden;
    padding: 0;
  }

  .searchable ul li {
    padding: 7px 9px;
    border-bottom: 1px solid #e1e1e1;
    cursor: pointer;
    color: #6e6e6e;
  }

  .searchable ul li.selected {
    background-color: #e8e8e8;
    color: #333;
  }
</style>



<script type="text/javascript">
  function filterFunction(that, event) {
    let container, input, filter, li, input_val;
    container = $(that).closest(".searchable");
    input_val = container.find("input").val().toUpperCase();

    if (["ArrowDown", "ArrowUp", "Enter"].indexOf(event.key) != -1) {
      keyControl(event, container)
    } else {
      li = container.find("ul li");
      li.each(function(i, obj) {
        if ($(this).text().toUpperCase().indexOf(input_val) > -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });

      container.find("ul li").removeClass("selected");
      setTimeout(function() {
        container.find("ul li:visible").first().addClass("selected");
      }, 100)
    }
  }

  function keyControl(e, container) {
    if (e.key == "ArrowDown") {

      if (container.find("ul li").hasClass("selected")) {
        if (container.find("ul li:visible").index(container.find("ul li.selected")) + 1 < container.find("ul li:visible").length) {
          container.find("ul li.selected").removeClass("selected").nextAll().not('[style*="display: none"]').first().addClass("selected");
        }

      } else {
        container.find("ul li:first-child").addClass("selected");
      }

    } else if (e.key == "ArrowUp") {

      if (container.find("ul li:visible").index(container.find("ul li.selected")) > 0) {
        container.find("ul li.selected").removeClass("selected").prevAll().not('[style*="display: none"]').first().addClass("selected");
      }
    } else if (e.key == "Enter") {
      container.find("input").val(container.find("ul li.selected").text()).blur();
      onSelect(container.find("ul li.selected").text())
    }

    container.find("ul li.selected")[0].scrollIntoView({
      behavior: "smooth",
    });
  }



  $(".searchable input").focus(function() {
    $(this).closest(".searchable").find("ul").show();
    $(this).closest(".searchable").find("ul li").show();
  });
  $(".searchable input").blur(function() {
    let that = this;
    setTimeout(function() {
      $(that).closest(".searchable").find("ul").hide();
    }, 300);
  });

  $(document).on('click', '.searchable ul li', function() {
    $(this).closest(".searchable").find("input").val($(this).text()).blur();
    onSelect($(this).text())
  });

  $(".searchable ul li").hover(function() {
    $(this).closest(".searchable").find("ul li.selected").removeClass("selected");
    $(this).addClass("selected");
  });
</script>