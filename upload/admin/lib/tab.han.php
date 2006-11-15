<?php

if ( false == defined ( 'MYPANEL' ) ) die ( '<strong>ERROR:</strong> Hack attempt detected!' );

class HtmlTabHandler
{
	var $buffer;

	function HtmlTabHandler()
	{
		$this->buffer = '';
	}

	function addTabs ( $values, $active )
	{
		if ( false == is_array ( $values ) ) $this->buffer .= '';

		$this->buffer .= "<br />";
		$this->buffer .= "<ul id='tabNav'>\n";

		foreach ( $values as $key => $val )
		{
			if ( $active == end ( explode ( '=', $val ) ) )
			{
				$this->buffer .= "\t<li><span>{$key}</span></li>\n";
			}
			else
			{
				$this->buffer .= "\t<li><a href='{$val}'>{$key}</a></li>\n";
			}
		}

		$this->buffer .= "</ul>\n";

		return false;
	}

	function flushBuffer()
	{
		$out = $this->buffer;
		$this->buffer = '';

		return $out;
	}
}

?>