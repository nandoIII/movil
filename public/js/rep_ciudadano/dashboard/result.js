var Result = function() {

    // ------------------------------------------------------------------------

    this.__construct = function() {
        console.log('Result Created');
    };

    // ------------------------------------------------------------------------

    this.success = function(msg) {
        var dom = $("#success");
        if (typeof msg === 'undefined') {
            dom.html('Success');
        }
        dom.html(msg).fadeIn();
        setTimeout(function() {
            dom.fadeOut();
        }, 3000);
    };

    // ------------------------------------------------------------------------

    this.error = function(msg) {
        var dom = $("#error");
        if (typeof msg === 'undefined') {
            dom.html('Error').fadeIn();
        }

        if (typeof msg === 'object') {
            var output = '<ul>';
            for (var key in msg) {
                var value = msg[key];
                output += '<li>' + key + ': ' + value + '</li>';
            }
            output += '</ul>';
            dom.html(output).fadeIn();
        } else {
            dom.html(output).fadeIn();
        }
        setTimeout(function() {
            dom.fadeOut();
        }, 3000);
    };

    // ------------------------------------------------------------------------

    this.__construct();

};
