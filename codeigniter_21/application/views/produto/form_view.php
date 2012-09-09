<?php
$ref = ($form_values)?$form_values->referencia:'';
$descr = ($form_values)?$form_values->descricao:'';
?>
<a href="<?php echo site_url('produto/lista'); ?>"><< ir para lista de produtos</a>
        <br />
        <h1><?php echo $content_title; ?></h1>
        <?php echo validation_errors(); ?>
        <?php if($message): ?><p><?php echo $message; ?></p><?php endif; ?>
        <?php echo form_open(); ?>
            <ul>
                <li><?php echo form_label('Referência*:', 'referencia'); ?> <?php echo form_input('referencia', $ref, ' class="required"'); ?></li>
                <li><?php echo form_label('Descrição*:', 'descricao'); ?> <?php echo form_input('descricao', $descr, ' class="required"'); ?></li>
                <?php if(isset($categorias)): ?>
                <li>
                    <?php echo form_label('Categoria*:', 'categoria_id'); ?>
                    <select name="categoria_id" class="required">
                        <option></option>
                        <?php foreach($categorias as $categoria): ?>
                        <option<?php echo($form_values && $form_values->categoria_id == $categoria->id)?' selected="selected"':''; ?> value="<?php echo $categoria->id; ?>"><?php echo $categoria->nome; ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <?php endif; ?>
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
                            jQuery(this).after('<span class="required_msg">Este campo é obrigatório.</span>');
                            validade = false;
                        }
                    });
                    return validade;
                });
            });
        </script>