<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Проверяет данные поля чекбокс
 * @return   bool
 * */
function sanitize_checkbox( $checked = false ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * Проверяет является ли переданная строка валидным URL
 * @param  string  $url исходная строка
 * @return boolean      результат проверки
 */
function is_url( $url = '' ) {
	return ( bool ) filter_var( $url, FILTER_VALIDATE_URL );
}


/**
 * Конвертер ассоциативного массива в css правила
 * @param    array    $rules   массив параметров, где ключ это селекторы
 * @param    array    $args    дополнительные аргумаенты для преобразования
 * @return   string
 * */
function css_array_to_css( $rules, $args = [] ) {
	$args = array_merge( [
		'indent'     => 0,
		'container'  => false,
	], $args );
	$css = '';
	$prefix = str_repeat( '  ', $args[ 'indent' ] );
	foreach ($rules as $key => $value ) {
		if ( is_array( $value ) ) {
			$selector = $key;
			$properties = $value;
			$css .= $prefix . "$selector {\n";
			$css .= $prefix . css_array_to_css( $properties, [
				'indent'     => $args[ 'indent' ] + 1,
				'container'  => false,
			] );
			$css .= $prefix . "}\n";
		} else {
			$property = $key;
			if ( filter_var( $value, FILTER_VALIDATE_URL ) ) {
				$value = 'url(' . $value . ')';
			}
			$css .= $prefix . "$property: $value;\n";
		}
	}
	return ( $args[ 'container' ] ) ? "\n<style>\n" . $css . "\n</style>\n" : $css;
}


/**
 * Функция для очистки массива параметров
 * @param  array $default           расзерённые парметры и стандартные значения
 * @param  array $args              неочищенные параметры
 * @param  array $sanitize_callback одномерный массив с именами функция, с помощью поторых нужно очистить параметры
 * @param  array $required          обязательные параметры
 * @param  array $not_empty         параметры которые не могут быть пустыми
 * @return array                    возвращает ощиченный массив разрешённых параметров
 * */
function parse_only_allowed_args( $default, $args, $sanitize_callback = [], $required = [], $not_empty = [] ) {
	$args = ( array ) $args;
	$result = [];
	$count = 0;
	while ( ( $value = current( $default ) ) !== false ) {
		$key = key( $default );
		if ( array_key_exists( $key, $args ) ) {
			$result[ $key ] = $args[ $key ];
			if ( isset( $sanitize_callback[ $count ] ) && ! empty( $sanitize_callback[ $count ] ) ) {
				$result[ $key ] = $sanitize_callback[ $count ]( $result[ $key ] );
			}
		} elseif ( in_array( $key, $required ) ) {
			return null;
		} else {
			$result[ $key ] = $value;
		}
		if ( empty( $result[ $key ] ) && in_array( $key, $not_empty ) ) {
			return null;
		}
		$count = $count + 1;
		next( $default );
	}
	return $result;
}


/**
 * Формирует html-код выпадающего списка
 * @param  array  $choices           выринаты выбора ключ=>название
 * @param  array  $selected          выбранные элементы
 * @param  array  $atts              аттрибуты выпадающего списка
 * @param  string $show_option_none  что показывать в пустом элементе
 * @param  string $option_none_value значение пустого элемента
 * @return string                    html-код выпадающего списка
 */
function render_dropdown( $choices = [], $selected = [], $atts = [], $show_option_none = '-', $option_none_value = '' ) {
	$html = '';
	if ( is_array( $choices ) && ! empty( $choices ) ) {
		if ( ! is_array( $selected ) ) {
			$selected = [ $selected ];
		}
		$atts = array_merge( [
			'data-selected' => ( empty( $selected ) ) ? '[]' : wp_json_encode( $selected ),
		], $atts );
		$html .= '<select ' . render_atts( $atts ) . ' >';
		if ( $show_option_none ) {
			$html .= sprintf( '<option value="%1$s">%2$s</option>', esc_attr( $option_none_value ), $show_option_none );
		}
		foreach ( $choices as $value => $label ) {
			$html .= sprintf( '<option value="%1$s" %2$s>%3$s</option>', $value, selected( true, in_array( $value, $selected ), false ), $label );
		}
		$html .= '</select>';
	}
	return $html;
}


/**
 * Формирует html код аттрибутов элемента управления формы
 * @param  array  $atts  ассоциативный массив аттрибут=>значение
 * @return string        html-код
 */
function render_atts( $atts ) {
	$html = '';
	if ( ! empty( $atts ) ) {
		foreach ( $atts as $key => $value ) {
			$html .= ' ' . $key . '="' . $value . '"';
		}
	}
	return $html;
}


/**
 * Создаёт массив для использования в $wp_customizer -> select
 * @return   array      массив категориий term_id=>name
 * */
function get_taxonomy_choices( $taxonomy = 'category' ) {
	$result = [];
	$categories = get_categories( [
		'taxonomy'     => $taxonomy,
		'type'         => 'post',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 0,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => 0,
		'pad_counts'   => false,
	] );
	if ( is_array( $categories ) && ! empty( $categories ) ) {
		foreach ( $categories as $category ) {
			$result[ $category->term_id ] = esc_html( apply_filters( 'single_cat_title', $category->name ) );
		}
	}
	return $result;
}


/**
 *  Определяет есть ли дочернее меню у переданного пункта
 */
function is_nav_has_sub_menu( $item_id, $items ) {
	foreach( $items as $item ) {
		if( $item->menu_item_parent && $item->menu_item_parent == $item_id ) return true;
	}
	return false;
}