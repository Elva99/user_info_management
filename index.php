
<?php include('includes/database.php');?>
<?php
  //create the select query
  $query="SELECT * FROM customer
    INNER JOIN customer_addresses
    ON customer_addresses.customer=customer.id
    ORDER BY customer.join_date DESC;";
  //get results or the line number caused the error
  $result=$mysqli->query($query) or die($mysqli->error.__LINE__);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/jumbotron-narrow/">

    <title>CManager | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="index.php">Home</a></li>
            <li role="presentation"><a href="add_customer.php">Add Customer</a></li>
            
          </ul>
        </nav>
        <h3 class="text-muted">Store CManager</h3>
      </div>

      

      <div class="row marketing">
        

        <div class="col-lg-12">
        <?php 
        if (isset($_GET['msg']))
        {
          echo $_GET['msg'];
        }
        else{echo 'Not Set';}
        ?>
          <h2>Customers</h2>
          <table class="table table_striped">
              <tr>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Address</th>
                <th></th>
              </tr>
              
              <?php
              //check if at least one row is found
                if ($result->num_rows>0)
                {
                  //Loop through result
                  while ($row=$result->fetch_assoc()){
                      //Display customer info
                    $output='<tr>';
                    $output .='<td>'.$row['first_name'].' '.$row['last_name'].'</td>';
                    $output .='<td>'.$row['email'].'</td>';
                    $output .='<td>'.$row['address'].' '.$row['city'].' '.$row['state'].'</td>';
                    $output .='<td><a href="edit_customer.php?id='.$row['customer'].'" class="btn btn-default">Edit</a></td>';
                    $output .='</tr>';
                    //display
                    echo $output;
                  }
                    
                }
                else
                {
                  echo "Sorry, no customers were found.";
                }
              ?>
              
          </table>
        </div>
      </div>

      <footer class="footer">
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>