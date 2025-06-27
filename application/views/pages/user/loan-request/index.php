<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-12">
            <?php require APPPATH.'views/layout/alert.php'; ?>
        </div>
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Manage Loan Requests</h6>
                    </div>
                </div>
                <div class="card-body m-0">
                    <form action="<?= base_url('user/loan-request'); ?>" method="post" autocomplete="off" >
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Request Loan Amount</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="loan_amount" onkeypress="return /[0-9]/i.test(event.key)" value="<?= set_value('loan_amount'); ?>" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Loan Request Tenure</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="tenure" onkeypress="return /[0-9]/i.test(event.key)" min="12" max="72" value="<?= set_value('tenure'); ?>"  />
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="">Loan Request Purpose</label>
                                <div class="input-group input-group-outline">
                                    <textarea name="purpose" class="form-control" rows="5"><?= set_value('purpose'); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Apply For Loan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
