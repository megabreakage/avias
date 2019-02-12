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
      'scheduled_tasks' => $this->queries->get_scheduled_tasks(),
      'trends' => $this->queries->get_trends()
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
      'comp_cats' => $this->queries->get_comp_cats(),
      'trends' => $this->queries->get_trends()
    );

		$this->load->view('templates/header', $data);
		$this->load->view('apu_tasks', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');

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
      'comp_cats' => $this->queries->get_comp_cats(),
      'component_tasks' => $this->queries->get_component_tasks(),
      'trends' => $this->queries->get_trends()
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
      'comp_cats' => $this->queries->get_comp_cats(),
      'inspection_tasks' => $this->queries->get_inspection_tasks(),
      'trends' => $this->queries->get_trends()
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
      'comp_cats' => $this->queries->get_comp_cats(),
      'oop_tasks' => $this->queries->get_oop_tasks(),
      'trends' => $this->queries->get_trends()
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
      'comp_cats' => $this->queries->get_comp_cats(),
      'expired_tasks' => $this->queries->get_expired_tasks(),
      'trends' => $this->queries->get_trends()
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
      'aircraft_id' => $this->input->post('aircraft_id'),
      'task_card' => strtoupper($this->input->post('task_card')),
      'task' => strtoupper($this->input->post('task')),
      'comp_cat_id' => $this->input->post('comp_cat_id'),
      'zone' => strtoupper($this->input->post('zone')),
      'location' => strtoupper($this->input->post('location')),
      'schedule_type_id' => $this->input->post('schedule_type_id'),
      'schedule_cat_id' => $this->input->post('schedule_cat_id'),
      'task_category_id' => $this->input->post('task_category_id'),
      'inspection_id' => $this->input->post('inspection_id'),
      'ata_chapter_id' => $this->input->post('ata_chapter_id'),
      'part_name' => strtoupper($this->input->post('part_name')),
      'serial_number' => strtoupper($this->input->post('serial_number')),
      'reference' => strtoupper($this->input->post('reference')),
      'life_limit_cycles' => $this->input->post('life_limit_cycles'),
      'life_limit_hours' => $this->input->post('life_limit_hours'),
      'life_limit_calendar' => $this->input->post('life_limit_calendar'),
      'life_limit_period' => $this->input->post('life_limit_period'),
      'alarm_cycles' => $this->input->post('alarm_cycles'),
      'alarm_hours' => $this->input->post('alarm_hours'),
      'alarm_calendar' => $this->input->post('alarm_calendar'),
      'alarm_period' => $this->input->post('alarm_period'),
      'last_done_cycles' => $this->input->post('last_done_cycles'),
      'last_done_hours' => $this->input->post('last_done_hours'),
      'date_checked' => $this->input->post('last_done_date'),
      'cum_cycles' => $this->input->post('cum_cycles'),
      'cum_hours' => $this->input->post('cum_hours'),
      'next_due_cycles' => $this->input->post('next_due_cycles'),
      'next_due_hours' => $this->input->post('next_due_hours'),
      'next_due_date' => date('Y-m-d',strtotime($this->input->post('next_due_date'))),
      'posted_by' => 1
    );
    $schedule_id = $this->queries->add_schedule_task($schedule_data);

    if ($schedule_id == 0) {
     echo json_encode(0);
    } else {
     // check if schedule details array is empty
     if (!empty($frequencies)) {
       foreach ($frequencies as $freq) {
         $schedule_details_data = array(
          'schedule_id' => $schedule_id,
          'maint_type_id' => $freq->maint_type_id,
          'cycles' => $freq->cycles,
          'hours' => $freq->hours,
          'calendar' => $freq->calendar,
          'period' => $freq->period
         );
         if ($this->queries->add_schedule_details($schedule_details_data) == 0) {
           echo json_encode(0);
         }
       }
     }

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
    return redirect('maintenance', 'refresh');
    // echo json_encode(1);
  }

  public function cs_search_by_aircraft(){
    $aircraft_id = $_POST['cs_id'];
    echo json_encode($this->queries->cs_search_by_aircraft($aircraft_id));
  }

  public function cs_search_by_ata(){
    $ata_id = $_POST['cs_ata_id'];
    echo json_encode($this->queries->cs_search_by_ata($ata_id));
  }

  public function cs_search_by_comp_cat(){
    $comp_cat_id = $_POST['comp_cat_id'];
    echo json_encode($this->queries->cs_search_by_comp_cat($comp_cat_id));
  }

  public function cs_search_by_inspection_type(){
    $insp_id = $_POST['insp_id'];
    echo json_encode($this->queries->cs_search_by_inspection_type($insp_id));
  }

  public function cs_search_by_schedule_cat(){
    $schedule_cat_id = $_POST['schedule_cat_id'];
    echo json_encode($this->queries->cs_search_by_schedule_cat($schedule_cat_id));
  }

  public function cs_search_by_schedule_type(){
    $schedule_type_id = $_POST['schedule_type_id'];
    echo json_encode($this->queries->cs_search_by_schedule_type($schedule_type_id));
  }

  public function cs_search_by_task_cat(){
    $task_cat_id = $_POST['task_cat_id'];
    echo json_encode($this->queries->cs_search_by_task_cat($task_cat_id));
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
