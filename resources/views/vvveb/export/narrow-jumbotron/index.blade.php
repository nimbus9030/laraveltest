<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/editor.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/narrow-jumbotron.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  </head>

  <body>
  </body>

  <script type="text/javascript">
    $(function () {
        var tag = {!! json_encode($tasks) !!};
        // console.log(tag);
        // console.log(tag.title);

        var text = tag.title;
        $('body').html(text);
        // console.log( text );

        // doc.documentElement.innerHTML = text;

    });
</script>
</html>
