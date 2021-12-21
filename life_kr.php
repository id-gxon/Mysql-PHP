<?php
	$list = "";

	$conn = mysqli_connect("localhost", "root", "123456", "vincent_db");
	$sql = "select * from life_kr";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result))
	{
		$list = $list."<li><a href = \"life_kr.php?id={$row['id']}\">{$row['title']}</a></li>";
	}

  if(isset($_GET['id']))
  {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from life_kr where id = {$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = $row['title'];
    $article['description'] = $row['description'];
  }
?>

<html lang="kr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="life_style.css" />
  </head>

  <body>
    <div class="life">
      <header>
        <p>반 고흐 온라인 미술관</p>
        <ul>
          <li><a href="index.html">홈</a></li>
          <li><a href="life_kr.php">인생</a></li>
          <li><a href="art_kr.html">작품</a></li>
          <li><a href="life_en.php">Eng</a></li>
        </ul>
      </header>
      <div class="section">
        <left>
          <ol>
            <?php echo $list; ?>
          </ol>
        </left>
        <right>
          <h2>빈센트의 삶, 1853-1890</h2>
          <p>
            빈센트 반 고흐는 27세의 나이에 예술가가 되기로 결심했습니다. 그
            결정은 그의 삶과 미술사를 영원히 바꿀 것입니다. 빈센트의 전기를
            읽어보세요.
          </p>
          <br>
          <p>
            <?php echo $article['description']; ?>
          </p>
        </right>
      </div>
      <footer>Copyright 2021. Kim Geonwoo & https://www.vangoghmuseum.nl/nl All rights reserved.</footer>
    </div>
  </body>
</html>
