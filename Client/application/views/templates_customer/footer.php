        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Kost Tegar 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="ext/scripts.js"></script>
        <script>
            // fungsi untuk ke halaman detail hunian
            // function gotoDetail(nomor_hunian)
            // {
            //     location.href='<?php echo site_url("Hunian/detailHunian")?>'+'?nomor_hunian='+nomor_hunian
            // }

            // fungsi untuk ke halaman detail hunian
            function gotoDetail($nomor_hunian)
            {
                location.href='<?php echo site_url("Hunian/detailHunian")?>'
            }
        </script>
    </body>
</html>
