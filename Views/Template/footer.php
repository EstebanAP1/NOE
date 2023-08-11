<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <!-- <b>Version</b> Incompleta -->
    </div>
    <!-- <strong>Copyright &copy; 2023 <a href="#">CajacopiEPS</a>.</strong> -->
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
if ($data['page_name'] == 'Computadores' || $data['page_name'] == 'Mantenimientos') {
    ?>
    <script src="<?= media() ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <?php
}
if ($data['page_name'] == 'Home') {
    ?>
    <script src="<?= media() ?>\plugins\chart.js\chart.umd.min.js"></script>
    <script>
        $(function () {
            const ctx = document.getElementById('myChart');
            const ctx2 = document.getElementById('myChart2');

            const char1 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Nacional', 'Barranquilla', 'Guajira', 'Boyacá', 'Bolivar', 'Cesar', 'Meta'],
                    datasets: [{
                        label: 'Escritorio',
                        data: [12, 19, 3, 5, 2, 3, 2],
                        borderWidth: 1,
                        borderColor: 'rgba(51, 51, 52, 0.8)',
                        backgroundColor: 'rgba(51, 51, 52, 0.5)'
                    },
                    {
                        label: 'Portátil',
                        data: [2, 5, 4, 16, 19, 1, 2],
                        borderWidth: 1,
                        borderColor: 'rgba(200, 200, 255, 0.5)',
                        backgroundColor: 'rgba(200, 200, 255, 0.7)'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Data',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    <?php
}
?>

<!-- Own scripts -->
<script src="<?= media() ?>/js/functions/general.js"></script>
<?php if ($data['page_name'] == 'Computadores' || $data['page_name'] == 'Roles' || $data['page_name'] == 'Usuarios' || $data['page_name'] == 'Mantenimientos') { ?>
    <script src="<?= media() ?>/js/functions/<?= $data['page_function'] ?>"></script>
<?php } ?>
</body>

</html>