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
		$this->load->view('modals/edit_flight');

		$this->load->view('templates/footer');
	}

  public function view_flight($flight_id){
    $flight = $this->queries->get_flight($flight_id);
    $data = array(
      'title' => 'Flight',
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
      'trends' => $this->queries->get_trends(),
      'flight' => $this->queries->get_flight($flight_id),
      'logs' => $this->queries->get_logs($flight_id)
    );

		$this->load->view('templates/header', $data);
		$this->load->view('view_flight', $data);
		// modal view call
		$this->load->view('modals/add_aircraft');
		$this->load->view('modals/add_flight');
		$this->load->view('modals/add_task');
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

  // Update functions
  public function update_logs(){
    // $con_data = '[
    //   {"log_id": "1", "flight_id": "4", "origin": "HKNW",	"destination": "HKJK",	"takeoff": "2019-01-19 04:00:00",	"landing": "2019-01-19 04:56:00",	"hours": "0.933333", "cycles": "1",	"date_posted": "2019-01-19 05:56:21"},
    //   {"log_id": "3",	"flight_id": "4",	"origin": "HKJK",	"destination": "HKNW",	"takeoff": "2019-01-19 04:00:00",	"landing": "2019-01-19 04:56:00",	"hours": "0.933333",	"cycles": "1",	"date_posted": "2019-01-19 05:56:21"},
    //   {"log_id": "0",	"flight_id": "4",	"origin": "HKNW",	"destination": " HKKT",	"takeoff": "2019-01-19T15:15",	"landing": "2019-01-19T15:48",	"cycles": 1,	"hours": 0.5166666666666667}
    // ]';
    // $logs_data = json_decode($con_data);
    // // echo json_encode($logs_data);
    // // exit();
    $logs_data = json_decode($_POST['logs_data']);
    $new_logs = 0;
    if(!empty($logs_data)){
      foreach ($logs_data as $log) {
        $log_id = $log->log_id;
        $log_data = array(
          'flight_id' => $log->flight_id,
          'origin' => $log->origin,
          'destination' => $log->destination,
          'takeoff' => $log->takeoff,
          'landing' => $log->landing,
          'cycles' => $log->cycles,
          'hours' => $log->hours
        );
        $logs_res = $this->queries->update_logs($log_data, $log_id);
        if($logs_res == FALSE){
          echo json_encode(0);
        } else {
          $new_logs = $logs_res;
        }
      }
    } else {
      echo json_encode(0);
    }
    echo json_encode($new_logs);

  }

  // Delete Functions
  public function delete_log(){
    $log_id = $this->input->post('id');
    $log = $this->queries->delete_log($log_id);
    if ($log == FALSE) {
      echo json_encode(0);
    } else {
      echo json_encode($log);
    }
  }

}


 ?>
