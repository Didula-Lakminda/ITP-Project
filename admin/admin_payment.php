<?php

session_start();
if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}

if(isset($_POST['search']))
{
    if(!($_POST['value'])=='')
    {  
        $value = $_POST['value']; 
        $query ="select * FROM customer_payment where Receipt_ID = $value";
        $search_result = filterTable($query);
    }
    else
    {
        $query ="SELECT * FROM customer_payment";
        $search_result = filterTable($query);   
    }

}
else
{
    $query ="SELECT * FROM customer_payment";
    $search_result = filterTable($query);
}
Function filterTable($query)
{
    require_once 'payment_dbConnect.php';
    $filter_Result = mysqli_query($db,$query);
    return $filter_Result ;
}
?>

    <style>
    #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: black;
      color: white;
    }
    </style>

    <!--search bar design-->
    <style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
    </style>

<?php ob_start(); ?>
<?php include "include\db.php"?>
<!DOCTYPE html>
<html lang="en">

<?php include "include\head.php"?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include\Navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Payment
                            <small>Payment details</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Payment
                            </li>
                        </ol>
                        <form class="example" action="admin_payment.php" method ="POST">
                          <input type="text" placeholder="Enter Receipt No..." name="value">
                          <button type="submit"name="search"><i class="fa fa-search"></i></button>
                        </form></br>
                        <form class="example" action="pdf_generate.php" method ="POST">
                          <button type="submit"name="pdf_btn" > Download PDF</i></button>
                        </form></br>
                        <table id="customers">
                          <tr>
                            <th>Receipt No</th>
                            <th>Customer No</th>
                            <th>Process</th>
                            <th>Date</th>
                            <th>Method</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Remove</th>
                            <th>Change Process</th>
                          </tr>
                            <?php

                                While($row =mysqli_fetch_array($search_result))
                                {
                                    echo "<tr><td>".$row["Receipt_ID"]."</td><td>".$row["Customer_ID"]."</td><td>".$row["Process"]."</td><td>".$row["Date"]."</td><td>".$row["Payment_Method"]."</td><td>".$row["Address"]."</td><td>".$row["Email"]."</td><td>".$row["Phone_Number"]."</td><td><a href='delete1.php?R_ID=$row[Receipt_ID]' class ='delete_btn'>Delete</td><td><a href='change_process.php?R_ID=$row[Receipt_ID]' class ='change_btn'>Change</td></tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

    <!--confirm delete-->
    <?php

    if(isset($_GET['d'])):?>

        <div class = "delete-data" data-deletedata="<?= $_GET['d'];?>"></div>
    <?php endif;
    ?>

      <!--confirm change-->
    <?php

    if(isset($_GET['e'])):?>

        <div class = "change-data" data-changedata="<?= $_GET['e'];?>"></div>
    <?php endif;
    ?>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- sweet alert javaScript-->
    <script src="payment_js/sweetalert.min.js"></script>
    <script>
        $('.delete_btn').on('click',function(e)
        {
            e.preventDefault();
            const href = $(this).attr('href')

            swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover receipt details!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,

                })
                .then((willDelete) => {
                  if (willDelete) {

                     document.location.href =href ;
                    


                  } else {
                    swal("Delete failed!");
                  }
                });
        });

        //display delete result
        const deletedata =$('.delete-data').data('deletedata')
        if(deletedata)
        {

            swal("Deleted successfully!", {
            icon: "success",

            }).then((OK) => {
                  if (OK) {

                     document.location.href ='admin_payment.php' ;
                 }
             });
                    
        }
        //display change result
        const changedata =$('.change-data').data('changedata')
        if(changedata)
        {
           swal("Success!", "Changed successfully!", "success").then((OK) => {
                  if (OK) {

                     document.location.href ='admin_payment.php' ;
                 }
             });
                  
        }

    </script>

</body>

</html>