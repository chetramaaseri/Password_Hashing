<?php
// print_r($_POST);

$pass1 = $_POST['pass1']; // to hash and store in a separate variable
$pass2 = $_POST['pass2'];
// Hashing pass1 using to_hash user defined function
$hash = to_hash($pass1);
function to_hash($string){
    $hash ="";
    $hash_1 = md5($string);
    // hash_1 will store md5 hash value
    // take hash_1 as string and hash it again with sha1
    $hash_2 = sha1($hash_1);
    // hash_2 will store sha1 hash of (hash of md5) ie. hash_1
    // take hash_2 as string again and hash it with different method
    $hash_3 = password_hash($hash_2,PASSWORD_DEFAULT);
    // hash_3 contains last hash value after multiple hashing
    $hash = $hash_3;
    return $hash;
}
// match_pass($pass2,$hash);
// if(match_pass($pass2,$hash) == true){
//     echo "match";
// }else{
//     echo "not matched";
// }
if(match_pass($pass2,$hash)){
    echo "match";
}else{
    echo "not matched";
}
// match_pass should return true/false
function match_pass($string,$hash){
    //use to_hash algo till stable process 
    $hash_1 = md5($string);
    $hash_2 = sha1($hash_1);
    return password_verify($hash_2,$hash);
}
?>