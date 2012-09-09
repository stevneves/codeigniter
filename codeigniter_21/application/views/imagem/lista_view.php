        <a href="<?php echo site_url(); ?>"><< ir para página inicial</a>
        <br />
        <h1><?php echo $content_title; ?></h1>
        <p><a href="<?php echo site_url('imagem/adicionar'); ?>">Adicionar</a></p>
        <?php if($imagens): ?>
        <form action="<?php echo site_url('imagem/excluir')?>" method="post">
            <table id="list_table" class="dataTable display">
                <thead>
                    <tr>
                        <th class="nopadding"></th>
                        <th>ID</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Sufixo</th>
                        <th>Produto</th>
                        <th>Status</th>
                        <th class="noborder nopadding"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($imagens as $imagem): ?>
                    <tr>
                        <td class="noborder nopadding"><input type="checkbox" name="remover[]" value="<?php echo $imagem->id; ?>" /></td>
                        <td class="noborder nopadding"><?php echo $imagem->id; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($imagem->created)); ?></td>
                        <td><?php echo (strtotime($imagem->updated))?date('d/m/Y', strtotime($imagem->updated)):'Não foi atualizado'; ?></td>
                        <td><?php echo $imagem->sufixo; ?></td>
                        <td><?php echo $imagem->produto->get()->referencia; ?></td>
                        <td><a id="toggle_status_<?php echo $imagem->id; ?>" onclick="toggleStatus(<?php echo $imagem->id; ?>);" href="javascript:void(0);"><?php echo ($imagem->status == 1)?'Ativo':'Inativo'; ?></a></td>
                        <td><a href="<?php echo site_url('imagem/editar/'.$imagem->id); ?>">Editar</a> <a href="<?php echo site_url('imagem/excluir/'.$imagem->id); ?>">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="nopadding"></th>
                        <th>ID</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Sufixo</th>
                        <th>Produto</th>
                        <th>Status</th>
                        <th class="noborder nopadding"></th>
                    </tr>
                </tfoot>
            </table>
        </form>
        <div style="padding-left: 15px;">
            <span style="float:left; clear:both; margin-left: 10px; width: 100%;">/\</span><br />
        <span style="padding-left: 18px; margin-left: 13px; border-left: solid 1px #000; border-bottom: solid 1px #000;"><a href="javascript:void(0);" onclick="sendForm();">Remover todos</a></span>
        </div>
        <?php endif; ?>
        <script type="text/javascript">
            function sendForm(){
                if(jQuery('form input[type=checkbox]:checked').length > 0) jQuery('form').submit();;
            }
            
            function toggleStatus(id){
                jQuery.post('<?php echo site_url('ajax/togglestatus'); ?>',{id:id, type: 'imagem'}, function(data){
                    jQuery('#toggle_status_'+id).html(data);
                });
            }
            
            jQuery(function(){
                jQuery('#list_table').dataTable();
            });
        </script>