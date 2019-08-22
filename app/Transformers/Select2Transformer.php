<?php

namespace App\Transformers;

class Select2Transformer {

	public static function transformPaginatedDataToSelect2Data($paginatedData)
	{
		return [
					'items' => $paginatedData['data'],
					'total_count' => $paginatedData['total']
				];
	}

	public static function getEmptyResultData()
	{
		return [
					'items' => [],
					'total_count' => 0
		];
	}
}