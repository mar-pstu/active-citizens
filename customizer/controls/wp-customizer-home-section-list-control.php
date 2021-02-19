<?php


if ( class_exists( 'WP_Customize_Control' ) ) :

	class WP_Customizer_Home_Section_List_control extends WP_Customize_Control {
		
		public $type = 'homesectionlist';

		public function render_content() {
			
			// Get Value from this setting
			$values = $this->value();

			?>

				<div data-homesectionlist-id="<?php echo $this->id; ?>">
				 
					<label><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span></label>

					<div class="control-list" id="homesectionlist-list-<?php echo $this->id; ?>"></div>

					<button type="button" id="homesectionlist-button-add-<?php echo $this->id; ?>" class="button list-control-add button-default">
						<?php _e( 'Добавить', PSTUCTVSTZS_TEXTDOMAIN ); ?>
					</button>
							
					<?php
						if ( ! is_serialized( $values ) ) {
							$values = serialize( $values );
						}
					?>
					
					<input <?php echo $this->link(); ?> type="hidden" id="homesectionlist-input-<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" value="<?php echo $values; ?>" placeholder="" />

					<script type="text/html" id="tmpl-homesectionlist-listitem-<?php echo $this->id; ?>"></script>

					<script type="text/html" id="tmpl-homesectionlist-addform-<?php echo $this->id; ?>">
						<input type="text" data-homesectionlist-addform-name="title" value="" placeholder="Название секции">
						<input type="text" data-homesectionlist-addform-name="slug" value="" placeholder="Уникальный идентификатор">
						<select data-homesectionlist-addform-name="type">
							<option value="default">Стандартный</option>
							<option value="page">Контент страницы</option>
							<option value="category">Посты из категории</option>
						</select>
					</script>

				</div>
					 
			<?php
		}

	}

endif;