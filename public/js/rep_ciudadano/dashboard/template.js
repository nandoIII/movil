var Template = function() {

    // ------------------------------------------------------------------------

    this.__construct = function() {
        console.log('Plantilla Creada');
    };

    // ------------------------------------------------------------------------

    this.categoria = function(obj) {
        var output = '';
        output += '<div id="categoria_' + obj.idcategoria + '">';
        output += '<span>' + obj.nombre + '</span>';
        output += '<a class="categoria_delete" data-id="' + obj.idcategoria + '" data-completed="1" href="api/update_categoria">Completar</a>';
        output += '<a data-id="' + obj.idcategoria + '" class="categoria_delete" href="api/delete_categoria">Eliminar</a>';
        output += '</div>';
        return output;
    };

    this.pais = function(obj) {
        var output = '';
        output += '<div id="' + obj.pais_id + '">';
        output += '<span>' + obj.nombre + '</span>';
        output += '</div>';
        return output;
    };

    this.todo = function(obj) {
        var output = '';
        output += '<div id="' + obj.todo_id + '">';
        output += '<span>' + obj.content + '</span>';
        output += '</div>';
        return output;
    };

    // ------------------------------------------------------------------------

    this.note = function(obj) {
        var output = '';
        output += '<div id="' + obj.note_id + '">';
        output += '<span>' + obj.title + '</span>';
        output += '<span>' + obj.content + '</span>';
        output += '</div>';
        return output;
    };

    // ------------------------------------------------------------------------

    this.__construct();

};
