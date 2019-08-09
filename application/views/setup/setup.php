<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-sm-6 offset-sm-3 col-8 offset-2">
            <div class="card p-4 text-center">
                <h3>SETUP</h3>
                <div class="text-center m-2">
                    <a href="<?= site_url('geral/resetdatabase'); ?>" class="btn btn-primary">Reiniciar</a>
                </div>

                <div class="text-center m-2">
                    <a href="<?= site_url('geral/insertusers'); ?>" class="btn btn-primary">Inserir Usuários</a>
                </div>

                <div class="text-center m-2">
                    <a href="<?= site_url('geral/insertproducts'); ?>" class="btn btn-primary">Inserir Produtos</a>
                </div>

                <div class="text-center m-2">
                    <a href="<?= site_url('geral'); ?>" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>