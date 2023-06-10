<?php 

$db = new PDO('
    mysql:host=localhost;dbname=test;charset=utf8','root','root');
$task = "list";
 if (array_key_exists("task", $_GET)) {
 	 echo $_GET['task'];
 
 }
  if ($task == "write") {
    postMessage();
  }else {
    getMessage(); 
  }
 function getMessage(){
    global $db;
        $sql = $db->query("SELECT * FROM message ORDER BY created_at DESC LIMIT 20");
        $message = $sql->fetchALL();
         echo json_encode($message);
 }
 function postMessage(){
    global $db;
    if (array_key_exists('author',$_POST) || array_key_exists('content',$_POST) ) {echo json_encode(["status"=>"error", "message" => "messgeerr1"]);
    return; 
        // code...
    }
    $author = $_POST['author'];
    $content = $_POST['content'];
    $query = $db->prepare('INSERT INTO message SET author = :author, content = :content, created_at = :NOW()'); 
    $query -> execute([
"author" =>$author,
"content" =>$content,   
    ]);
    echo json_encode(["status" => "success"]);  
 }
?>