<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>lcut.me</title>

        <!-- Fonts -->
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <!-- Styles -->
        <style>
            body {
            padding-top: 5rem;
          }
        </style>
  
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="/">lcut.me</a>
        </nav>

        <main role="main" class="container">
            <div class="row">
                <div class="col-sm">
                    
                    <form id="link_cut">
                        <div class="form-group">
                            <label>Paste link</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group float-right">
                            <button type="button" class="btn btn-dark">cut</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm" id="messages">
                </div>
            </div>
        </main>
        
        
        
        
        
            
            
        
        
        
        <script>
         $('form#link_cut button').click(function(e){
             e.preventDefault();
             let textarea = $('form#link_cut textarea');
             let link = textarea.val();
             
             let short_link = $('a#short_link');
             
             $.ajax({
                 url:       '/api/add',
                 method:    'post',
                 dataType:  'json',
                 data: {url: link},
                 success:   function(resp){
                     msgSuccess('messages', resp.short_link);
                 },
                 error: function(resp){
                     
                     let errors = resp.responseJSON.errors;
                     errors.url.forEach(function (row){
                         msgError('messages', row);
                     });
                 },
             });
             
             
             
             function msgSuccess(id, link){
                 $('#'+id).prepend(`
                    <div class="alert alert-light border alert-dismissible fade show" role="alert">
                       <a href="${link}" target="blank" class="alert-link short-link">${link}</a> 
                       
                       
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                    </div>`);
                    
             }
             
             function msgError(id, text){
                 $('#'+id).prepend(`
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                       ${text}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                    </div>`);
             }
         });
         
        </script>
        
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
       
    </body>
</html>
