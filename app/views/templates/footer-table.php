</div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?= BASEURL; ?>/js/jquery-3.3.1.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= BASEURL; ?>/js/bootstrap.js"></script>

    <!-- Script for modal-->
    <script src="<?= BASEURL; ?>/js/script.js"></script>

    <!-- Script for Sweet alert-->
    <script src="<?= BASEURL; ?>/js/sweetalert2.min.js"></script>

    <!-- Script untuk memanggil library Datatables -->
    <script type="text/javascript" src="<?= BASEURL; ?>/libs/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= BASEURL; ?>/libs/DataTables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?= BASEURL; ?>/libs/DataTables/Buttons-1.6.1/js/buttons.print.min.js"></script>


    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled"); 
    });
    </script>

</body>

</html>

