<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Seminars extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	/* Returns the number of seminars done by user*/
	//TODO:Remove this function if not needed
	function getSeminarNumber($facultyId){
		$query = $this->db->where('faculty_id',$facultyId)
							->get('seminars');
		return $query->num_rows();
	}
	/*Returns an array containing details of publicaitons made by the user*/
	function getSeminars($facultyId,$limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$query = $this->db->where('faculty_id',$facultyId)
							->limit($limit,$offset)
							->order_by('start_date','DESC')
							->get('seminars');
		return $query->result_array();
	}
	function getAllStaffSeminars($limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$query = $this->db->select('name,designation,title,organiser,
			place,start_date,end_date,region,type,event_details,status,
			no_of_participant')
						->from('seminars')
						->join('faculty','faculty.faculty_id = seminars.faculty_id')
						->limit($limit,$offset)
						->order_by('start_date','DESC')
						->get();
		return $query->result_array();
	}
	function filteredSeminars($condition,$limit,$pageNo){
		$offset = ($pageNo-1)*$limit;
		$innerQuery = $this->filter($condition);
		$query = $innerQuery->limit($limit,$offset)
							->get();
		return $query->result_array();
	}
	private function filter($condition){
		$designation = array($condition['isProfessor'],$condition['isAssociateProf'],$condition['isAssistantProf']);
		if($designation[0] == '' && $designation[1] == '' && $designation[2] == '')
			$designation = array('Professor','Associate Professor','Assistant Professor');
		$type = array($condition['isSeminar'],$condition['isWorkshop'],$condition['isTraining'],$condition['isFDP'],$condition['isSymposium']);
		if($type[0] == '' && $type[1] == '' && $type[2] =='' && $type[3] == '' && $type[4] == '')
			$type = array('Seminar','Workshop','Training Programme','Faculty Development Programme','Symposium');
		$region = array($condition['isNational'],$condition['isInternational']);
		if($region[0] == '' && $region[1] == '' )
			$region = array('National','International');
		$status = array($condition['isAttended'],$condition['isOrganised']);
		if($status[0] == '' && $status[1] == '' )
			$status = array('Attended','Organised');
		$startDate = $condition['startDate'];
		$endDate = $condition['endDate'];
		$startDateCondition = array('start_date >=' => $startDate);
		$endDateCondition = '(end_date <= "'.$endDate.'" OR end_date IS NULL)';
		$noOfParticipants = is_null($condition['noOfParticipants']) ? 
							'no_of_participant IS NULL OR (no_of_participant >=0)' : 'no_of_participant >='.$condition['noOfParticipants'];
		$query = $this->db->select('name,designation,title,organiser,
			place,start_date,end_date,region,type,event_details,status,
			no_of_participant')
							->from('seminars')
							->join('faculty','faculty.faculty_id = seminars.faculty_id')
							->like('name',$condition['name'])
							->where_in('designation',$designation)
							->like('title',$condition['title'])
							->where($startDateCondition)
							->where($endDateCondition,NULL,FALSE)
							->like('organiser',$condition['organiser'])
							->like('place',$condition['place'])
							->where_in('type',$type)
							->where_in('region',$region)
							->where_in('status',$status)
							->where($noOfParticipants)
							->order_by('start_date', 'DESC');
		return $query;
	}
	function filteredSeminarsCount($condition){
		$innerQuery = $this->filter($condition);
		$query = $innerQuery->get();
		return $query->num_rows();
	}
}