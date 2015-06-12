<?php

class pluginOpenGraph extends Plugin {

	public function init()
	{
		$this->dbFields = array(
			'title'=>'Open Graph',
			'description'=>'The Open Graph protocol enables any web page to become a rich object in a social graph.'
			);
	}

	public function onSiteHead()
	{
		global $Url, $Site;
		global $Post, $Page;

		$og = array(
			'locale'		=>$Site->locale(),
			'type'			=>'website',
			'title'			=>$Site->title(),
			'description'	=>$Site->description(),
			'url'			=>$Site->url(),
			'image'			=>'',
			'site_name'		=>$Site->title()
		);

		switch($Url->whereAmI())
		{
			case 'post':
				$og['type']			= 'article';
				$og['title']		= $Post->title().' | '.$og['title'];
				$og['description']	= $Post->description();
				$og['url']			= $Post->permalink(true);
				break;
			case 'page':
				$og['type']			= 'article';
				$og['title']		= $Page->title().' | '.$og['title'];
				$og['description']	= $Page->description();
				$og['url']			= $Page->permalink(true);
				break;
		}

		$html  = PHP_EOL.'<!-- Open Graph -->'.PHP_EOL;
		$html .= '<meta property="og:locale" content="'.$og['locale'].'">'.PHP_EOL;
		$html .= '<meta property="og:type" content="'.$og['type'].'">'.PHP_EOL;
		$html .= '<meta property="og:title" content="'.$og['title'].'">'.PHP_EOL;
		$html .= '<meta property="og:description" content="'.$og['description'].'">'.PHP_EOL;
		$html .= '<meta property="og:image" content="'.$og['image'].'">'.PHP_EOL;
		$html .= '<meta property="og:url" content="'.$og['url'].'">'.PHP_EOL;
		$html .= '<meta property="og:site_name" content="'.$og['site_name'].'">'.PHP_EOL;

		return $html;
	}
}