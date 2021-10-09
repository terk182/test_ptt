<!DOCTYPE html>
<html lang="en">
<?php include "class/database_class.php" ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ptt_test</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
 
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 100px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>
<?php

function get_cardscan()
{
?>
  <div class="card">
    <h3>cardscan<h3>
        <div class="card-body">
          <div>
            <table>
              <tr>
                <th>EmployeeID</th>
                <th>Clock</th>

              </tr>

              <?php
              $func = new DB_con;

              $res = $func->select_cardscan();
              $count = mysqli_num_rows($res);

              if ($count > 0) {
                //CAtegories Available
                while ($row = mysqli_fetch_assoc($res)) {

              ?>

                  <tr>
                    <td><?php echo $row['EmployeeID'] ?></td>
                    <td><?php echo $row['Clock'] ?></td>

                  </tr>


              <?php

                }
              }


              ?>

            </table>

          </div>
        </div>
  </div>
<?php
}

function get_workschedule()
{
?>
  <div class="card">
    <h3>workschedule<h3>
        <div class="card-body">
          <div>
            <table>
              <tr>
                <th>EmployeeID</th>
                <th>WorkDate</th>
                <th>BeginTime</th>
                <th>EndTime</th>

              </tr>

              <?php
              $func = new DB_con;

              $res = $func->select_workschedule();
              $count = mysqli_num_rows($res);
              $aa1 = array();
              $aa2 = array();
              $aa3 = array();
              $aa4 = array();

              if ($count > 0) {
                //CAtegories Available
                while ($row = mysqli_fetch_assoc($res)) {

              ?>

                  <tr>
                    <td><?php echo $row['EmployeeID'] ?></td>
                    
                    <td><?php echo $row['WorkDate'] ?></td>
                    <td><?php echo $row['BeginTime'] ?></td>
                    <td><?php echo $row['EndTime'] ?></td>

                  </tr>


              <?php

                }
              }


              ?>

            </table>

          </div>
        </div>
  </div>
<?php
}


function get_join()
{
  ?>
  <div class="card">
    <h3>Result<h3>
        <div class="card-body">
          <div>
            <table>
              <tr>
                <th>EmployeeID</th>
                <th>WorkDate</th>
                <th>ClockIn</th>
                <th>ClockOut</th>

              </tr>

              <?php
              $func = new DB_con;

              $res = $func->select_cardscan_DISTINCT();
              $count = mysqli_num_rows($res);

              if ($count > 0) {
                //CAtegories Available
                while ($row = mysqli_fetch_assoc($res)) {
                  $res2 = $func->select_join_table($row['EmployeeID']);
                $sn = 0;
                $count2 = mysqli_num_rows($res2);
                  while ($row2 = mysqli_fetch_assoc($res2)) 
                  {

                    if($sn == 0)
                    {
                      $topic1 =  $row2['EmployeeID'];
                      $topic2 =  $row2['WorkDate'];
                      $topic3 =  $row2['Clock'];
                      $topic4 =  $row2['Clock'];

                    }
                    if($sn == ($count2 -1))
                    {

                      $topic5 = $row2['Clock'] ;
                  

                    }

                     $sn++;
                  }

                  ?>
                  <tr>
                                      <td><?php echo $topic1  ?></td>
                                      <td><?php echo $topic2  ?></td>
                                      <td><?php echo $topic3 ?></td>
                                      <td><?php echo $topic5  ?></td>
                  
                                    </tr>
                  
                  <?php





                  
             
                }
              }


              ?>

            </table>

          </div>
        </div>
  </div>
<?php
}

?>

<body class="hold-transition sidebar-mini">

  <div>

    <div class="container">
      <h2>ข้อ1</h2>
      <div class="card">
        <div class="card-body">
          <table>
            <tr>
              <td> <input type="text" name="a" id="first" placeholder="Enter no. of rows"> </td>
            </tr>
            <tr>
              <td> <button onclick="triangle8 ()" class="btn btn-primary">Result</button> </td>
            </tr>
          </table>
          <div id="num"></div>
        </div>
      </div>
    </div>


  </div>
  <div>

    <div class="container">
      <h2>ข้อ2</h2>
      <div>

        <?php
        get_cardscan();

        get_workschedule();

        get_join();
        ?>
      </div>

    </div>


  </div>



  <div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>ข้อ3</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-success" id="myBtn">เพิ่มผลไม้</button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ชื่อผลไม้</th>
                        <th>picture</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>แอ็ปเปิ๊ล</td>
                        <td><img src="assets/1.jpg" alt="Girl in a jacket" width="100" height="100">
                        </td>

                      </tr>
                      <tr>
                        <td>แตงโม</td>
                        <td><img src="assets/2.jpg" alt="Girl in a jacket" width="100" height="100">
                        </td>

                      </tr>
                      <tr>
                        <td>ทุเรียน</td>
                        <td><img src="assets/3.jpg" alt="Girl in a jacket" width="100" height="100">
                        </td>

                      </tr>


                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <form>
          <h1>Create</h1>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="picname" aria-describedby="emailHelp">

          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Photo</label>
            <input type="text" class="form-control" id="pic_name" onclick="importData()">
          </div>

          <button type="submit" class="btn btn-primary" onclick="save_pic()">SAVE</button>
          <input type="file" id="myFile" size="50">
          <button type="submit" class="btn btn-primary">cancel</button>
          <p id="demo"></p>
        </form>
      </div>

    </div>
    

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->

    <!-- Page specific script -->
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
    <script>
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>

    <script type="text/javascript">
      function triangle8() {
        var n, i, j;
        n = parseInt(document.getElementById("first").value);
        for (i = 1; i <= n; i++) {
          for (j = n; j > i; j--) {
            document.write("&nbsp;")
          }
          for (j = 1; j <= i; j++) {
            document.writeln(i + " ");
            document.write("&nbsp;");
          }
          document.write("</br>");

        }
      }

      
    </script>

    <script>

function importData() {
  let input = document.createElement('input');
  let pic_name = document.getElementById("pic_name");
  input.type = 'file';
  input.onchange = _ => {
    // you can use this method to get file and perform respective operations
            let files =   Array.from(input.files);
            console.log(files);     
            pic_name.value = files[0].value;
        };
  input.click();
  
}
      </script>

      <script>
 function save_pic() {
      

  var path = document.getElementById("myFile").value;
  var name = document.getElementById("picname").value;
  document.getElementById("demo").innerHTML = x;
         $.ajax({
             url: 'save_img.php',
             method: "POST",
             data: {
                 path: path,
                 name: name
             },

             success: function(data) {
                 alert(data);
              
             }
         });

    }
      </script>
</body>

</html>