<div class="row">

    <div id="dashboard-side" class="span4">
        <form id="create_categoria" class="form-horizontal" method="post" action="<?php echo site_url('api/create_categoria') ?>">
            <div class="input-append">
                <input type="text" name="categoria" placeholder="Crear Nueva categoria" />
                <input type="submit" class="btn btn-success" value="Crear" />
            </div>
        </form>

        <div id="list_todo">
            <span class="ajax-loader-gray"></span>
        </div>

        <div id="list_categoria">
            <span class="ajax-loader-gray"></span>
        </div>
    </div>

    <div id="dashboard-main" class="span8">
        <form id="create_pais" class="form-horizontal" method="post" action="<?php echo site_url('api/create_pais') ?>">
            <div class="input-append">
                <input tabindex="1" type="text" name="title" placeholder="Note Title" />
                <input tabindex="3" type="submit" class="btn btn-success" value="Create" />
            </div>

            <div class="clearfix"></div>

            <textarea tabindex="2" name="content"></textarea>

        </form>

        <div id="list_note">
            <span class="ajax-loader-gray"></span>
        </div>
    </div>
    
</div>
