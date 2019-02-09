<?php
/**
 * @author Martin Njuguna
 * @version 1.0
 * @see http://iosync.co.ke/
 */
class Flights extends CI_controller {

  public function index(){
    $data = array(
      'title' => 'Flights',
  		'aircrafts' => $this->queries->get_aircrafts(),
      'flights' => $this->queries->get_flights(),
  		'engineTypes' => $this->queries->get_engine_types(),
  		'aircraft_models' => $this->queries->get_aircraft_models(),
  		'manufacturers' => $this->queries->get_manufacturers(),
  		'locations' => $this->queries->get_locations(),
      'schedule_types' => $this->queries->get_schedule_types(),
      'inspection_types' => $this->queries->get_inspection_types(),
      'task_categories' => $this->queries->get_task_categories(),
      'schedule_categories' => $this->queries->get_schedule_categories(),
      'ata_chapters' => $this->queries->get_ata_chapters(),
      'comp_cats' => $this->queries->get_comp_cats(),
      'trends' => $this->queries->get_trends()
    );

		$this->load->view('templates/header', $data);
		$this->load->view('flights', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/view_flight');
		$this->load->view('modals/edit_flight');

		$this->load->view('templates/footer');
	}

  public function defects(){
    $data = array(
      'title' => 'Defects',
  		'aircrafts' => $this->queries->get_aircrafts(),
      'flights' => $this->queries->get_flights(),
  		'engineTypes' => $this->queries->get_engine_types(),
  		'aircraft_models' => $this->queries->get_aircraft_models(),
  		'manufacturers' => $this->queries->get_manufacturers(),
  		'locations' => $this->queries->get_locations(),
      'schedule_types' => $this->queries->get_schedule_types(),
      'inspection_types' => $this->queries->get_inspection_types(),
      'task_categories' => $this->queries->get_task_categories(),
      'schedule_categories' => $this->queries->get_schedule_categories(),
      'ata_chapters' => $this->queries->get_ata_chapters(),
      'comp_cats' => $this->queries->get_comp_cats(),
      'defects' => $this->queries->get_defects(),
      'trends' => $this->queries->get_trends()
    );

		$this->load->view('templates/header', $data);
		$this->load->view('defects', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/view_flight');
		$this->load->view('modals/edit_flight');

		$this->load->view('templates/footer');
	}

  public function flight_by_aircraft(){

    $aircraft_id =  $this->input->post('aircraft_reg');
    if($aircraft_id == 'all'){
      $data = $this->queries->get_flights();
    }else {
      $data = $this->queries->get_flight_by_aircraft($aircraft_id);
    }

    echo json_encode($data);
  }

  public function get_defects_by_aircraft(){
		$aircraft_id = json_decode($_POST['aircraft_id']);
		echo json_encode($this->queries->get_defects_by_aircraft($aircraft_id));
	}

	public function get_defects_by_ata(){
		$ata_id = $_POST['ata_id'];
		echo json_encode($this->queries->get_defects_by_ata($ata_id));
	}

	public function get_defects_by_status(){
		$dfr_status = $_POST['dfr_status'];
		echo json_encode($this->queries->get_defects_by_status($dfr_status));
	}

	public function get_defects_by_date(){
		$dates = array(
			'from' => $_POST['from'],
			'to' => $_POST['to']
		);
		echo json_encode($this->queries->get_defects_by_date($dates));
	}

	public function get_defects_by_defer_category(){
		$dfr_category = $_POST['dfr_category'];
		echo json_encode($this->queries->get_defects_by_defer_category($dfr_category));
	}

}


 ?>
