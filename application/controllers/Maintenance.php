<?php
/**
 * @author Martin Njuguna
 * @version 1.0
 * @see http://iosync.co.ke/
 */
class Maintenance extends CI_Controller {

  // Function calls to Views
  public function index(){
		$data = array(
      'title' => 'Scheduled Tasks',
      'flights' => $this->queries->get_flights(),
  		'aircrafts' => $this->queries->get_aircrafts(),
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
		$this->load->view('scheduled_tasks', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/view_task');
		$this->load->view('modals/edit_task');

		$this->load->view('templates/footer');
	}

  public function apu_tasks(){
    $data = array(
      'title' => 'APU Tasks',
      'flights' => $this->queries->get_flights(),
  		'aircrafts' => $this->queries->get_aircrafts(),
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
		$this->load->view('apu_tasks', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/view_task');
		$this->load->view('modals/edit_task');

		$this->load->view('templates/footer');
  }

  public function components(){
    $data = array(
      'title' => 'Components Tasks',
      'flights' => $this->queries->get_flights(),
  		'aircrafts' => $this->queries->get_aircrafts(),
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
		$this->load->view('components', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/view_task');
		$this->load->view('modals/edit_task');

		$this->load->view('templates/footer');
  }

  public function inspections(){
    $data = array(
      'title' => 'Inspections Tasks',
      'flights' => $this->queries->get_flights(),
  		'aircrafts' => $this->queries->get_aircrafts(),
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
		$this->load->view('inspections', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/view_task');
		$this->load->view('modals/edit_task');

		$this->load->view('templates/footer');
  }

  public function oop_tasks(){
    $data = array(
      'title' => 'OOP Tasks',
      'flights' => $this->queries->get_flights(),
  		'aircrafts' => $this->queries->get_aircrafts(),
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
		$this->load->view('oop_tasks', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/view_task');
		$this->load->view('modals/edit_task');

		$this->load->view('templates/footer');
  }

  public function expired_tasks(){
    $data = array(
      'title' => 'Expired Tasks',
      'flights' => $this->queries->get_flights(),
  		'aircrafts' => $this->queries->get_aircrafts(),
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
		$this->load->view('expired_tasks', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
		$this->load->view('modals/view_task');
		$this->load->view('modals/edit_task');

		$this->load->view('templates/footer');
  }

  // Function calls to Model functions
  public function add_task(){
    $data = $this->input->post('frequencies');

    echo '<pre>';
    echo json_encode($data);
    echo '</pre>';
  }

  public function update_task(){
    $data = $this->input->post();

    $task_update = $this->queries->update_task($data);

  }

  public function delete_task(){
    $data = $this->input->post();

    $task_delete = $this->queries->update_task($data);
  }

  public function delete_multiple_tasks($task_ids){

  }


}


 ?>
