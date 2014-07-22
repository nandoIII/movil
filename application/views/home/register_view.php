<div class="row">
    <div id="register_form_error" class="alert alert-error"><!--Dynamic--></div>
    <div class="span6">
        <form id="register_form" class="form-horizontal" method="POST" action="<?php echo site_url('user/register') ?>">

            <div class="control-group">
                <label class="control-label">Login</label>
                <div class="controls">
                    <input type="text" name="login" class="input-xlarge" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">
                    <input type="text" name="nombre" class="input-xlarge" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                    <input type="text" name="email" class="input-xlarge" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">C&eacute;dula</label>
                <div class="controls">
                    <input type="text" name="cedula" class="input-xlarge" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Celular</label>
                <div class="controls">
                    <input type="text" name="celular" class="input-xlarge" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">G&eacute;nero</label>
                <div class="controls">
                    <select name="genero">
                        <option value="1">Hombre</option>
                        <option value="0">Mujer</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Pa&iacute;s</label>
                <div class="controls">
                    <select name="pais">
                        <option value="1">Colombia</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Departamento</label>
                <div class="controls">
                    <select name="departamento">
                        <option value="1">Atlantico</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Ciudad</label>
                <div class="controls">
                    <select name="ciudad">
                        <option value="1">Barranquilla</option>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Contrase&ntilde;a</label>
                <div class="controls">
                    <input type="password" name="password" class="input-xlarge" />
                </div>
            </div>    

            <div class="control-group">
                <label class="control-label">Confirmar Contrase&ntilde;a</label>
                <div class="controls">
                    <input type="password" name="confirmar_password" class="input-xlarge" />
                </div>
            </div>    

            <div class="control-group">
                <div class="controls">
                    <input type="submit" value="Registrar" class="btn btn-primary" />
                </div>
            </div>      
        </form>
        <a href="<?php echo site_url('/') ?>">Atras</a>
    </div>
</div>

<script type="text/javascript">
    $(function() {

        $("#register_form_error").hide();
        $("#register_form").submit(function(evt) {
            evt.preventDefault();
            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function(o) {
                if (o.result == 1) {
                    window.location.href = '<?php echo site_url('dashboard') ?>';
                } else {
                    $("#register_form_error").show();
                    var output = '<ul>';
                    for (var key in o.error) {
                        var value = o.error[key];
                        output += '<li>' + key + ': ' + value + '</li>';
                    }
                    output += '</ul>';
//                    alert(o.error);
                    $("#register_form_error").html(output);
                }
            }, 'json');
        });
    });
</script>