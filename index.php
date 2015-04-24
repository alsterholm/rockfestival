<!doctype html>
<html lang="sv">
<head>
	<meta charset="utf8">
	<title>Blomstermåla Rockfestival</title>
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/jumbotron-narrow.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<base href="dev/rockfestival">
</head>
<body>
	<div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="index.php">Hem</a></li>
            <li role="presentation"><a href="#">Login</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Blomstermåla Rockfestival</h3>
      </div>

      <div class="jumbotron">
        <h1>Rock äger!</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Gå till spelschemat &raquo;</a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4><a href="band-information.php">Bandinformation</a></h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4><a href="spelschema.php">Spelschema</a></h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
        </div>

        <div class="col-lg-6">
          <h4><a href="vara-scener.php">Våra scener</a></h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4><a href="var-personal.php">Vår personal</a></h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
        </div>
      </div>

      <footer class="footer">
        <p>&copy; Blomstermåla Rockfestival <?php echo date('Y', time()); ?><span class="pull-right"><a href="http://github.com/andreasindahl">Andreas Indahl</a> &amp; <a href="http://github.com/JimmyLindstrom">Jimmy Lindström</a></span></p>
      </footer>

    </div>
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
