<?php
  $conn = mysqli_connect("localhost", "root", "123456", "vincent_db");

  $filtered = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description'])
  );

  $sql = "insert into life_en(title, description)
  values(
    '{$filtered['title']}',
    '{$filtered['description']}');";

  // die($sql);

  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo '문제가 발생했습니다.';
    echo mysqli_error($conn);
  }
  else{
    echo '입력에 성공했습니다.';
    echo '<br><a href="life_en.php">돌아가기</a>';
  }
?>