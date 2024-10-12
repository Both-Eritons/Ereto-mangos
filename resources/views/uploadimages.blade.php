<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1,   shrink-to-fit=no">
<title>Multiple Image upload</title>
</head>
<body>
<div>
<h3>Upload a Images</h3>
<hr>
<form method="POST" action="api/manga/chapter" enctype="multipart/form-data" >
{{ csrf_field() }}
<div >
<label>Name</label>
<input type="number" name="manga_id" placeholder="ID do manga">
<label>Discription</label>
<input type="number" name="number" placeholder="numero do capitulo">
<label>Titulo</label>
<input type="text" name="title" placeholder="texto do capitulo">

</div>
<div >
<label>Choose Images</label>
<input type="file"  name="images" multiple>
</div>
<hr>
<button type="submit" >Submit</button>
</form>
</div>
</body>
</html>
