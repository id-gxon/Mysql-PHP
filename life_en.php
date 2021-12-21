<?php
	$list = "";

	$conn = mysqli_connect("localhost", "root", "123456", "vincent_db");
	$sql = "select * from life_en";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result))
	{
		$list = $list."<li><a href = \"life_en.php?id={$row['id']}\">{$row['title']}</a></li>";
	}

  if(isset($_GET['id']))
  {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from life_en where id = {$filtered_id}";
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
        <p>Van Gogh Online Museum</p>
        <ul>
          <li><a href="index_en.html">Home</a></li>
          <li><a href="life_en.php">Life</a></li>
          <li><a href="art_en.html">Art</a></li>
          <li><a href="life_kr.php">Kor</a></li>
        </ul>
      </header>
      <div class="section">
        <left>
          <ol>
            <?php echo $list; ?>
          </ol>
        </left>
        <right>
          <h2>Vincent's Life, 1853-1890</h2>
          <p>
            Vincent van Gogh decided to become an artist at the age of 27. That
            decision would change his life and art history forever. Read Vincent's
            biography.
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
