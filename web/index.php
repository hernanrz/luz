<?php require dirname(__DIR__) . '/app/bootstrap.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script
			  src="https://code.jquery.com/jquery-2.2.3.min.js"
			  integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="
			  crossorigin="anonymous"></script>
    <title>Apagones</title>
  </head>
  <body>
    
    <div class="container">
      <div class="col-md-10 col-md-offset-1">
        
        <div class="page-header">
          <h1>Apagones <small class="hidden-xs"> información sobre los proximos apagones en tu zona.</small></h1>
          <p class="visible-xs"> información sobre los proximos apagones en tu zona.</p>
        </div>
        
        <form onsubmit="return false" method="get">
          <label for="state">Selecciona tu estado: </label>
          <select id="state" name="state">
          <?php foreach (array_keys(REGION_DATA) as $state): ?>
            <option value="<?= $state ?>"><?= $state ?></option>
          <?php endforeach; ?>
          </select>
          <button id="search-data" class="btn btn-default" type="submit">Buscar</button>
        </form>
        
        <br />
        
        <div class="corpo-data">
          
        </div>
        
      </div>
    </div>
    
    <script type="text/javascript">
      $(function() {
        $('#search-data').on('click', function() {
          $('.corpo-data').html('<p class="text-center">Cargando...</p>');
          
          $.getJSON('tweet.php', {'state': $("#state").val()}, function(timeline) {
            $('.corpo-data').html('<p>Aquí está la última información de corpoelec acerca de tu zona</p>');
            
            if(timeline == []) {
              $('.corpo-data').append('Parece que corpoelec no ha publicado un coño :^)')
            }
            
            for(var tweet in timeline) {
              $('<div>').html('<h4>'+timeline[tweet].text+' - <span class="text-muted">@'+timeline[tweet].author+'</span></h4>').appendTo('.corpo-data');
            }
          });
        });
      });
    </script>
  </body>
</html>