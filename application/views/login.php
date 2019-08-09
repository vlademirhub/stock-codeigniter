<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 col-8 offset-2">
            <div class="card p-4">
                <h3>Login</h3>

                <form action="<?= site_url('geral/checklogin'); ?>" method="post">
                    <div class="form-group">
                        <input type="text"
                        name="username"
                        class="form-control"
                        placeholder="Usuário"
                        required>
                    </div>

                    <div class="form-group">
                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Senha"
                               required>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>