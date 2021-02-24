<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container">

    <div class="row">
      <form disabled>
        <div class="col-auto">
            @csrf
            <div class="form-floating">
                <textarea class="form-control" placeholder="Paste your essay here" id="essay" style="height: 500px"></textarea>
            </div>
        </div>
        <div class="col-auto">
            <button type="button" onclick="handleSubmit()" class="btn btn-primary">Check</button>
        </div>
      </form>
    </div>

    <div class="row">
      <div class="result">
        <div class="card" style="width: 18rem;">
          <div class="card-header">
            Featured
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
          </ul>
        </div>
      </div>    
    </div>
  </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        const request = function (data, id) {
          $.ajax('/api/query', 
          {
              type: 'POST',
              data: {
                essay: data
              },
              dataType: 'json',
              timeout: 60000,
              success: function (data,status,xhr) {  
                 console.log(id, data);
              },
              error: function (jqXhr, textStatus, errorMessage) {
                  console.log(errorMessage);
              }
          });
        };

        const getSentencesFromWords = function (data) {
          return data.match( /[^\.!\?]+[\.!\?]+/g );
        }

        const sentenceToHtml = function (sentence, i) {
          return '<li ' + 'id="' + i + '">' + sentence + '</li>';
        }

        function handleSubmit() {
          const data = $('textarea#essay').val();

          const sentences = getSentencesFromWords(data);

          $('textarea#essay').replaceWith(function()
          {
            var html = "";

            sentences.forEach(function (sentence, i) {
              html = html + sentenceToHtml(sentence, i);
            });

            return '<div><ul class="list-unstyled">' + html + '</ul></div>';
          });

          sentences.forEach(function(sentence, i) {
            try {
              response = request(sentence, i)
              console.log(response);
            } catch (error) {
              console.log(error);
            }
          });

          return sentences;
        }
    </script>  
  </body>
</html>
