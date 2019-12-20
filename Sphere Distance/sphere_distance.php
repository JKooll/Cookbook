<?php 
/**
 * 计算地球上两个点的距离
 */
function sphere_distance($lat1, $lon1, $lat2, $lon2, $radius = 6378.135)
{
    $rad = doubleval(M_PI / 180.0);

    $lat1 = doubleval($lat1) * $rad;
    $lon1 = doubleval($lon1) * $rad;
    $lat2 = doubleval($lat2) * $rad;
    $lon2 = doubleval($lon2) * $rad;

    $theta = $lon2 - $lon1;
    $dist = acos(sin($lat1) * sin($lat2) +
                 cos($lat1) * cos($lat2) *
                 cos($theta));
    if ($dist < 0) {
        $dist += M_PI;
    }

    return $dist * $radius;
}