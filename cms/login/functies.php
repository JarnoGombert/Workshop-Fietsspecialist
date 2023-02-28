<?php
function login($email, $password, $mysqli) {
    // Using prepared Statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT id, username, password FROM digifixxcms_gebruikers WHERE email = ? LIMIT 1")) { 
       $stmt->bind_param('s', $email); // Bind "$email" to parameter.
       $stmt->execute(); // Execute the prepared query.
       $stmt->store_result();
       $stmt->bind_result($user_id, $username, $db_password); // get variables from result.
       $stmt->fetch();
  
       if($stmt->num_rows == 1) { // If the user exists
          // We check if the account is locked from too many login attempts
          if($db_password == $password) { // Check if the password in the database matches the password the user submitted. 
             // Password is correct!
                return true;    
          } else {
             // Password is not correct
             return false;
          }
       } else {
          // No user exists. 
          return false;
       }
    }
}
?>