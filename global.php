<?php
$img_path = "upload/";
function addCategoryCondition($selectedCategories)
{
    if (!empty($selectedCategories)) {
        return "id_dm IN (" . implode(',', $selectedCategories) . ")";
    }
    return "";
}

// Trong hàm addPriceCondition
function addPriceCondition($selectedPriceRanges)
{
    if (!empty($selectedPriceRanges)) {
        $priceConditions = [];
        foreach ($selectedPriceRanges as $range) {
            list($minPrice, $maxPrice) = explode('-', $range);
            $priceConditions[] = "(gia_khuyenmai >= $minPrice AND gia_khuyenmai <= $maxPrice)";
        }
        return "(" . implode(' OR ', $priceConditions) . ")";
    }
    return "";
}
