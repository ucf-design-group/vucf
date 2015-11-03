<!-- FOOTER S -->
		</div> <!-- e/o .page -->
		<footer>
			<!-- IMAGES HERE -->
			<p class="logos group">
				<a class="osi" href="http://osi.ucf.edu/">OSI</a>
				<a class="ucf" href="http://ucf.edu/">UCF</a>
				<a class="sga" href="http://sga.ucf.edu/">SGA</a>
				<a class="dg" href="http://osi.ucf.edu/design-group/">Design Group</a>
			</p>
			<!-- Set the backgrounds of each anchor with logo image sprite so it's one HTTP request, use Sass -->
			<p>
				© <?php echo date('Y'); ?> University of Central Florida Office of Student Involvement<br />
				Student Union, Room 208, P.O. Box 163245, Orlando, FL 32816-3245<br />
				email: osi@ucf.edu | phone: 407.823.6471 | fax: 407.823.5899<br />
			</p>
		</footer>
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

		<?php wp_footer(); ?>

		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>


<?php

if (time() > strtotime("7/4/2013 12:01am") && time() < strtotime("7/4/2013 11:59pm")) {

?>
<SCRIPT type="text/javascript" SRC="<?php echo network_site_url(); ?>/fireworks/JSFX_Layer.js"></SCRIPT>
<SCRIPT type="text/javascript" SRC="<?php echo network_site_url(); ?>/fireworks/JSFX_Browser.js"></SCRIPT>
<SCRIPT type="text/javascript" SRC="<?php echo network_site_url(); ?>/fireworks/JSFX_Fireworks3.js"></SCRIPT>
<SCRIPT type="text/javascript">
	jQuery(document).ready(function(){
		JSFX_StartEffects();
	});
	function JSFX_StartEffects()
	{
		JSFX.Fire(40, 100, 100);
		setTimeout("JSFX.Fire(40, 100, 100)", 1000);
	}
</SCRIPT>
<?php
}
?>
	</body>
</html>
<!-- FOOTER E -->