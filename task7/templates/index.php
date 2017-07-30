<!DOCTYPE html>
<html>
	<head>
		<title>%TITLE%</title>
		<link href="templates/css/bootstrap.min.css" rel="stylesheet">
		<link href="templates/css/style.css" rel="stylesheet">
		<meta charset="utf-8">
	</head>
	<body style="background: #71b3ca">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-6 center-block" style="background: #d5ecf4; margin: 5%; border-radius:6px">
					<form action="" method="post" style="margin: 5%;">
						<div style="text-align: center; font-size: 120%;">
							<span style="font-weight:bold ">Contact form</span>
						</div>
						<div class="form-group">
							<label for="InputName">Full name</label>
							<input name="email[fullName]" value="%fullname%" type="text" class="form-control" id="InputName" placeholder="Full name">%errFullName%
						</div>
						<div class="form-group">
							<label for="InputEmail">Email address</label>
							<input name="email[email]" type="email"  value="%email%" class="form-control" id="InputEmail" placeholder="Email">
							<span>%errEmail%</span>
						</div>
						<div class="form-group">
							<label for="select">Subject</label>
							<select required name="email[subject]" class="form-control" >
								<option value="">Please Select</option>
								%options%
							</select><span>%errSubject%</span>
						</div>
						<div class="form-group" style="max-width:499; height:114px">
							<label for="textarea">Message</label>
							<textarea  name="email[msg]" class="form-control resize: none" rows="5" maxlength="200">%message%</textarea>
							<span>%errMessage%</span>
						</div>
						<div class="ss clearfix">
							<div class="button  pull-right" style="margin-top: 30px;">
								<span style="margin-right:10px">%errEmptyField%</span>
								<button type="submit" class="btn btn-default btn-lg active" style="background-color: #e5f8ff; ">Send Email</button>
							</div>
							<div class="statusLine pull-left" style="margin-top: 60px">
								<span style="font-size: 110%; font-weight: bold">%formStatus%</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
 </body>
</html>