<?php
/**
 * @author Martin Njuguna
 * @version 1.0
 * @see http://iosync.co.ke/
 */
class Charts extends CI_controller {

  public function index(){
		$data['title'] = 'Charts';
		$data['aircrafts'] = $this->queries->get_aircrafts();
		$data['engineTypes'] = $this->queries->get_engine_types();
		$data['aircraft_models'] = $this->queries->get_aircraft_models();
		$data['manufacturers'] = $this->queries->get_manufacturers();
		$data['locations'] = $this->queries->get_locations();
    $data['flights'] = $this->queries->get_flights();

		$this->load->view('templates/header', $data);
		$this->load->view('charts', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/view_flight');
		$this->load->view('modals/edit_flight');

		$this->load->view('templates/footer');
	}

  public function fleet_data(){
    $data = $this->queries->get_aircrafts();
    echo json_encode($data);
  }
}


 ?>
