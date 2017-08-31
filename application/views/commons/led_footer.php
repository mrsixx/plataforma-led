        </div>
    </div>
    </div>

    <script src="<?= base_url("assets/js/jquery-3.2.1.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/bootstrap.min.js");?>"></script>
    <script type="text/javascript">
        $(function() {

            $('#slide-submenu').on('click', function() {  
                $(this).closest('.list-group').hide('slide', function() {
                    $('.mini-submenu').fadeIn();
                });
            });

            $('.mini-submenu').on('click', function() {
                $(this).next('.list-group').toggle('slide');
                $('.mini-submenu').hide();
            })
        })
    </script>
</body>

</html>