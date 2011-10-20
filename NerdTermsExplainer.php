<?php
/**
 * @package Nerd Terms Explainer
 * @version 0.1a
 */
/*
Plugin Name: Nerd Terms Explainer
Description: Replaces every incidence in the text of a nerd term with it's abbr tag explained.
Author: Marc Garcia a.k.a. Markcial
Version: 0.1a
Author URI: http://blog.illcode4food.com
*/

/**
 * Returns the relation nerd term and abbr tag dictionary.
 */
function get_relations_dictionary()
{
	$terms = array(
		'crm' => '<abbr title="Customer Relationship Management">CRM</abbr>',
		'cms' => '<abbr title="Content Management System">CMS</abbr>',
		'sql' => '<abbr title="Structured Query Language">SQL</abbr>',
		'iso' => '<abbr title="International Organization for Standards">ISO</abbr>',
		'php' => '<abbr title="Hypertext Preprocessor">PHP</abbr>',
		'html' => '<abbr title="HyperText Markup Language">HTML</abbr>',
		'xhtml' => '<abbr title="eXtensible HyperText Markup Language">XHTML</abbr>',
		'css' => '<abbr title="Cascading Style Sheets">CSS</abbr>',
		'js' => '<abbr title="JavaScript">JS</abbr>',
		'ecmascript' => '<abbr title="European Computer Manufacturers Association Script">ECMAScript</abbr>',
		'isp' => '<abbr title="Internet Service Provider">ISP</abbr>',
		'ip' => '<abbr title="Internet Protocol">IP</abbr>',
		'http' => '<abbr title="HyperText Transfer Protocol">HTTP</abbr>',
		'rss' => '<abbr title="Really Simple Syndication">RSS</abbr>',
		'irc' => '<abbr title="Internet Relay Chat">IRC</abbr>',
		'ftp' => '<abbr title="File Transfer Protocol">FTP</abbr>',
		'ajax' => '<abbr title="Asynchronous JavaScript and XML">AJAX</abbr>',
		'dns' => '<abbr title="Domain Name System">DNS</abbr>',
		'dom' => '<abbr title="Document Object Model">DOM</abbr>',
		'oop' => '<abbr title="Object Oriented Programming">OOP</abbr>',
		'dry' => '<abbr title="Don\'t Repeat Yourself (programming principal)">DRY</abbr>',
		'ssl' => '<abbr title="Secure Sockets Layer">SSL</abbr>',
		'ror' => '<abbr title="Ruby on Rails">RoR</abbr>',
		'kiss' => '<abbr title="Keep it Simple, Stupid">KISS</abbr>',
		'lamp' => '<abbr title="Linux, Apache, MySQL, PHP (common server configuration)">LAMP</abbr>',
		'xss' => '<abbr title="Cross Site Scripting">XSS</abbr>',
		'seo' => '<abbr title="Search Engine Optimization">SEO</abbr>',
		'jpg' => '<abbr title="Joint Photographic Experts Group (file format)">JPG</abbr>',
		'gif' => '<abbr title="Graphics Interchange Format (file format)">GIF</abbr>',
		'png' => '<abbr title="Portable Networks Graphics (file format)">PNG</abbr>',
		'psd' => '<abbr title="Photoshop Document (file format)">PSD</abbr>',
		'ai' => '<abbr title="Adobe Illustrator (file format)">AI</abbr>',
		'saas' => '<abbr title="Software as a Service">SaaS</abbr>',
		'sass' => '<abbr title="Syntactically Awesome Stylesheets">SASS</abbr>',
		'rgb' => '<abbr title="Red Green Blue">RGB</abbr>',
		'hsl' => '<abbr title="Hue Saturation Lightness">HSL</abbr>',
		'ui' => '<abbr title="User Interface">UI</abbr>',
		'ux' => '<abbr title="User Experience">UX</abbr>',
		'jsp' => '<abbr title="JavaServer Pages">JSP</abbr>',
		'asp' => '<abbr title="Active Server Pages">ASP</abbr>',
		'wysiwyg' => '<abbr title="What You See Is What You Get">WYSIWYG</abbr>'
	);
	return $terms;
}

/**
 * Function that replaces all the occurrences of a nerd term that is not wrapped by whitespaces by its related abbr.
 * @param String $text
 */
function explain_nerd_terms( $text )
{
	$dictionary = get_relations_dictionary();
	$patterns = array_map( create_function( '$a', 'return "`([\s\A>])($a)([<\s\z])`im";' ), array_keys( $dictionary ) );
	$replacements = array_map( create_function( '$a', 'return "$1".$a."$3";' ), array_values( $dictionary ) );
	return preg_replace($patterns, $replacements, $text );
}

add_filter( 'the_content', 'explain_nerd_terms' );