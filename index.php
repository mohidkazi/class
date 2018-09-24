        <?php
        ob_start();
        include("sidebar.php");
        ?>
        <!-- page content on right side -->
            <!-- <div class="form-group col-sm-6 col-lg-4">
                <input type="text" class="form-control" name="searchkey" style="display: inline-block;">
            </div> -->
            <h2>Hello World</h2>
            
            <div class="line"></div>

            
        </div>
    </div>
    <!-- active element using jquery -->
    <script type="text/javascript">
        $(document).ready(function(e){
            $('#dashboard').addClass('active');

        //jquery for finding function
        // $('#searchkey').change(function(){
        //     var text = $('#text').val();
        //     var searchkey = $('#searchkey')
        //     var splittedtext = str.split('/\r?\n/g');
        //     var result = [];
        //     for(var i = 0; i<splittedtext.length(); i++){
        //         if(splittedtext[i].includes(searchkey)){
        //             result.push('line no: '+i+++splittedtext[i])
        //         }  
        //     }
        // });
    });

</script>
</body>
</html>