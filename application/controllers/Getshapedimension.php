<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//Author Anil P Saini
// Email ID - anilsaini81155@gmail.com
class Getshapedimension extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index($shape = FALSE) {
        if ($shape) {
            $data['shapeId'] = $shape;
        } else {
            $data['shapeId'] = NULL;
        }
        $this->load->library('form_validation');
        $this->load->view('getshapedimension', $data);
    }

    public function askforparms() {
        $this->form_validation->set_rules('shapes', 'Select Any Shape', 'required');
        if ($this->form_validation->run() === TRUE) {
            $data['shapeId'] = $this->input->post('shapes');
            $this->load->view('getshapeparameter', $data);
        } else {
            $this->index();
        }
    }

    public function redirectForParams($shape) {
        redirect('getshapedimension/askforparms/' . $shape);
    }

    public function getareaofshape() {
        $countOfParams = $this->input->post('countOfParams');
        for ($i = 0; $i < $countOfParams; $i++) {
            $this->form_validation->set_rules('param' . $i, 'Value', 'trim|required|numeric');
        }
        if ($this->form_validation->run() === TRUE) {
            $params = array();

            for ($i = 0; $i < $countOfParams; $i++) {
                $variableName = 'param' . $i;
                array_push($params, $this->input->post("$variableName"));
                $this->form_validation->set_rules('param' . $i, 'Enter Value', 'trim|required|numeric');
            }

            $shapeParams = array(
                'shape' => $this->input->post('shapeId'),
                'params' => $params
            );

            $reponseArray = getShapeArea($shapeParams, TRUE);


            $data = array(
                'shapeName' => getShapeName($this->input->post('shapeId')),
                'area' => $reponseArray['area'],
                'paramText' => $reponseArray['getParamDesc']
            );

            $this->load->view('getshapeparameterresults', $data);
        } else {
            $data = array(
                'shapeId' => $this->input->post('shapeId')
            );
            $this->load->view('getshapeparameter', $data);
        }
    }

}
