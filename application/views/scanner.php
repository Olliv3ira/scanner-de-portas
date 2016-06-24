<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


    <div class="jumbotron">
        <div class="container txt-justify">
            <h1>Scanner de portas <small>(<b>SEU IP: <span id="ipaddress"><?= $ipaddress; ?></span></b>)</small></h1>            
            <h3>                
                Antes de realizar os testes, tenha certeza que os serviços estejam rodando em sua rede.
            </h3>            
        </div>
    </div>

    <div class="container">
        <form class="form-inline" method="post">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-th-list"></span></div>      
                    <select class="form-control" id="selectGroup">
                        <option value="">Selecione um grupo</option>
                        <?php foreach($groups AS $group): ?>
                        <option value="<?= $group->ID; ?>"><?= $group->GRUPO; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button class="btn btn-default" type="button" onclick="return getPorts();">Exibir</button>
            <button class="btn btn-primary" type="button" name="view" onclick="return getVerification('<?= $ipaddress; ?>');">Verificar</button>
        </form>
        <table class="table table-condensed table-hover table-bordered" style="margin-top: 2rem;">
            <thead class="panel panel-default">
                <tr class="panel-heading">
                    <th style="padding:0 1.5rem 1.5rem 1.5rem;"><input type="checkbox" name="allcheckbox" onclick="return checkboxOn(this);"></th>
                    <th style="padding:1rem 1.5rem;"><h5>PORTA</h5></th>
                    <th style="padding:1rem 1.5rem;"><h5>PROTOCÓLO</h5></th>
                    <th style="padding:1rem 1.5rem;"><h5>SERVIÇO</h5></th>
                    <th style="padding:1rem 1.5rem;"><h5>DESCRIÇÃO</h5></th>
                    <th style="padding:1rem 1.5rem;"><h5>STATUS</h5></th>    
                </tr>
            </thead>
            <tbody id="result">
            </tbody>
        </table>
    </div> <!-- /container -->