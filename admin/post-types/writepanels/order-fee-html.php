<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<tr class="fee" data-order_item_id="<?php echo $item_id; ?>">
	<td class="check-column"><input type="checkbox" /></td>
	
	<td class="thumb"></td>
	
	<td class="name">
		<input type="text" placeholder="<?php _e( 'Fee Name', 'woocommerce' ); ?>" name="order_item_name[<?php echo absint( $item_id ); ?>]" value="<?php if ( isset( $item['name'] ) ) echo esc_attr( $item['name'] ); ?>" />
		<input type="hidden" class="order_item_id" name="order_item_id[]" value="<?php echo esc_attr( $item_id ); ?>" />
	</td>
	
	<td class="tax_class" width="1%">
		<select class="tax_class" name="order_item_tax_class[<?php echo absint( $item_id ); ?>]" title="<?php _e( 'Tax class', 'woocommerce' ); ?>">
			<?php
			$item_value = isset( $item['tax_class'] ) ? sanitize_title( $item['tax_class'] ) : '';
			
			$tax_classes = array_filter( array_map( 'trim', explode( "\n", get_option('woocommerce_tax_classes' ) ) ) );
			
			$classes_options = array();
			$classes_options[''] = __( 'Standard', 'woocommerce' );
			
			if ( $tax_classes ) 
				foreach ( $tax_classes as $class )
					$classes_options[ sanitize_title( $class ) ] = $class;
			
			foreach ( $classes_options as $value => $name ) 
				echo '<option value="' . esc_attr( $value ) . '" ' . selected( $value, $item_value, false ) . '>'. esc_html( $name ) . '</option>';
			?>
		</select>
	</td>

	<td class="quantity" width="1%">1</td>

	<td class="line_cost" width="1%">
		<label><?php _e( 'Total', 'woocommerce' ); ?>: <input type="text" name="line_total[<?php echo absint( $item_id ); ?>]" placeholder="0.00" value="<?php if ( isset( $item['line_total'] ) ) echo esc_attr( $item['line_total'] ); ?>" class="line_total" /></label>
	</td>

	<td class="line_tax" width="1%">
		<input type="text" name="line_tax[<?php echo absint( $item_id ); ?>]" placeholder="0.00" value="<?php if ( isset( $item['line_tax'] ) ) echo esc_attr( $item['line_tax'] ); ?>" class="line_tax" />
	</td>

</tr>