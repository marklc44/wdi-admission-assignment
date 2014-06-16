	</div>

      <footer class="footer">
      	<div class="container">
      		<div class="row">
      			<div class="col-md-6">
			        <p>&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
			    </div>
			    <div class="col-md-6 social-media">
					<a href="www.linkedin.com/in/markcentoni/"><span class="socicon">j</span></a>
					<a href="https://github.com/marklc44"><span class="socicon">Q</span></a>
					<a href="https://twitter.com/markcentoni"><span class="socicon">a</span></a>
					<a class="email" href="mailto:mark@markcentoni.com">mark (at) markcentoni dot com</a>
		    </div>
			    </div>
		    </div>
	    </div>
      </footer>
    </div> <!-- /container -->

    <?php wp_footer(); ?>

    <div id="contact-form" class="modal fade contact-form">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">What's on your mind?</h4>
	      </div>
	      <div class="modal-body">

			<?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 1 ); } ?>

	      </div>
	      <div class="modal-footer">
	      	<div class="col-sm-6 social-media">
				<a href="www.linkedin.com/in/markcentoni/"><span class="socicon">j</span></a>
				<a href="https://github.com/marklc44"><span class="socicon">Q</span></a>
				<a href="https://twitter.com/markcentoni"><span class="socicon">a</span></a>
				<a class="email" href="mailto:mark@markcentoni.com">mark (at) markcentoni dot com</a>
		    </div>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  </body>
</html>