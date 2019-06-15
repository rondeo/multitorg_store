<?php wp_head(); ?>

<body>
	

<?php 
	            $posts = get_posts( array(
	            'category_name'    => 'clothes',
	            'order' => 'DESC',
	            'numberposts' => 3,
	            'post_type'   => 'post',
	            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	            ) );

	            foreach( $posts as $post ){
	            setup_postdata($post);
	            ?>
							
							
							<h1>Hi</h1>

				
							<?php
			        	}
			          	wp_reset_postdata(); // сброс

			       		?>



</body>

<?php wp_footer(); ?>