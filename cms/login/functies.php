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

function login_check($mysqli) {
   // Check if all session variables are set
   if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
     $user_id = $_SESSION['user_id'];
     $login_string = $_SESSION['login_string'];
     $username = $_SESSION['username'];
     $ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
 
     if ($stmt = $mysqli->prepare("SELECT password FROM siteworkcms_gebruikers WHERE id = ? LIMIT 1")) { 
        $stmt->bind_param('i', $user_id); // Bind "$user_id" to parameter.
        $stmt->execute(); // Execute the prepared query.
        $stmt->store_result();
 
        if($stmt->num_rows == 1) { // If the user exists
           $stmt->bind_result($password); // get variables from result.
           $stmt->fetch();
           $login_check = hash('sha512', $password.$ip_address.$user_browser);
           if($login_check == $login_string) {
              // Logged In!!!!
              return true;
           } else {
              // Not logged in
              return false;
           }
        } else {
            // Not logged in
            return false;
        }
     } else {
        // Not logged in
        return false;
     }
   } else {
     // Not logged in
     return false;
   }
}
?>