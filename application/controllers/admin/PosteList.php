<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PosteList extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(ADMIN_DIR . '/adminLogin', 'login');
        $this->login->check_isvalidated();
        $this->adminProfileInfo = $this->login->adminProfileInfo();
        //$this->load->model(ADMIN_DIR . '/AdminSettings', 'settings');
        $this->load->model(ADMIN_DIR . '/PostedListing', 'spaceType');
        $this->load->library('form_validation');
    }
     public function index() {
        $data = array();
        $data['module_heading']   = 'Posted listings';
        $data['adminProfileInfo'] = $this->adminProfileInfo;
        $this->load->view(ADMIN_DIR . '/' . INC . '/header', $data);
        $this->load->view(ADMIN_DIR . '/' . INC . '/left-sidebar', $data);
        $this->load->view(ADMIN_DIR . '/postedListing/listing', $data);
        $this->load->view(ADMIN_DIR . '/' . INC . '/footer', $data);
    }
     public function get_all_Space_list() {
        if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {

            $response = $this->spaceType->updateStatus($_POST['id'], $_REQUEST['customActionName']);
            $status = $response['status'];
            $message = $response['message'];
        }
        $list = $this->spaceType->get_datatables();

        $data = array();
        $no = $_POST['start'];
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $fc) {
            $no++;
            $possible_status_changes = '';
            $row = array();
            $row[] = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="' . $fc->id . '"/><span></span></label>';
            $row[] = ucfirst($fc->spaceTitle);
            $establishment = getSingleRecord('establishment_types','id',$fc->establishmentType);
            $row[] = $establishment->name;
            $space = getSingleRecord('space_types','id',$fc->spaceType);
            $row[] = $space->name;
            $row[] = $fc->workSpaceCount;
            $row[] = $fc->currency;
            $row[] = $fc->base_price;
            $row[] = date(DATE_FORMAT, $fc->createdDate);
            if ($fc->status == 'Active') {
                $row[] = '<button class="btn btn-success">Active</button>';
            } else if ($fc->status == 'Deactive') {
                $row[] = '<button class="btn btn-warning">Deactive</button>';
            } else {
                $row[] = '<button class="btn btn-danger">' . $fc->status . '</button>';
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->spaceType->count_all(),
            "recordsFiltered" => $this->spaceType->count_filtered(),
            "data" => $data,
        );
        if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {

            $output["customActionStatus"] = $status; // OK for success and NOt OK for fail. pass custom message(useful for getting status of group actions)
            $output["customActionMessage"] = $message; // pass custom message(useful for getting status of group actions)
        }
        //output to json format
        echo json_encode($output);
    }
}
