<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-12">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
                <p class="mb-4">
                    Dear <?= ucfirst($this->session->userdata('user_name')); ?>, Welcome to User Dashboard
                </p>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Total Loan Request</p>
                  <h4 class="mb-0"><?= $totalLoanRequestCount ?></h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">weekend</i>
                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-2 ps-3">
              <p class="mb-0 text-sm">My Loan Request</p>
            </div>
          </div>
        </div>
    </div>
</div>