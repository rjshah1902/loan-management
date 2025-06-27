<?php if(!empty($loanRequest)){ ?>
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


            <?php if(count($loanTenure) > 0){ ?>
                <div class="card mt-5">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Manage Loan Tenure</h6>
                        </div>
                    </div>
                    <div class="card-body m-0">
                        <table class="table align-items-center mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Payment Date</th>
                                    <th>Base Amount</th>
                                    <th>Interest Amount</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1;
                                if(count($loanTenure) > 0){
                                    foreach($loanTenure as $lt){
                                        $statusColor = "bg-gradient-info";
                                        if($lt->payment_status == 'paid'){
                                            $statusColor = "bg-gradient-success";
                                        }else if($lt->payment_status == 'failed'){
                                            $statusColor = "bg-gradient-danger";
                                        } ?>
                                        <tr>
                                            <td><?= $count++; ?></td>
                                            <td><?= date('d M, Y', strtotime($lt->payment_date)); ?></td>
                                            <td>₹<?= $lt->base_amount; ?></td>
                                            <td>₹<?= $lt->interest_amount; ?></td>
                                            <td>₹<?= $lt->total_amount; ?></td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm <?= $statusColor; ?>">
                                                    <?= ucfirst($lt->payment_status); ?>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <?php   if($lt->payment_status != 'paid'){ ?>
                                                    <a href="<?= base_url('user/mark-as-paid/'.$lt->id); ?>" class="btn btn-primary btn-sm">
                                                            Mark As Paid
                                                    </a>
                                                <?php } else{ ?>
                                                    <a href="javascript:void(0)" class="btn btn-secondary">
                                                        Already Paid
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>