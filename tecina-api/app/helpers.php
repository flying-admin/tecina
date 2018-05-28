<?php
function prettyTranslate($datas)
{
	$translate = [];
	foreach($datas as $data)
	{
		if($data['pivot']['description']){
			$translate[$data['code']] = [
				'name'        => $data['pivot']['name'],
				'description' => $data['pivot']['description']
			];
		}else{
			$translate[$data['code']] = $data['pivot']['name'];
		}
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