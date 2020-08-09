

<?php include('includes/database.php');?>
<?php
  //create the select query
  if ($_POST)
  {
    //get variables from post variable name"
    //escape harmful string

    $first_name=mysqli_real_escape_string($mysqli,$_POST['first_name']);
    $last_name=mysqli_real_escape_string($mysqli,$_POST['last_name']);
    $email=mysqli_real_escape_string($mysqli,$_POST['email']);
    //password security
    $password=mysqli_real_escape_string($mysqli,md5($_POST['password']));
    $address=mysqli_real_escape_string($mysqli,$_POST['address']);
    $address2=mysqli_real_escape_string($mysqli,$_POST['address_2']);
    $city=mysqli_real_escape_string($mysqli,$_POST['City']);
    $state=mysqli_real_escape_string($mysqli,$_POST['State']);
    $zipcode=mysqli_real_escape_string($mysqli,$_POST['zipcode']);

    //create customer query
    $query="INSERT INTO customer (first_name,last_name,email,password)VALUES ('$first_name','$last_name','$email','$password');";
    //run query
    $mysqli->query($query);
    //create customer_addresses query
    $query2="INSERT INTO customer_addresses (customer,address,address2,city,state,zipcode)VALUES ('$mysqli->insert_id','$address','$address2','$city','$state','$zipcode');";
   
    //run query
    $mysqli->query($query2);
    //redirect to home page
    //indicate that the form is submitted
    $msg='Customer Added';
    header('Location:index.php?msg='.urlencode($msg).'');
    exit;
  
  }

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
          <h2>Add Customers</h2>
          <form role="form" method="post" action="add_customer.php">

            <div class="form-group">
              <label>First Name</label>
              <input name="first_name" type="text" class="form-control" placeholder="Enter First Name">
            </div>

            <div class="form-group">
              <label>Last Name</label>
              <input name="last_name" type="text" class="form-control" placeholder="Enter Last Name">
            </div>

            <div class="form-group">
              <label>Email address</label>
              <input name="email" type="email" class="form-control" placeholder="Enter email">
            </div>
            
            <div class="form-group">
              <label>Password</label>
              <input name="password" type="password" class="form-control" placeholder="Enter Password">
            </div>
            
            <div class="form-group">
              <label>Address</label>
              <input name="address" type="text" class="form-control" placeholder="Enter Address">
            </div>

             <div class="form-group">
              <label>Address 2</label>
              <input name="address_2" type="text" class="form-control" placeholder="Enter Address 2">
            </div>

            <div class="form-group">
              <label>City</label>
              <input name="City" type="text" class="form-control" placeholder="Enter City">
            </div>

             <div class="form-group">
              <label>State</label>
              <input name="State" type="text" class="form-control" placeholder="Enter State">
            </div>

             <div class="form-group">
              <label>Zipcode</label>
              <input name="zipcode" type="text" class="form-control" placeholder="Enter Zipcode">
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox"> Check me out
              </label>
            </div>
            <input type="submit" name="submit"class="btn btn-default" value="add customer"/>
          </form>
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