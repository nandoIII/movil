var Event = function() {

    // ------------------------------------------------------------------------

    this.__construct = function() {
        console.log('Evento Creado');
        Result = new Result();
        create_categoria();
        create_todo();
        create_pais();
        create_note();
        update_todo();
        update_note();
        delete_todo();
        delete_note();
        delete_reporte();
    };

    // ------------------------------------------------------------------------

    var create_categoria = function() {
        $("#create_categoria").submit(function(evt) {
            evt.preventDefault();
            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function(o) {
                if (o.result == 1) {
                    Result.success();
                    var output = Template.categoria(o.data[0]);
                    $("#list_categoria").append(output);
                } else {
                    Result.error(o.error);
                }
            }, 'json');

        });
    };

    var create_todo = function() {
        $("#create_todo").submit(function(evt) {
            console.log('create_todo clicked');
            return false;
        });
    };

    // ------------------------------------------------------------------------

    var create_pais = function() {
        $("#create_note").submit(function(evt) {
            console.log('create_pais clicked');
            return false;
        });
    };

    var create_note = function() {
        $("#create_note").submit(function(evt) {
            console.log('create_note clicked');
            return false;
        });
    };

    // ------------------------------------------------------------------------

    var update_todo = function() {
        
    };

    // ------------------------------------------------------------------------

    var update_categoria = function() {
        $("body").on('click', '.categoria_delete', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var postData = {
                id: $(this).attr('data-id'),
                completed: $(this).attr('data-completed')
            };
            
            $.post(url, postData, function(o){
                if(o.result==1){
                    Result.success('Cambios guardados');                    
                }else{
                    Result.error('No ha actualizado');
                }
            },'json');
        });
    };



    // ------------------------------------------------------------------------

    var update_note = function() {

    };

    // ------------------------------------------------------------------------

    var delete_todo = function() {

    };


    // ------------------------------------------------------------------------

    var delete_reporte = function() {
        $("body").on('click', '.categoria_delete', function(e) {
            e.preventDefault();
            var self = $(this).parent('div');
            var url = $(this).attr('href');
            var postData = {'categoria_id': $(this).attr('data-id')};

            $.post(url, postData, function(o) {
                if (o.result == 1) {
                    Result.success('Categoria Eliminada');
                    self.remove();
                } else {
                    Result.error(o.msg)
                }
            }, 'json');
        });
    };

    // ------------------------------------------------------------------------

    var delete_note = function() {

    };

    // ------------------------------------------------------------------------

    this.__construct();

};
