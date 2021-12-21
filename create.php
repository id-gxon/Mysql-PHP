<?php
	$list = "";

	$conn = mysqli_connect("localhost", "root", "123456", "vincent_db");
	$sql = "select * from art_kr";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result))
	{
		$list = $list."<li><a href = \"create.php?id={$row['id']}\">{$row['title']}</a></li>";
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

<html>
	<head>
		<meta charset="utf-8">
		<title>Programming</title>
	</head>
	<body>
		<h1>Programming Language</h1>
		<ol>
			<?php
				echo $list;
			?>
		</ol>

    <form action="life_kr_create.php" method="POST">
      <p><input type="text" name="title" placeholder="title"></p>
      <p><textarea name="description" placeholder="description"></textarea></p>
      <p><input type="submit"></p>
    </form>

		<h2>
			<?php echo $article['title']; ?>
		</h2>
		<h4>
			<?php echo $article['description']; ?>
		</h4>
	</body>
</html>