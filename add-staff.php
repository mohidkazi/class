<?php 
require("config.php");
ob_start();
include("sidebar.php")
 ?>



</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#addstaff , #supportstaff').toggleClass('active');
		$('#datatable').DataTable();
	});

</script>
</body>
</html>