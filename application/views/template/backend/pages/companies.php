<div class="card">
  <div class="card-header">
    <form action='<?php echo base_url("a_c_companies/date_companies"); ?>' class='no_voucer_area' method="post" id=''>
      <table>
        <tr>
          <th>
            Tanggal Transaksi:
          </th>
          <th>
            <form action='/action_page.php'>
              <input type='date' class='form-control' name='date_companies' value='<?= $this->session->userdata('date_companies') ?>' onchange='this.form.submit();'>
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
            <th>Company Postfix</th>
            <th>Suspend</th>


          </tr>
        </thead>
        <tbody>
          <?php
          $nomor = 0;
          foreach ($a_c_companies as $key => $value) {
            
           

              $nomor = $nomor+1;
              echo "<tr>";
              echo "<td>" . ($value->id) . "</td>";
              echo "<td>" . $value->company_postfix . "</td>";
              echo "<td>";
              echo $value->suspend;

              
              if($value->suspend=='f')
              {
                $ok_color = 'red';

                  echo "<a href='" . site_url('a_c_companies/suspend/' . $value->id) . "' ";
                  ?>
                  onclick="return confirm('Apakah kamu yakin mensuspend dia?')"
                  <?php
                  echo "> <i class='fa fa-check f-w-600 f-16 text-c-" . $ok_color . "'></i></a>";
              }

              if($value->suspend=='t')
              {
                $ok_color = 'green';

                  echo "<a href='" . site_url('a_c_companies/unsuspend/' . $value->id) . "' ";
                  ?>
                  onclick="return confirm('Apakah kamu yakin mengembalikan unsuspend dia?')"
                  <?php
                  echo "> <i class='fa fa-check f-w-600 f-16 text-c-" . $ok_color . "'></i></a>";
              }


              


              echo "</td>";

              



              echo "</tr>";
            
          }
          ?>
        </tbody>
      </table>
    </div>
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