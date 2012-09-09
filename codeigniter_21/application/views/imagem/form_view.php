<?php
$suf = ($form_values)?$form_values->sufixo:'';
?>
<a href="<?php echo site_url('imagem/lista'); ?>"><< ir para lista de imagens</a>
        <br />
        <h1><?php echo $content_title; ?></h1>
        <?php echo validation_errors(); ?>
        <?php if($message): ?><p><?php echo $message; ?></p><?php endif; ?>
        <?php echo form_open_multipart(); ?>
            <ul>
                <?php if(isset($produtos)): ?>
                <li style="margin-bottom: 30px;">
                    <?php echo form_label('Produto*:', 'produto_id'); ?>
                    <select name="produto_id" class="required">
                        <option></option>
                        <?php foreach($produtos as $produto): ?>
                        <option<?php echo($form_values && $form_values->produto_id == $produto->id)?' selected="selected"':''; ?> value="<?php echo $produto->id; ?>"><?php echo $produto->referencia; ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <?php endif; ?>
                <li><?php echo form_label('Sufixo da imagem*:', 'sufixo'); ?> <?php echo form_input('sufixo', $suf, ' class="required" maxlength="10"'); ?></li>
                <li>
                    <p><input type="file" name="img_file"<?php if(!$form_values): ?> class="required"<?php endif; ?> /></p>
                    <?php if($form_values && $form_values->imagem): ?><img src="<?php echo base_url('uploads/'.$form_values->imagem); ?>" /><?php endif; ?>
                    <?php if($multiple_images): ?><a href="javascript:void(0);" id="add_new_img" onclick="addImage();">adicionar outra imagem</a><?php endif; ?>
                </li>
                <li><?php echo form_submit('submit', 'Enviar'); ?></li>
            </ul>
        <?php form_close(); ?>
        <script type="text/javascript">
            var validade = false;
            var img_count = 0;
            
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
            
            function addImage(){
                jQuery('#add_new_img').before('<p><input type="file" name="img_file_'+(++img_count)+'" /><a href="javascript:void(0);" onclick="jQuery(this).parent().remove();">remover</a></p>')
            }
        </script>