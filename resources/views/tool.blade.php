<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Plagiarism Checker Tool</title>

    <style>
      .card {
        padding: 1px 10px;
      }
    </style>
  </head>
  <body>
  <div class="container py-5">
    <h1 class="mt-5">Plagiarism Checker</h1>
    <div class="row mt-5">
      <form disabled>
        <div class="col-auto">
            @csrf
            <div class="form-floating">
                <textarea class="form-control" placeholder="Paste your essay here" id="essay" style="height: 500px"></textarea>
            </div>
        </div>
        <div class="col-auto mt-3">
            <button type="button" onclick="handleSubmit()" class="btn btn-primary">Check</button>
        </div>
      </form>
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
              timeout: 10000,
              success: function (data,status,xhr) {  
                  handleResponse(data, id);
              },
              error: function (jqXhr, textStatus, errorMessage) {
                  console.log(errorMessage);
              }
          });
        };

        const getBestResult = function(results) {
            return results.reduce(function(prev, current) {
                if (+current.plagiarizmScore > +prev.plagiarizmScore) {
                    return current;
                } else {
                    return prev;
                }
            });
        }

        const getSentencesFromWords = function (data) {
          return data.replace(/([.?!])\s*(?=[A-Z])/g, "$1|").split("|");
        }

        const sentenceToHtml = function (sentence, i) {
          return '<li class="mb-3" style="white-space: pre-line"><span ' + 'id="' + i + '">' + sentence + '</span></li>';
        }

        const handleResponse = function (data, id) {
          if(Array.isArray(data) && data.length > 0) {
              const span = $('#'+id);
              const result = getBestResult(data);
              const reportHtml = 
                '<div style="color:black;" class="mt-3 py-3 card">' +
                  '<h5 class="card-title">' +
                    '<a target="_blank" href="' + result.url + '">' +
                        result.url +
                    '</a>' +
                  '</h5>' +
                  '<div class="card-body">' +
                      'Plagiarism score: ' + result.plagiarizmScore +
                      '\n\nFound: ' + result.description +
                  '</div>' +
                '</div>';

              span.css('color', 'white');
              span.css('background-color', 'red');
              span.css('border-radius', '2px');
              span.css('padding', '2px 2px');
              
              span.parent().append($(reportHtml));
            }
        }

        function handleSubmit() {
          const data = $('textarea#essay').val();
          const sentences = getSentencesFromWords(data);

          $('textarea#essay').replaceWith(function()
          {
            var html = "";

            sentences.forEach(function (sentence, i) {
              html = html + sentenceToHtml(sentence, i);

              try {
                request(sentence, i)
              } catch (error) {
                //  ...
              }
            });

            return '<div><ul class="list-unstyled">' + html + '</ul></div>';
          });

          return sentences;
        }
    </script>  
  </body>
</html>
