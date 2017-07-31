<html>
    <head>
		<link href="templates/style.css" rel="stylesheet"></link>
		<meta charset="utf-8">
    </head>

    <body>


		<div class="global-box">

			<div class="header">
			</div>
			<div class="content ">
				<div class="output">
				<?php
					if (isset($result))
					{
						if(is_array($result) && !empty($result))
						{
							echo "<table>";
							foreach ($result as $dataRow)
							{
								echo '<tr>';
								foreach ($dataRow as $r)
								{
									echo "<td>".$r."</td>";
								}
								echo '</tr>';
							}
	
							echo '</table>';
						}
						if(is_string($result))
							echo $result;
						}
				?>
					</div>
				<div class="input clearfix">
					<div class="left">
						<p><form method="post" action="">
						посмотреть куки<input type="submit" name="watchCookie" value="watchCookie">
						</form>

						<form method="post" action=""><input type="text" name="string"/>добавить куки<input type="submit" name="addCookie" value="addCookie">
						</form>
						<p>
						<form method="post" action="">
						удалить куки<input type="submit" name="deleteCookie" value="deleteCookie">
						</form>

						<form method="post" action="">
						посмотреть сессию<input type="submit" name="watchSess" value="watchSess">
						</form>
						<form method="post" action="">добавить сессию<p><input type="text" name="string"/><input type="submit" name="addSess" value="AddSess">
						</form>
						<form method="post" action="">
						удалить сессию<input type="submit" name="deleteSess" value="deleteSess">
					</form>
					</div>



					<div class="right">
						<form method="post" action="">
						посмотреть Mysql<input type="submit" name="watchMysql" value="watchMysql">
						</form>
						<form method="post" action="">добавить Mysql<p><input type="text" name="string"/><input type="submit" name="addMysql" value="AddMysql">
						</form>
						<form method="post" action="">
						удалить Mysql<input type="submit" name="deleteMysql" value="deleteMysql">
						</form>

						<form method="post" action="">
						посмотреть Postgre<input type="submit" name="watchPg" value="watchPostgre">
						</form>
						<form method="post" action="">добавить Postgre<p><input type="text" name="string"/><input type="submit" name="addPg" value="AddPostgre">
						</form>
						<form method="post" action="">
						удалить Postgre<input type="submit" name="deletePg" value="deletePostgre">
						</form>
						</div>
					</div>
		
			</div>
		</div>

</body>

</html>