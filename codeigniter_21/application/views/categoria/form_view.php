<?php
$nome = ($form_values)?$form_values->nome:'';
?>
<a href="<?php echo site_url('categoria/lista'); ?>"><< ir para lista de categorias</a>
        <br />
        <h1><?php echo $content_title; ?></h1>
        <?php echo validation_errors(); ?>
        <?php if($message): ?><p><?php echo $message; ?></p><?php endif; ?>
        <?php echo form_open(); ?>
            <ul>
                <li><?php echo form_label('Nome*:', 'nome'); ?> <?php echo form_input('nome', $nome, ' class="required"'); ?></li>
                <li><?php echo form_submit('submit', 'Enviar'); ?></li>
            </ul>
        <?php form_close(); ?>
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