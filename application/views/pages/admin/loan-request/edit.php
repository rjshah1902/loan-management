<?php $statusColor = "bg-gradient-info";
    if($loanRequest->request_status == 'approved'){
        $statusColor = "bg-gradient-success";
    }else if($loanRequest->request_status == 'rejected'){
        $statusColor = "bg-gradient-danger";
    } ?>

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
                    
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Loan Amount</th>
                                <th class="bg-secondary text-white">₹<?= round($loanRequest->loan_amount) ?></th>
                                <th>Loan Status</th>
                                <th class="bg-secondary text-white">
                                    <span class="badge badge-sm <?= $statusColor; ?>">
                                        <?= ucfirst($loanRequest->request_status); ?>
                                    </span>
                                </th>
                            </tr>
                            <tr>
                                <th>Request Id</th>
                                <th class="bg-secondary text-white"><?= $loanRequest->id ?></th>
                                <th>Username</th>
                                <th class="bg-secondary text-white"><?= $loanRequest->name ?></th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th class="bg-secondary text-white"><?= strtolower($loanRequest->email) ?></th>
                                <th>Contact</th>
                                <th class="bg-secondary text-white"><?= $loanRequest->contact; ?></th>
                            </tr>
                            <tr>
                                <th>Tenure</th>
                                <th colspan="3" class="bg-secondary text-white"><?= $loanRequest->tenure; ?></th>
                            </tr>
                            <tr>
                                <th>Purpose</th>
                                <th colspan="3" class="bg-secondary text-white"><?= $loanRequest->purpose; ?></th>
                            </tr>
                            <?php if($loanRequest->remark != "" && $loanRequest->remark != null){ ?>
                            <tr>
                                <th>Remark</th>
                                <th colspan="3" class="bg-secondary text-white"><?= $loanRequest->remark; ?></th>
                            </tr>
                            <?php } ?>
                        </thead>
                    </table>
                </div>
            </div>

            <?php if($loanRequest->request_status == 'pending'){ ?>
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('admin/loan-request/updte/'.$loanRequest->id); ?>" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Request Status</label>
                                <div class="input-group input-group-outline">
                                    <select name="request_status" class="form-control form-select">
                                        <option value="pending" <?= ($loanRequest->request_status == 'pending') ? 'selected':'' ?> >Pending</option>
                                        <option value="approved" <?= ($loanRequest->request_status == 'approved') ? 'selected':'' ?> >Approved</option>
                                        <option value="rejected" <?= ($loanRequest->request_status == 'rejected') ? 'selected':'' ?> >Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Request Remark</label>
                                <div class="input-group input-group-outline">
                                <input type="text" class="form-control" name="remark" />
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" class="btn btn-primary mt-3 w-100">
                                    Save Remark
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
