function gallery_project() {
	
	$gallery = '
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
		  $(".modal__close").click(function(){
		  	$(".modal").hide();
		  });
		});
		</script>
	
	<div class="masonry">';
	$i = '0';
	$project_gallery = get_field('gallery');
	foreach($project_gallery as $image){
		$gallery .= '<div class="masonry-brick" id="image-'.$i.'">
		
		<script>
		$(document).ready(function(){
		  $("#image-'.$i.'").click(function(){
			$("#modal-'.$i.'").show();
		  });
		  
		});
		</script>
			<img class="masonry-img" src="'.$image.'">
					
					 
				</div>';
		$i++;
	}
	$gallery .= '</div>';
	$p = '0';
	foreach($project_gallery as $image){
		
			$gallery .= '<div class="modal" id="modal-'.$p.'">
							<div class="modal__content">
					  			<div class="modal__close">&times;</div>
								<img src="'.$image.'">

							</div>
				 		</div>';
		$p++;
	}
	
	return $gallery;
}

add_shortcode('project-gallery','gallery_project');
