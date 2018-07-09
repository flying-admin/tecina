<?php
function prettyTranslate($datas)
{
	$translate = [];
	foreach($datas as $data)
	{
		if($data['pivot']['name']&&$data['pivot']['description']){
			$translate[$data['code']] = [
				'name'        => $data['pivot']['name'],
				'description' => $data['pivot']['description']
			];
		}else{
			if($data['pivot']['description']){
				$translate[$data['code']] = $data['pivot']['description'];
			}else{
				$translate[$data['code']] = $data['pivot']['name'];
			}
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

use App\Language;
function getLangs(){
	$langs=[];
	foreach(Language::all() as $lang){
		$langs [$lang->id]=$lang->code;
	}
	return $langs;
}
