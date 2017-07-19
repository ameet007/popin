<?php

class FrontSpace extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function hostProfileInfo($host_id)
    {
        if(!empty($host_id))
        {
            $where = array("status"=>'Active',"id=" =>$host_id);
            $query = $this->db->select('*')->from('user')->where($where)->get();		
            return $query->row();
        }
    }
    
    public function editHost($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('user',$data);
        return $this->db->affected_rows();			
    }
    
    public function getDropdownData($table){
        return $this->db->get_where($table, array('status'=>'active'))->result_array();
    }
    
    public function getDropdownDataRow($table, $id){
        return $this->db->get_where($table, array('id'=>$id,'status'=>'active'))->row_array();
    }
    
    public function collectAmenities($industry, $establishment) {
        $response['Important'] = $this->db->select('id,amenities_name as name')->get_where("amenities", array('industry_id'=>$industry,'establishment_id'=>$establishment,'amenitiesType'=>'1','status'=>'active'))->result_array();
        $response['General'] = $this->db->select('id,amenities_name as name')->get_where("amenities", array('industry_id'=>$industry,'establishment_id'=>$establishment,'amenitiesType'=>'2','status'=>'active'))->result_array();
        return $response;
    }
            
    function getActiveListings($currentUser='', $filters = array()) {
        $response = array();
        if($currentUser != ""){
            $this->db->where("host != ",$currentUser);
        }
        //$this->db->select("id, ABS(latitude - {$filters['latitude']}) as lat,ABS(longitude - {$filters['longitude']}) as lon");
        // Apply filters from hompage header
        if(!empty($filters)){
            # Destination
            if($filters['latitude'] !="" && $filters['longitude'] !=""){
                $this->db->where("ABS(latitude - {$filters['latitude']}) <= 0.5");
                $this->db->where("ABS(longitude - {$filters['longitude']}) <= 0.5");
            }
            # Check In and Check Out
            if($filters['checkIn'] !="" && $filters['checkOut'] !=""){
                $checkIn = $filters['checkIn'];
                $checkOut = $filters['checkOut'];
            }
            # Professional capacity
            if($filters['professionals'] !=""){
                $this->db->where('professionalCapacity >=', $filters['professionals']);
            }   
            # Space type
            if(isset($filters['spaceType']) && !empty($filters['spaceType'])){
                $this->db->where_in('spaceType', $filters['spaceType']);
            }  
            # Price Range
            if(isset($filters['minPrice']) && $filters['minPrice'] !="" && isset($filters['maxPrice']) && $filters['maxPrice'] !=""){
                $this->db->where("base_price BETWEEN {$filters['minPrice']} AND {$filters['maxPrice']}");
            }            
            # Rent instantly
            if(isset($filters['rentInstantly'])){
                $this->db->where('rentalRequests', $filters['rentInstantly']);
            }  
        }
        $spaceData = $this->db->get_where('spaces', array('status' => 'Active'))->result_array();
        //echo $this->db->last_query();
//        echo "<pre>";
//        print_r($spaceData);
//        echo "</pre>";
//        exit;
        $i = 0;
        foreach ($spaceData as $listing) {
            $establishmentType = $this->getDropdownDataRow('establishment_types', $listing['establishmentType']);
            if(!empty($establishmentType)){
                $listing['establishmentType'] = $establishmentType['name'];
            }
            $spaceType = $this->getDropdownDataRow('space_types', $listing['spaceType']);
            if(!empty($spaceType)){
                $listing['spaceType'] = $spaceType['name'];
            }
            
            if(isset($checkIn) && isset($checkOut)){
                $spaceAvailableDates = $this->db->select('spaceDate')->get_where('space_available_slots', array('space' => $listing['id']))->row_array();
                if(!empty($spaceAvailableDates)){
                    $listing['available_dates'] = json_decode($spaceAvailableDates['spaceDate'], TRUE);
                    if(in_array($checkIn, $listing['available_dates'])){
                        $response[$i] = $listing;
                        $spaceGallery = $this->db->select('image')->order_by('position', 'asc')->get_where('space_gallery', array('space' => $listing['id']))->result_array();
                        if (!empty($spaceGallery)) {
                            foreach ($spaceGallery as $image) {
                                $response[$i]['gallery'][] = $image['image'];
                            }
                        }
                        $i++;
                    }
                }
            }else{
                $response[$i] = $listing;
                $spaceGallery = $this->db->select('image')->order_by('position', 'asc')->get_where('space_gallery', array('space' => $listing['id']))->result_array();
                if (!empty($spaceGallery)) {
                    foreach ($spaceGallery as $image) {
                        $response[$i]['gallery'][] = $image['image'];
                    }
                }
                $i++;
            }
        }
        //echo "<pre>";print_r($response);exit;
        return $response;
    }

    function get_user_listings($requestData){
        $arr = array('host' => $requestData['user_id'],'status'=>'Active');
        $this->db->order_by("updatedDate","desc");
        $this->db->limit($requestData['limit'], $requestData['start']);
        return $this->db->get_where("spaces",$arr)->result_array();
    }
    function get_user_listings_inprogress($requestData){
        $arr = array('host' => $requestData['user_id'],'status'=>'Pending');
        $this->db->order_by("updatedDate","desc");
        //$this->db->limit($requestData['limit'], $requestData['start']);
        return $this->db->get_where("spaces",$arr)->result_array();
    }

    public function get_space_data($space_id, $host_id) {
        $response = array();
        $spaceData = $this->db->get_where('spaces', array('id' => $space_id, 'host' => $host_id))->row_array();
        if(!empty($spaceData)){
        $response['id'] = $spaceData['id'];
        $response['step_1_percentage'] = $spaceData['step_1_percentage'];
        $response['step_2_percentage'] = $spaceData['step_2_percentage'];
        $response['step_3_percentage'] = $spaceData['step_3_percentage'];
        $response['status'] = $spaceData['status'];
        $response['start'] = array(
            'establishment' => $spaceData['establishmentType'],
            'space' => $spaceData['spaceType'],
            'full_address' => ''
        );
        $response['step1']['page1'] = array(
            'industryType' => $spaceData['industryType'],
            'establishmentType' => $spaceData['establishmentType'],
            'spaceType' => $spaceData['spaceType'],
            'establishmentLicence' => $spaceData['establishmentLicence'],
            'establishmentLicenceFile' => $spaceData['establishmentLicenceFile'],
            'liabilityInsurance' => $spaceData['liabilityInsurance']
        );
        $response['step1']['page2'] = array(
            'professionalCapacity' => $spaceData['professionalCapacity'],
            'workSpaceCount' => $spaceData['workSpaceCount'],
            'workSpaceDetail' => $spaceData['workSpaceDetail']
        );
        $response['step1']['page3'] = array(
            'bathrooms' => $spaceData['bathrooms'],
            'bathroomADACompliant' => $spaceData['bathroomADACompliant']
        );
        $response['step1']['page4'] = array(
            'country' => $spaceData['country'],
            'streetAddress' => $spaceData['streetAddress'],
            'suiteBuilding' => $spaceData['suiteBuilding'],
            'city' => $spaceData['city'],
            'state' => $spaceData['state'],
            'zipCode' => $spaceData['zipCode'],
            'latitude' => $spaceData['latitude'],
            'longitude' => $spaceData['longitude']
        );
        $all_countries = unserialize(ALL_COUNTRY);
        
        $response['start']['full_address'] = $spaceData['streetAddress'];
        if (!empty($spaceData['suiteBuilding'])){
            $response['start']['full_address'] .= ' ' . $spaceData['suiteBuilding'];
        }
        $response['start']['full_address'] .= ', ' . $spaceData['city'] . ', ';
        $response['start']['full_address'] .= $spaceData['state'] . ', ';
        $response['start']['full_address'] .= $spaceData['zipCode'] . ', ';
        $response['start']['full_address'] .= $all_countries[$spaceData['country']];
        
        if (!empty($spaceData['amenities'])) {
            $response['step1']['page5'] = array(
                'amenities' => json_decode($spaceData['amenities'], true)
            );
        }
        if (!empty($spaceData['facility'])) {
            $response['step1']['page6'] = array(
                'facilities' => explode(' | ', $spaceData['facility'])
            );
        }

        $spaceGallery = $this->db->select('image')->order_by('position', 'asc')->get_where('space_gallery', array('space' => $space_id))->result_array();
        if (!empty($spaceGallery)) {
            $fileuploader = array();
            foreach ($spaceGallery as $image) {
                $response['step2']['gallery'][] = $image['image'];
                
                $imageInfo = getimagesize(FCPATH."uploads/user/gallery/".$image['image']);
                
                $image['name'] = $image['image'];
                $image['type'] = $imageInfo['mime'];
                $image['size'] = $imageInfo['bits'];
                $image['file'] = "../uploads/user/gallery/".$image['image'];
                $image['data']['url'] = base_url("uploads/user/gallery/".$image['image']);
                
                array_push($fileuploader, $image);
            }
            $response['step2']['fileuploader'] = json_encode($fileuploader);
        }

        $response['step2']['page2'] = array(
            'businessClose' => $spaceData['businessClose'],
            'loveWorkSpace' => $spaceData['loveWorkSpace'],
            'productCarried' => $spaceData['productCarried']
        );
        $response['step2']['page3'] = array(
            'spaceDescription' => $spaceData['spaceDescription']
        );
        $response['step2']['page4'] = array(
            'spaceTitle' => $spaceData['spaceTitle'],
            'businessName' => $spaceData['businessName']
        );
        $response['step2']['page6'] = array(
            'mobileNumber' => $spaceData['mobileNumber'],
            'numberVerified' => $spaceData['numberVerified']
        );

        if (!empty($spaceData['professionalRequirements'])) {
            $response['step3']['page1'] = array(
                'requirements' => explode(',', $spaceData['professionalRequirements'])
            );
        }
        $response['step3']['page2'] = array(
            'ageLimit' => $spaceData['ageLimit'],
            'ageRequirements' => $spaceData['ageRequirements'],
            'displayLicence' => $spaceData['displayLicence'],
            'suitablePets' => $spaceData['suitablePets'],
            'eventPartiesAllowed' => $spaceData['eventPartiesAllowed']
        );
        if (!empty($spaceData['additionalRules'])) {
            $response['step3']['page2']['additionalRules'] = explode(' | ', $spaceData['additionalRules']);
        }
        if (!empty($spaceData['cleanUpProcedure'])) {
            $response['step3']['page3'] = array(
                'cleanUpProcedures' => explode(' | ', $spaceData['cleanUpProcedure'])
            );
        }
        $response['step3']['page4'] = array(
            'rentalRequests' => $spaceData['rentalRequests']
        );
        
        $response['step3']['acceptHostingTerms'] =  $spaceData['acceptHostingTerms'];
        
        $response['step3']['page5'] = array(
            'everRented' => $spaceData['everRented'],
            'haveProffesionals' => $spaceData['haveProffesionals']
        );
        $response['step3']['page6'] = array(
            'noticeTime' => $spaceData['noticeTime'],
            'monFrom' => $spaceData['monFrom'],
            'monTo' => $spaceData['monTo'],
            'tueFrom' => $spaceData['tueFrom'],
            'tueTo' => $spaceData['tueTo'],
            'wedFrom' => $spaceData['wedFrom'],
            'wedTo' => $spaceData['wedTo'],
            'thuFrom' => $spaceData['thuFrom'],
            'thuTo' => $spaceData['thuTo'],
            'friFrom' => $spaceData['friFrom'],
            'friTo' => $spaceData['friTo'],
            'satFrom' => $spaceData['satFrom'],
            'satTo' => $spaceData['satTo'],
            'sunFrom' => $spaceData['sunFrom'],
            'sunTo' => $spaceData['sunTo'],
            'advanceBook' => $spaceData['advanceBook'],
            'minStay' => $spaceData['minStay'],
            'maxStay' => $spaceData['maxStay']
        );
        
        $spaceAvailableDates = $this->db->select('spaceDate')->get_where('space_available_slots', array('space' => $space_id))->row_array();
        if(!empty($spaceAvailableDates)){
            $response['step3']['calendar']['available_dates'] = json_decode($spaceAvailableDates['spaceDate'], TRUE);
        }
        $spaceUnavailableDates = $this->db->select('spaceDate')->get_where('space_unavailable_slots', array('space' => $space_id))->row_array();
        if(!empty($spaceUnavailableDates)){
            $response['step3']['calendar']['unavailable_dates'] = json_decode($spaceUnavailableDates['spaceDate'], TRUE);
        }
        
        $response['step3']['page7'] = array(
            'base_price' => $spaceData['base_price'],
            'currency' => $spaceData['currency']
        );
        $response['step3']['page8'] = array(
            'daily_discount' => $spaceData['daily_discount'],
            'weekly_discount' => $spaceData['weekly_discount']
        );
        }
        return $response;
    }
    
    public function setPercentageComplete($space_id, $host_id, $field, $value, $force=false){
        $rowQuery = $this->db->select($field)->where(array('id' => $space_id, 'host' => $host_id))->get('spaces');
        if($rowQuery->num_rows() > 0){
            $rowData = $rowQuery->row_array();
//            if($field == 'step_2_percentage' && $rowData[$field] != 100){
//                $value = $rowData[$field] + $value;
//            }
            if($force == true || $rowData[$field] < $value){                
                $this->db->where(array('id' => $space_id, 'host' => $host_id))->update('spaces', array($field => $value));
            }
        }
    }

    public function getSpaceSettings($space_id, $host_id) {
        return $this->db->select('noticeTime,monFrom,monTo,tueFrom,tueTo, wedFrom,wedTo,thuFrom,thuTo,friFrom,friTo,satFrom,satTo,sunFrom,sunTo,advanceBook,minStay,maxStay')->get_where('spaces', array('id' => $space_id, 'host' => $host_id))->row_array();
    }
    
    public function insertData($rawData) {
        $rawData['createdDate'] = strtotime(date('Y-m-d H:i:s'));
        $rawData['updatedDate'] = strtotime(date('Y-m-d H:i:s'));
        $rawData['ipAddress'] = $this->input->ip_address();

        $this->db->insert('spaces', $rawData);
        return $this->db->insert_id();
    }

    public function updateData($rawData, $space_id, $host_id) {
        $rawData['updatedDate'] = strtotime(date('Y-m-d H:i:s'));
        $rawData['ipAddress'] = $this->input->ip_address();

        $this->db->where(array('id' => $space_id, 'host' => $host_id));
        $this->db->update('spaces', $rawData);
        return $this->db->affected_rows();
    }
    
    public function updateCalendarData($rawData, $space_id) {
        $response = array();
        foreach($rawData as $date => $status){
            if($status["canBook"] == 0){
                $tableName = "space_unavailable_slots";
                $responseIndex = "unavailable_dates";
            }else{
                $tableName = "space_available_slots";
                $responseIndex = "available_dates";
            }
            $response[$responseIndex][] = $date;
        }
        if(isset($response['unavailable_dates'])){
            sort($response['unavailable_dates']);
            $this->updateCalendarRecords("space_unavailable_slots", "unavailable_dates", $space_id, $response);
        }
        if(isset($response['available_dates'])){
            sort($response['available_dates']);
            $this->updateCalendarRecords("space_available_slots", "available_dates", $space_id, $response);
        }
        
        return $response;
    }
    
    private function updateCalendarRecords($tableName, $responseIndex, $space_id, $response) {
        $existingDate = $this->db->get_where($tableName, array('space' => $space_id))->num_rows();
        if($existingDate == 0){
            $queryData['space']         = $space_id;
            $queryData['spaceDate']     = json_encode($response[$responseIndex]);
            $queryData['createdDate']   = strtotime(date('Y-m-d H:i:s'));
            $queryData['updatedDate']   = strtotime(date('Y-m-d H:i:s'));
            $queryData['ipAddress']     = $this->input->ip_address();
            $this->db->insert($tableName, $queryData);
            return $this->db->insert_id();
        }else{
            $queryData['spaceDate']     = json_encode($response[$responseIndex]);
            $queryData['updatedDate']   = strtotime(date('Y-m-d H:i:s'));
            $queryData['ipAddress']     = $this->input->ip_address();
            $this->db->where(array('space' => $space_id));
            $this->db->update($tableName, $queryData);
            return $this->db->affected_rows();
        }
    }
    
    public function get_space_preview_data($space_id, $host_id='') {
        
        $response['gallery'] = $response['cleanUpProcedure'] = $response['additionalRules'] = $response['professionalRequirements'] = $response['facility'] = $response['amenities'] = array();
        if(!empty($host_id)){
            $this->db->where('host', $host_id);
        }
        $response = $this->db->get_where('spaces', array('id' => $space_id))->row_array();
                
        if(!empty($response)){
            $industryType = $this->getDropdownDataRow('industry', $response['industryType']);
            if(!empty($industryType)){
                $response['industryTypeId'] = $industryType['id'];
                $response['industryType'] = $industryType['industry_name'];
            }
            $establishmentType = $this->getDropdownDataRow('establishment_types', $response['establishmentType']);
            if(!empty($establishmentType)){
                $response['establishmentTypeId'] = $establishmentType['id'];
                $response['establishmentType'] = $establishmentType['name'];
            }
            $spaceType = $this->getDropdownDataRow('space_types', $response['spaceType']);
            if(!empty($spaceType)){
                $response['spaceTypeId'] = $spaceType['id'];
                $response['spaceType'] = $spaceType['name'];
            }
            if (!empty($response['amenities'])) {
                $response['amenities'] = json_decode($response['amenities'], true);
            }

            if (!empty($response['facility'])) {
                $response['facility'] = explode(' | ', $response['facility']);
            }

            $spaceGallery = $this->db->select('image')->order_by('position', 'asc')->get_where('space_gallery', array('space' => $space_id))->result_array();
            if(!empty($spaceGallery)){
                foreach ($spaceGallery as $image) {
                    $response['gallery'][] = $image['image'];
                }
            }

            if (!empty($response['professionalRequirements'])) {
                $response['professionalRequirements'] = explode(',', $response['professionalRequirements']);
            }

            if (!empty($response['additionalRules'])) {
                $response['additionalRules'] = explode(' | ', $response['additionalRules']);
            }

            if (!empty($response['cleanUpProcedure'])) {
                $response['cleanUpProcedure'] = explode(' | ', $response['cleanUpProcedure']);
            }
            
            $spaceAvailableDates = $this->db->select('spaceDate')->get_where('space_available_slots', array('space' => $space_id))->row_array();
            if(!empty($spaceAvailableDates)){
                $response['calendar']['available_dates'] = json_decode($spaceAvailableDates['spaceDate'], TRUE);
                array_walk($response['calendar']['available_dates'], array($this, 'change_format'));
            }
            $spaceUnavailableDates = $this->db->select('spaceDate')->get_where('space_unavailable_slots', array('space' => $space_id))->row_array();
            if(!empty($spaceUnavailableDates)){
                $response['calendar']['unavailable_dates'] = json_decode($spaceUnavailableDates['spaceDate'], TRUE);
                array_walk($response['calendar']['unavailable_dates'], array($this, 'change_format'));
            }
            
            
            $all_countries = unserialize(ALL_COUNTRY);

            $response['full_address'] = $response['streetAddress'];
            if (!empty($response['suiteBuilding'])){
                $response['full_address'] .= ' ' . $response['suiteBuilding'];
            }
            $response['full_address'] .= ', ' . $response['city'] . ', ';
            $response['full_address'] .= $response['state'] . ', ';
            $response['full_address'] .= $response['zipCode'] . ', ';
            $response['full_address'] .= $all_countries[$response['country']];
        }
        
        return $response;
    }
    function change_format(&$item, $key)
    {
        $item = date("d-m-Y", strtotime($item));
    }
    
    function remove_gallery_image($space_id, $image){
        $this->db->where(array('space' => $space_id,'image'=>$image));
        $this->db->delete('space_gallery');
        
        $response = array();
        
        $spaceGallery = $this->db->select('image')->order_by('position', 'asc')->get_where('space_gallery', array('space' => $space_id))->result_array();
        if (!empty($spaceGallery)) {
            $fileuploader = array();
            foreach ($spaceGallery as $image) {
                $response['gallery'][] = $image['image'];
                
                $imageInfo = getimagesize(FCPATH."uploads/user/gallery/".$image['image']);
                
                $image['name'] = $image['image'];
                $image['type'] = $imageInfo['mime'];
                $image['size'] = $imageInfo['bits'];
                $image['file'] = "../uploads/user/gallery/".$image['image'];
                $image['data']['url'] = base_url("uploads/user/gallery/".$image['image']);
                
                array_push($fileuploader, $image);
            }
            $response['fileuploader'] = json_encode($fileuploader);
        }
        return $response;
    }
    
    function insertBooking($insertData){
        $this->db->insert('space_booking', $insertData);
        return $this->db->insert_id();
    }
}
