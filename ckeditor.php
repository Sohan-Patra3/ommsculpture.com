<?php
echo $text =$_POST['editor1'];

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <title>UI color picker</title>
  <script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
</head>

<body>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
  <textarea cols="80" id="editor1" name="editor1" rows="10" data-sample-short>&lt;p&gt;This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href=&quot;https://ckeditor.com/&quot;&gt;CKEditor&lt;/a&gt;.&lt;/p&gt;</textarea>
  <input type="submit" name="sub" value="send">
  </form>
  <script>
    CKEDITOR.replace('editor1', {
      extraPlugins: 'uicolor'
    });
  </script>
</body>

</html>