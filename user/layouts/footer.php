<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 2.2.3
    </div>
    <strong>Created By &copy; 2021 <a href="demiadektu.com">MyMango.ID</a>.</strong>
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>

<script src="<?= assets('plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= assets('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= assets('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= assets('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= assets('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= assets('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= assets('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= assets('plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= assets('plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= assets('plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<script src="<?= assets('plugins/select2/js/select2.full.min.js') ?>"></script>
<script src="<?= assets('plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= assets('dist/js/adminlte.min.js') ?>"></script>
<script src="<?= assets('plugins/moment/moment.min.js') ?>"></script>
<script src="<?= assets('plugins/inputmask/jquery.inputmask.min.js') ?>"></script>
<script src="<?= assets('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<script>
    $(function() {
        $('.select2').select2()

        $('#IncomeDate').datetimepicker({
            format: 'DD-MM-YYYY',
            defaultDate: new Date(),
        });

        $('#IncomeDate').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        $('#ExpenseDate').datetimepicker({
            format: 'DD-MM-YYYY',
            defaultDate: new Date(),
        });

        $('#ExpenseDate').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        $('#TransferDate').datetimepicker({
            format: 'DD-MM-YYYY',
            defaultDate: new Date(),
        });

        $('#TransferDate').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    var nominalRupiah = document.getElementById("nominalRupiah");
    nominalRupiah.addEventListener("keyup", function(e) {
        nominalRupiah.value = formatRupiah(this.value, "Rp. ");
    });


    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>
</body>

</html>
