<div class="row">
    <div class="span6">
        <form id="login_form" class="form-horizontal" method="POST" action="<?php echo site_url('user/login') ?>">

            <div class="control-group">
                <label class="control-label">Login</label>
                <div class="controls">
                    <input type="text" name="login" class="input-xlarge" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <input type="password" name="password" class="input-xlarge" />
                </div>
            </div>    

            <div class="control-group">
                <div class="controls">
                    <input type="submit" value="Login" class="btn btn-primary" />
                </div>
            </div>      
        </form>
        <a href="<?php echo site_url('home/register')?>">Registrar</a>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $("#login_form").submit(function(evt) {
            evt.preventDefault();
            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function(o) {
                if (o.result == 1) {
                    alert('Acceso Concedido');
                    window.location.href = '<?php echo site_url('dashboard') ?>';
                } else {
                    alert('Usuario y/o Contraseña incorrectos');
                }
            }, 'json');
        });
    });
</script>