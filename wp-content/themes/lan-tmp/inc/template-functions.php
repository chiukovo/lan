<?php

function dd($target)
{
	var_dump($target);
	die();
}

function getPostsDtails($id)
{
	$uploadDir = wp_upload_dir();
	$result = get_post_meta($id);

	if ( empty($result) ) {
		return [];
	}

	//unserialize
	$result['address'] = unserialize($result['address'][0]);
	$result['addr1'] = $result['address']['street_address'];
	$result['addr2'] = $result['address']['street_address2'];
	$result['addr3'] = $result['address']['city_name'];
	$result['live_time'] = unserialize($result['live_time'][0]);
	$result['live_time'] = unserialize($result['live_time']);

	//get imgs url
	$imgArray = [
		'main_img',
		'banner_img',
		'sp_img',
		'img1',
		'img2',
		'img3',
	];

	foreach ($imgArray as $imgKey) {
		if ( isset($result[$imgKey])) {
			foreach ($result[$imgKey] as $info) {
				$fileName = get_post_meta($info, '_wp_attached_file');
				if ( ! empty($fileName)) {
					foreach ($fileName as $dt) {
						$result[$imgKey . '_url'][] = $uploadDir['baseurl'] . '/' . $dt;
					}
				}
			}
		}
	}

	return $result;
}
