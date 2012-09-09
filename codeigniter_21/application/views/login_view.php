        <a href="<?php echo site_url(); ?>"><< ir para página inicial</a>
        <br />
        <h1><?php echo $content_title; ?></h1>
        <div id="form_login">
            <?php echo validation_errors(); ?>
            <?php echo form_open(); ?>
            <ul>
                <li> <?php echo form_label('Usuário:', 'username'); ?> <?php echo form_input('username', '', ' class="required"'); ?> </li>
                <li> <?php echo form_label('Senha:', 'password'); ?> <?php echo form_password('password', '', ' class="required"'); ?> </li>
            </ul>
            <?php echo form_submit('submit', 'Entrar no sistema'); ?>
            <?php form_close(); ?>
        </div>
        <script type="text/javascript">
            var validade = false;
            jQuery(function(){
                jQuery('form').submit(function(){
                    validade = true;
                    jQuery('.required_msg').remove();
                    jQuery(this).find('.required').each(function(){
                        if(jQuery(this).val().length == 0){
                            jQuery(this).after('<span class="required_msg">Este campo é obrigatório.</span>')
                            validade = false;
                        }
                    });
                    return validade;
                });
            });
        </script>