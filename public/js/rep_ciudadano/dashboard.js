var Dashboard = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Dashboard Created');
        Template= new Template();        
        Event   = new Event();
//        Result  = new Result();
        load_categoria();
        
    };
    
    // ------------------------------------------------------------------------
    
    var load_categoria = function() {
        $.get('api/get_categoria',function(o){
            var output ='';
            for(var i = 0; i<o.length; i++){
                output+= Template.categoria(o[i]);
//                alert(o[i].toSource());
            }
            $("#list_categoria").html(output);
        },'json');
    };
    
    var load_todo = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    var load_note = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
