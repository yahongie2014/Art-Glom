<?php
require('../ArtGlom/includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>

	<div id="wrapper">
		<?php
		try {

			$stmt = $db->query('SELECT id, title, meduim,postImg,postDate,style,subject,meduim,price FROM arts ORDER BY id DESC');
			while($row = $stmt->fetch()){

				echo '<div class="row mt">';
				echo '<div class="col-xs-12">';
				echo '<div class="project-wrapper">';
				echo '<div class="project">';
				echo'<div class="photo-wrapper">';
				echo '<div class="photo">';
				echo "<img src='../ArtGlom/pic/".$row['postImg']."' width=400>";
				echo '</div>';
				echo '</div>';
				echo '<h3 style="color: #285e8e;">'.$row['title'].'</a></h3>';
				echo '<h3 style="color: crimson;">Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</h3>';
				echo '<h3 style="color: #889199;">'.$row['subject'].'</h3>';
				echo '<h3 style="color: seagreen;">'.$row['price'].'$</h3>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';

			}

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		?>
	</div>

</body>
</html>