
            	<div class="footer">
                	<div class="footer_left"></div>
                    <div class="footer_middle">
                    	<?php include( THEME_MODULES . '/page-nav-footer.php' ); ?>
                        
                        <p class="copyrights"><?php echo tfuse_qtranslate(get_option(PREFIX.'_footer_text')) ?></p>
                    </div>
                    <div class="footer_right"></div>
                    <div class="clear_container"></div>
                </div>
                <!-- .footer -->
                  
            </div>
            <!-- #CONTENT_SECONDARY_WRAPPER -->    
        </div>
        <!-- #BODY_SECONDARY_WRAPPER -->
	</div>
    <!-- #HTML_SECONDARY_WRAPPER -->
    
    <?php if(get_option(PREFIX.'_cufon')!='true') { ?>
    <script type="text/javascript">
		Cufon.replace('h1');
    	Cufon.replace('h2 a');
		Cufon.replace('h3');
		Cufon.replace('h4');
    </script>
    <?php } ?>
    
    <?php wp_footer(); ?>
    <?php $analitycs = get_option(PREFIX.'_google_analytics'); if ( $analitycs <> '' ) { echo html_entity_decode($analitycs,ENT_QUOTES, 'UTF-8'); } ?>
    
</body>
</html>