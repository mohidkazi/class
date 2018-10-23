        <?php
        ob_start();
        include("sidebar.php");
        ?>
        <!-- page content on right side -->
        <div class="container">
            <h2>Hello World</h2>
            
            <div class="line"></div>
        </div>
        
    </div>
</div>
<!-- active element using jquery -->
<script type="text/javascript">
    $(document).ready(function(e){
        $('#dashboard').addClass('active');
    });

</script>
</body>
</html>