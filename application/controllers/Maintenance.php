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
      'comp_cats' => $this->queries->get_comp_cats(),
      'scheduled_tasks' => $this->queries->get_scheduled_tasks()
    );

		$this->load->view('templates/header', $data);
		$this->load->view('scheduled_tasks', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');

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

		$this->load->view('templates/footer');
  }

  // Function calls to Model functions
  public function add_task(){
    $frequencies = json_decode($this->input->post('frequencies'));
    // $workpacks = json_decode($this->input->post('workpacks'));

    // $data = array( array('Type ID', 'Cycles', 'Hours', 'Calendar') );
    // foreach ($frequencies as $freq) {
    //   $item = array(
    //     array($freq->maint_type_id, $freq->cycles, $freq->hours, $freq->calendar.$freq->period)
    //   );
    //   $data[] = $item;
    // }
    // echo $this->table->generate($data);
    // exit();

    $schedule_data = array(
      'aircraft_id' => $_POST['aircraft_id'],
      'task_card' => strtoupper($_POST['task_card']),
      'task' => strtoupper($_POST['task']),
      'comp_cat_id' => $_POST['comp_cat_id'],
      'zone' => strtoupper($_POST['zone']),
      'location' => strtoupper($_POST['location']),
      'schedule_type_id' => $_POST['schedule_type_id'],
      'schedule_cat_id' => $_POST['schedule_cat_id'],
      'task_category_id' => $_POST['task_category_id'],
      'inspection_id' => $_POST['inspection_id'],
      'ata_chapter_id' => $_POST['ata_chapter_id'],
      'part_name' => strtoupper($_POST['part_name']),
      'serial_number' => strtoupper($_POST['serial_number']),
      'reference' => strtoupper($_POST['reference']),
      'life_limit_cycles' => $_POST['life_limit_cycles'],
      'life_limit_hours' => $_POST['life_limit_hours'],
      'life_limit_calendar' => $_POST['life_limit_calendar'],
      'life_limit_period' => $_POST['life_limit_period'],
      'alarm_cycles' => $_POST['alarm_cycles'],
      'alarm_hours' => $_POST['alarm_hours'],
      'alarm_calendar' => $_POST['alarm_calendar'],
      'alarm_period' => $_POST['alarm_period'],
      'last_done_cycles' => $_POST['last_done_cycles'],
      'last_done_hours' => $_POST['last_done_hours'],
      'date_checked' => $_POST['last_done_date'],
      'cum_cycles' => $_POST['cum_cycles'],
      'cum_hours' => $_POST['cum_hours'],
      'next_due_cycles' => $_POST['next_due_cycles'],
      'next_due_hours' => $_POST['next_due_hours'],
      'next_due_date' => $_POST['next_due_date'],
      'posted_by' => 1
    );
    $schedule_id = $this->queries->add_schedule_task($schedule_data);

    if ($schedule_id == 0) {
     echo json_encode(0);
    } else {
      $this->session->set_flashdata('success', 'Task added successfully!');
      return redirect('maintenance', 'refresh');
      // exit();
     // check if schedule details array is empty
     // if (empty($frequencies)) {
     //   echo json_encode('frequencies is empty!');
     // } else {
     //   foreach ($frequencies as $freq) {
     //     $schedule_details_data = array(
     //      'schedule_id' => $schedule_id,
     //      'maint_type_id' => $freq->maint_type_id,
     //      'cycles' => $freq->cycles,
     //      'hours' => $freq->hours,
     //      'calendar' => $freq->calenar,
     //      'period' => $freq->period
     //     );
     //     if ($this->queries->add_schedule_details($schedule_details_data) == 0) {
     //       echo json_encode(0);
     //     }
     //   }
     // }
     //
     // // check if schedule workpacks array is empty
     // if (empty($workpacks)) {
     //   echo json_encode('Workpack is empty!');
     // } else {
     //   $schedule_workpack_data = array(
     //     'schedule_id' =>  $schedule_id
     //   );
     //   if ($this->queries->add_schedule_workpack($schedule_workpack_data) == 0) {
     //     echo json_encode(0);
     //   }
     // }
    }
    echo json_encode(1);
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
