<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="container-fluid">
    <div class="row pt-2 pb-2">
        <div class="col-sm-6 offset-sm-3 col-8 offset-2">
            <div class="text-center p-3 alert alert-<?= $type; ?>">
                <p><?= $message; ?></p>
            </div>
        </div>
    </div>
</div>
