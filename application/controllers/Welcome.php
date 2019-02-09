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
      'comp_cats' => $this->queries->get_comp_cats(),
			'trends' => $this->queries->get_trends()
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
      'comp_cats' => $this->queries->get_comp_cats(),
			'trends' => $this->queries->get_trends()
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
      'comp_cats' => $this->queries->get_comp_cats(),
			'trends' => $this->queries->get_trends()
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
			'aircraft_reg' => strtoupper($_POST['registration']),
			'series' => strtoupper($_POST['series']),
			'serial_number'=> strtoupper($_POST['serialNumber']),
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
			if (!empty($eng)) {
				foreach ($eng as $item) {
					$engine_data = array(
						'aircraft_id' => $aircraft_id,
						'serial_number' => $item->serial_number,
						'model' => strtoupper($item->model),
						'number' => $item->number,
						'engine_hours' => $item->engine_hours,
						'engine_cycles' => $item->engine_cycles
					);
					$engine_id = $this->queries->add_engine($engine_data);
					if($engine_id == 0){
						json_encode(0); //engine database entry error code
					}
				}
			}
			// propeller data
			if(!empty($prop)){
				foreach ($prop as $item) {
					$prop_data = array(
						'aircraft_id' => $aircraft_id,
						'serial_number' => $item->serial_number,
						'model' => strtoupper($item->model),
						'number' => $item->number,
						'propeller_hours' => $item->prop_hours,
						'propeller_cycles' => $item->prop_cycles
					);
					$prop_id = $this->queries->add_propeller($prop_data);
					if( $prop_id == 0){
						echo json_encode(0); //database entry error code
					}
				}
			}
		}
		echo json_encode(1);
	}

	public function add_flight(){
		$flight_logs = json_decode($this->input->post('logs'));
		$pireps = json_decode($this->input->post('pireps'));
		$trend_monitors = json_decode($this->input->post('trend_monitor'));

		$flight_data = array(
			'aircraft_id' => $_POST['aircraftReg'],
			'techlog' => $_POST['techLogNumber'],
			'techlog_type' => $_POST['type'],
			'hours' => $_POST['totalHours'],
			'cycles' => $_POST['totalCycles'],
			'flight_date' => $_POST['entryDate'],
			'posted_by' => 1
		);

		$flight_id = $this->queries->add_flight($flight_data);

		if($flight_id == 0){
			echo json_encode(0);
		}else{
			if (!empty($flight_logs)) {
				foreach ($flight_logs as $flight) {
					$logs = array(
						'flight_id' =>$flight_id,
						'origin' => strtoupper($flight->from),
						'destination' => strtoupper($flight->to),
						'takeoff' => $flight->takeoff,
						'landing' => $flight->landing,
						'hours' => $flight->hours,
						'cycles' => $flight->cycles
					);
					$log_add = $this->queries->add_logs($logs);
					if($log_add == 0){
						echo json_encode(0);
					}
				}
			}

			// Pireps data
			if (!empty($pireps)) {
				foreach ($pireps as $pirep) {
					$defect = array(
						'flight_id' => $flight_id,
						'defect' => strtoupper($pirep->defect),
						'ata_chapter_id' => $pirep->ata_chapter_id,
						'deferred' => $pirep->dfr_status,
						'limitations' => strtoupper($pirep->limitations),
						'mel_reference' => strtoupper($pirep->mel_reference),
						'dfr_reason' => strtoupper($pirep->dfr_reason),
						'dfr_category' => $pirep->dfr_category,
						'dfr_date' => $pirep->dfr_date,
						'exp_date' => $pirep->exp_date,
						'rectification' => strtoupper($pirep->rectification),
						'techlog_number' => $pirep->techlog_number,
						'cleared_date' => $pirep->cleared_date,
						'wo_number' => strtoupper($pirep->wo_number),
						'remarks' => strtoupper($pirep->remarks)
					);
					$defect_add = $this->queries->add_pireps($defect);
					if ($defect_add == 0) {
						echo json_encode(0);
					}
				}
			}

			// Engine trend monitoring data
			if(!empty($trend_monitors)){
				foreach ($trend_monitors as $trend) {
					$trend_data = array(
						'flight_id' => $flight_id,
						'trend_id' => $trend->trend_id,
						'engine_1' => $trend->engine_1,
						'engine_2' => $trend->engine_2
					);
					$trend_add = $this->queries->add_trend_monitor($trend_data);
					if ($trend_add == 0) {
						echo json_encode(0);
					}
				}
			}
		}
		echo json_encode(1);
	}


	// End calls to Model functions





}
