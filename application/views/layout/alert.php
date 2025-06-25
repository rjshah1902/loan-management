<?php if($this->session->flashdata('success_message')){ ?>
    <div class="alert alert-success alert-dismissible text-white" role="alert">
        <span class="text-sm"><?= $this->session->flashdata('success_message'); ?></span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php } ?>

<?php if($this->session->flashdata('error_message')){ ?>
    <div class="alert alert-danger alert-dismissible text-white" role="alert">
        <span class="text-sm"><?= $this->session->flashdata('error_message'); ?></span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php } ?>

<?php if (validation_errors()){ ?>
    <style>
        .alert-danger p{
            margin: 0;
        }
    </style>
    <div class="alert alert-danger mb-0 text-white">
        <?= validation_errors(); ?>
    </div>
<?php } ?>