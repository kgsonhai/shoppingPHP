
<nav aria-label="Page navigation example" class="d-flex flex-row-reverse ">
  <ul class="pagination">
  	<?php
  	if ($current_page > 3) {
  		$first_page = 1;
  	?> 
  		<li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$first_page?>">First</a></li> <?php }  ?>
  	<?php
  	if ($current_page > 1) {
  		$prev_page = $current_page-1;
  	?> 
  		<li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$prev_page?>">Previous</a></li> <?php }  ?>	

  			<?php for($num = 1;$num <= $totalPage; $num++){ ?>
  			<?php if($num != $current_page ){ ?>
  				<?php if($num>$current_page-3 && $num<$current_page+3){	 ?>
  				<li class="page-item">
    			<a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$num?>">
    			<?php echo $num  ?></a></li>
				<?php } ?>

  			<?php  }else{	 ?>
   				<li class="page-item">
    			<strong class="page-link">
    			<?php echo $num  ?></strong></li>
			<?php } } ?>


			<?php
			if ($current_page < $totalPage-1){
				$next_page = $current_page+1;
			 ?> 
			<li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$next_page?>">Next</a></li>
			<?php } ?>
			<?php
			if ($current_page < $totalPage-3){
				$end_page = $totalPage;
			 ?> 
			<li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$end_page?>">Last</a></li>
			<?php } ?>
  </ul>
</nav>
