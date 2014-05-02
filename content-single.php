<?php if(is_single()): ?>

<h1><?php the_title(); ?></h1>
<p><?php the_content(); ?></p>


<?php comments_template(); ?>



<?php  endif; ?>