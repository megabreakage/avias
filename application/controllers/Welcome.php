<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Martin Njuguna
 * @version 1.0
 * @see http://iosync.co.ke/
 */
class Welcome extends CI_Controller {

	 // Function calls to Views
	public function index()	{
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
      'comp_cats' => $this->queries->get_comp_cats()
    );

		$this->load->view('templates/header', $data);
		$this->load->view('dashboard', $data);
		// modal view calls
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');

		$this->load->view('templates/footer');
	}

	public function fleet(){
		$data = array(
      'title' => 'Fleet',
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
      'comp_cats' => $this->queries->get_comp_cats()
    );

		$this->load->view('templates/header', $data);
		$this->load->view('fleet', $data);
		// modal view calls
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/view_aircraft');
		$this->load->view('modals/edit_aircraft');

		$this->load->view('templates/footer');
	}

	public function aircraft_models(){
		$data = array(
      'title' => 'Aircraft models',
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
      'comp_cats' => $this->queries->get_comp_cats()
    );

		$this->load->view('templates/header', $data);
		$this->load->view('aircraft_models', $data);
		// modal view calls
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/edit_model');

		$this->load->view('templates/footer');
	}



	// End calls to views

	// Main Functions calls to Model functions
	public function add_aircraft(){
		$eng = json_decode($this->input->post('engine_data'));
		$prop = json_decode($this->input->post('prop_data'));

		// aircrafts data
		$aircraft_data = array(
			'aircraft_reg' => $_POST['registration'],
			'series' => $_POST['series'],
			'serial_number'=> $_POST['serialNumber'],
			'model_id' => $_POST['model'],
			'engines' => $_POST['engines'],
			'manufacturer_id' => $_POST['manufacturer'],
			'manufacturer_date' => $_POST['manufactureDate'],
			'engine_type_id' => $_POST['engineType'],
			'cum_hours' =>$_POST['tat'],
			'cum_cycles' => $_POST['tac'],
			'nextCofA' => '2019-01-01'
		);
		$aircraft_id = $this->queries->add_aircraft($aircraft_data);

		if($aircraft_id == 0){
			echo json_encode(0); //aircraft database entry error code
		}else {
			// engine data
			foreach ($eng as $item) {
				$engine_data = array(
					'aircraft_id' => $aircraft_id,
					'serial_number' => $item->serial_number,
					'model' => $item->model,
					'number' => $item->number,
					'engine_hours' => $item->engine_hours,
					'engine_cycles' => $item->engine_cycles
				);
				$engine_id = $this->queries->add_engine($engine_data);
				if($engine_id == 0){
					json_encode(0x001); //engine database entry error code
				}
			}
			// propeller data
			foreach ($prop as $item) {
				$prop_data = array(
					'aircraft_id' => $aircraft_id,
					'serial_number' => $item->serial_number,
					'model' => $item->model,
					'number' => $item->number,
					'propeller_hours' => $item->prop_hours,
					'propeller_cycles' => $item->prop_cycles
				);
				$prop_id = $this->queries->add_propeller($prop_data);
				if( $prop_id == 0){
					echo json_encode(0x002); //database entry error code
				}
			}
		}
		echo json_encode(1);
	}

	public function add_flight(){
		$flight = json_decode($this->input->post('logs'));

		$flight_data = array(
			'aircraft_id' => $_POST['aircraftReg'],
			'techlog' => $_POST['techLogNumber'],
			'hours' => $_POST['totalHours'],
			'cycles' => $_POST['totalCycles'],
			'date_posted' => $_POST['entryDate'],
			'posted_by' => 1
		);

		$flight_id = $this->queries->add_flight($flight_data);

		if($flight_id == 0){
			echo json_encode(0);
		}else{
			foreach ($flight as $item) {
				$logs = array(
					'flight_id' =>$flight_id,
					'origin' => $item->to,
					'destination' => $item->from,
					'takeoff' => $item->takeoff,
					'landing' => $item->landing,
					'hours' => $item->hours,
					'cycles' => $item->cycles
				);
				$flight_add = $this->queries->add_logs($logs);
				if($flight_add == 0){
					echo json_encode($flight_add);
				}
			}
		}
		echo json_encode(1);
	}

	// End calls to Model functions





}
