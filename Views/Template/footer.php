<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.1
    </div>
    <strong>Copyright &copy; 2023 <a href="#">CajacopiEPS</a>.</strong>
</footer>

</div>
<!-- ./wrapper -->

<script>
    const base_url = "<?= base_url() ?>";
    const nav_link = "<?= strtolower($data['page_name']) ?>";
    const nav_link_father = "<?= strtolower($data['nav_father']) ?>";
</script>
<!-- jQuery -->
<script src="<?= media() ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= media() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap select -->
<script src="<?= media() ?>/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<!-- DataTable -->
<script src="<?= media() ?>/plugins/datatable/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= media() ?>/plugins/datatable/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= media() ?>/plugins/datatable/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= media() ?>/plugins/datatable/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Sweetalert2 -->
<script src="<?= media() ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Template scripts -->
<script src="<?= media() ?>/js/main.min.js"></script>
<?php
if ($data['page_name'] == 'Usuarios') { ?>
    <!-- DataTable Buttons -->
    <script src="<?= media() ?>/plugins/datatable/buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= media() ?>/plugins/datatable/buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= media() ?>/plugins/datatable/jszip/jszip.min.js"></script>
    <script src="<?= media() ?>/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="<?= media() ?>/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="<?= media() ?>/plugins/datatable/buttons/js/buttons.html5.min.js"></script>
<?php } ?>
<!-- Own scripts -->
<script src="<?= media() ?>/js/functions/general.js"></script>
<?php if ($data['page_name'] == 'Computadores' || $data['page_name'] == 'Roles' || $data['page_name'] == 'Usuarios') { ?>
    <script src="<?= media() ?>/js/functions/<?= $data['page_function'] ?>"></script>
<?php } ?>
</body>

</html>