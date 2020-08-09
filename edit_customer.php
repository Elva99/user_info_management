<?php include('includes/database.php');?>
<?php
//get the id from URL
$id=$_GET['id'];
//create customer select query
$query="SELECT * FROM customer INNER JOIN customer_addresses ON customer_addresses.customer=customer.id WHERE customer.id=$id";
$result=$mysqli->query($query) or die($mysqli->error.__LINE__);
if ($result=$mysqli->query($query))
{
    //Fetch object array
    while($row=$result->fetch_assoc())
    {
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $email=$row['email'];
        $password=$row['password'];
        $address=$row['address'];
        $address2=$row['address2'];
        $city=$row['city'];
        $state=$row['state'];
        $zipcode=$row['zipcode'];

    }
    $result->close();
}
?>
<?php 
if ($_POST)
{   
    //assign GET variable
    $id=$_GET['id'];
    //assign POST variables
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

    //Create customer update
    $query="UPDATE customer SET first_name='$first_name',
            last_name='$last_name',
            email='$email',
            password='$password'
            WHERE id=$id;";
    $mysqli->query($query) or die();
    

    //create customer_addresses update
    $query="UPDATE customer_addresses SET address='$address',
            address2='$address2',
            city='$city',
            state='$state',
            zipcode='$zipcode'
            WHERE customer=$id;";
    $mysqli->query($query) or die();

    //create a msg
    $msg="Customer Updated";
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

    <title>CManager | Edit Customer</title>

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
          <h2>Edit Customers</h2>
          <form role="form" method="post" action="edit_customer.php?id=<?php echo $id; ?>">

            <div class="form-group">
              <label>First Name</label>
              <!--add a value attribute which displays the current content on the edit screen-->
              <input name="first_name" type="text" class="form-control" value="<?php echo $first_name; ?>" placeholder="Enter First Name">
            </div>

            <div class="form-group">
              <label>Last Name</label>
              <input name="last_name" type="text" class="form-control" value="<?php echo $last_name; ?>" placeholder="Enter Last Name">
            </div>

            <div class="form-group">
              <label>Email address</label>
              <input name="email" type="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter email">
            </div>
            
            <div class="form-group">
              <label>Password</label>
              <input name="password" type="password" class="form-control" value="<?php echo $password; ?>" placeholder="Enter Password">
            </div>
            
            <div class="form-group">
              <label>Address</label>
              <input name="address" type="text" class="form-control" value="<?php echo $address; ?>" placeholder="Enter Address">
            </div>

             <div class="form-group">
              <label>Address 2</label>
              <input name="address_2" type="text" class="form-control" value="<?php echo $address2; ?>" placeholder="Enter Address 2">
            </div>

            <div class="form-group">
              <label>City</label>
              <input name="City" type="text" class="form-control" value="<?php echo $city; ?>"placeholder="Enter City">
            </div>

             <div class="form-group">
              <label>State</label>
              <input name="State" type="text" class="form-control" value="<?php echo $state; ?>" placeholder="Enter State">
            </div>

             <div class="form-group">
              <label>Zipcode</label>
              <input name="zipcode" type="text" class="form-control" value="<?php echo $zipcode; ?>" placeholder="Enter Zipcode">
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox"> Check me out
              </label>
            </div>
            <input type="submit" name="submit"class="btn btn-default" value="update customer"/>
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