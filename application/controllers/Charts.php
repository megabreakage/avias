<?php
/**
 * @author Martin Njuguna
 * @version 1.0
 * @see http://iosync.co.ke/
 */
class Charts extends CI_controller {

  public function index(){
    $data = array(
      'title' => 'Aviation Support',
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
		$this->load->view('charts', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/edit_flight');

		$this->load->view('templates/footer');
	}

  public function fleet_data(){
    $data = $this->queries->get_aircrafts();
    echo json_encode($data);
  }
}


 ?>
