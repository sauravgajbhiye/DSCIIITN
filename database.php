    <?php
    $email = $_POST['email'];
    if ( !empty($email)) {
     $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "94124@DSCIIITN";
        $dbname = "dscnewsletter";
        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()) {
         die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
         $SELECT = "SELECT email From register Where email = ? Limit 1";
         $INSERT = "INSERT into register (email) values(?)";
         //Prepare statement
         $stmt = $conn->prepare($SELECT);
         $stmt->bind_param("s", $email);
         $stmt->execute();
         $stmt->bind_result($email);
         $stmt->store_result();
         $rnum = $stmt->num_rows;
         if ($rnum==0) {
          $stmt->close();
          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("s",$email);
          $stmt->execute();
         }
         $stmt->close();
         $conn->close();
        }
    } 
    else {
     die();
    }
    ?>