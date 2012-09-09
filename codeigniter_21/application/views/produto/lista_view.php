        <a href="<?php echo site_url(); ?>"><< ir para página inicial</a>
        <br />
        <h1><?php echo $content_title; ?></h1>
        <p><a href="<?php echo site_url('produto/adicionar'); ?>">Adicionar</a></p>
        <?php if($produtos): ?>
        <form action="<?php echo site_url('produto/excluir')?>" method="post">
            <table id="list_table" class="dataTable display">
                <thead>
                    <tr>
                        <th class="nopadding"></th>
                        <th>ID</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Referência</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th class="noborder nopadding"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($produtos as $produto): ?>
                    <tr>
                        <td class="noborder nopadding"><input type="checkbox" name="remover[]" value="<?php echo $produto->id; ?>" /></td>
                        <td class="noborder nopadding"><?php echo $produto->id; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($produto->created)); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($produto->updated)); ?></td>
                        <td><?php echo $produto->referencia; ?></td>
                        <td><?php echo $produto->descricao; ?></td>
                        <td><a id="toggle_status_<?php echo $produto->id; ?>" onclick="toggleStatus(<?php echo $produto->id; ?>);" href="javascript:void(0);"><?php echo ($produto->status == 1)?'Ativo':'Inativo'; ?></a></td>
                        <td><a href="<?php echo site_url('produto/editar/'.$produto->id); ?>">Editar</a> <a href="<?php echo site_url('produto/excluir/'.$produto->id); ?>">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="nopadding"></th>
                        <th>ID</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Referência</th>
                        <th>Descrição</th>
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
                jQuery.post('<?php echo site_url('ajax/togglestatus'); ?>',{id:id, type: 'product'}, function(data){
                    jQuery('#toggle_status_'+id).html(data);
                });
            }
            
            jQuery(function(){
                jQuery('#list_table').dataTable();
            });
        </script>