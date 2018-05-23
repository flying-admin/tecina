<?php
function prettyTranslate($datas)
{
	$translate = [];
	foreach($datas as $data)
	{
		$translate[$data['code']] = [
			'name'        => $data['pivot']['name'],
			'description' => $data['pivot']['description']
		];
	}
	return $translate;
}
function prettyTranslates($datas)
{
	$translate = [];
	foreach($datas as $data)
	{
		$translate[]=prettyTranslate($data);
	}
	return $translate;
}