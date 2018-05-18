      <!-- FOOTER -->
    <footer>
      <div class="container">
        <div class="row iconsfa">
         
                  
            <a target="_blank" href="https://www.facebook.com/CityBirdsConnect/"><i class="fab fa-facebook-f icons"></i></a>
            <a target="_blank" href="https://www.instagram.com/ecitybirds/"><i class="fab fa-instagram icons"></i></a>
            <a href="https://github.com/eartsupbdx/citybirds" target="_blank"><i class="fab fa-github icons"></i></a>


          </div>
          <p class="copyright">Copyright CityBirds - 2018</p>
          
        </div>
      </div>
    </footer>
    </main>

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/jquery-3.3.1.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/popper.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/bootstrap.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/holder.min.js"></script>
  	<script>
		<?php echo 'var ajaxurl = "' . admin_url('admin-ajax.php') . '";' ?>
		function delete_pic_from_front(pic_id){
			$.post( ajaxurl,
				{
				"action": "delete_pic_from_front",
				"pic_id": pic_id
				},
				function(response){
					window.location.reload();
				}
			);
		}
		function update_pic_title_from_front(pic_id, title){
			$.post( ajaxurl,
				{
				"action": "update_pic_title_from_front",
				"pic_id": pic_id,
				"pic_title":title
				},
				function(response){
					console.log(response);	
				//window.location.reload();
				}
			);
		}

</script>

</body>
</html>