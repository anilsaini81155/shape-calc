<?php

function getShapeArray() {
    $a = array(
        '1' => "Rectangle",
        '2' => "Circle",
        '3' => "Square",
        '4' => "Ellipse"
    );

    return $a;
}

function getDetailedParamAboutShape($shapeId) {
    $data = array();

    if ($shapeId == 1) {//rectangle
        $data['param'] = 2;
        $data['name'] = array('length', 'width');
    } elseif ($shapeId == 2) {//circle
        $data['param'] = 1;
        $data['name'] = array('radius');
    } elseif ($shapeId == 3) { //square
        $data['param'] = 1;
        $data['name'] = array('side');
    } else {//Ellipse
        $data['param'] = 2;
        $data['name'] = array('side1', 'side2');
    }

    return $data;
}

function getShapeName($shapeId) {
    if ($shapeId == 1) {
        return "Rectangle";
    } elseif ($shapeId == 2) {
        return "Circle";
    } elseif ($shapeId == 3) {
        return "Square";
    } else {
        return "Ellipse";
    }
}

function getShapeArea($data, $getParamDesc = FALSE) {
    if ($data['shape'] == 1) {
        $area = $data['params'][0] * $data['params'][1];
//         l*w
        if ($getParamDesc) {
            $getParamDesc = "length and width is " . $data['params'][0] . " & " . $data['params'][1];
        }
    } elseif ($data['shape'] == 2) {
//        π × 32 *32
        $area = PIE * $data['params'][0] * $data['params'][0];

        if ($getParamDesc) {
            $getParamDesc = "radius is " . $data['params'][0];
        }
    } elseif ($data['shape'] == 3) {
//        a*a
        $area = $data['params'][0] * $data['params'][0];

        if ($getParamDesc) {
            $getParamDesc = "side is " . $data['params'][0];
        }
    } else {
//        pie*a*b;
        $area = PIE * $data['params'][0] * $data['params'][0];

        if ($getParamDesc) {
            $getParamDesc = "side1 and side2 is " . $data['params'][0] . " & " . $data['params'][1];
        }
    }
    $data = array();

    if ($getParamDesc) {
        $data['getParamDesc'] = $getParamDesc;
    }

    $data['area'] = round($area, 2);
    return $data;
}

