
  <script src="<?= base_url(); ?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="<?= base_url(); ?>assets/js/material-dashboard.min.js?v=3.2.0"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
     function deleteData(url) {
        Swal.fire({
            title: "Are you sure?",
            text: "Are you sure to delete this data",
            icon: "warning",
            confirmButtonText: "Yes, Delete",
            showCancelButton: true,
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                window.location.href = url;
                return true;
            } else {
                return false;
            }
        });
    }
  </script>
</body>
</html>