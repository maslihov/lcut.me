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

