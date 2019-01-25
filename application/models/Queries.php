<?php
/**
 * @author Martin Njuguna
 * @version 1.0
 * @see http://iosync.co.ke/
 */
class Queries extends CI_Model {

  function __construct()  {
    parent:: __construct();
  }

  // Read Functions
  public function get_engine_types(){
    return $this->db->get('engineTypes')->result_array();
  }

  public function get_aircraft_models(){
    return $this->db->get('aircraft_models')->result_array();
  }

  public function get_manufacturers(){
    return $this->db->get('manufacturers')->result_array();
  }

  public function get_aircrafts(){
    $sql_get_aircrafts = 'SELECT a.aircraft_id, a.aircraft_reg, a.series, a.serial_number, a.manufacturer_id, b.manufacturer, a.manufacturer_date`, a.model_id`, a.engines, a.engine_type_id, a.propellers, a.cum_hours, a.cum_cycles, a.nextCofA
      FROM aircrafts a
      INNER JOIN manufacturers b
      ON a.manufacturer_id = b.manufacturer_id';
    return $this->db->query($sql_get_aircrafts)->result_array();
  }

  public function get_locations(){
    return $this->db->get('locations')->result_array();
  }

  public function get_flights(){
    $this->db->select('*');
    $this->db->from('flights');
    $this->db->join('aircrafts', 'aircrafts.aircraft_id = flights.aircraft_id');
    return $this->db->get()->result_array();
  }

  public function get_flight_by_aircraft($aircraft_id){
    $sql_get_flights = 'SELECT a.flight_id, a.techlog, a.aircraft_id, b.aircraft_reg, a.takeoff, a.landing, a.hours, a.cycles, a.date_posted
      FROM flights a
      INNER JOIN aircrafts b
      ON a.aircraft_id = b.aircraft_id
      WHERE a.aircraft_id = ?';

    return $this->db->query($sql_get_flights, array($aircraft_id))->result_array();
  }

  public function get_schedule_types(){
    return $this->db->get('schedule_types')->result_array();
  }

  public function get_inspection_types(){
    return $this->db->get('inspection_types')->result_array();
  }

  public function get_task_categories(){
    return $this->db->get('task_category')->result_array();
  }

  public function get_schedule_categories(){
    return $this->db->get('schedule_category')->result_array();
  }

  public function get_ata_chapters(){
    return $this->db->get('ata_chapters')->result_array();
  }

  public function get_comp_cats(){
    return $this->db->get('comp_cat')->result_array();
  }



  // Create Functions
  public function add_aircraft($aircraft_data){
    $this->db->insert('aircrafts', $aircraft_data);
    return $this->db->insert_id();
  }

  public function add_engine($engine_data){
    $this->db->insert('engines', $engine_data);
    return $this->db->insert_id();
  }

  public function add_propeller($prop_data){
    $this->db->insert('propellers', $prop_data);
    return $this->db->insert_id();
  }

  public function add_flight($flight_data){
    $this->db->insert('flights', $flight_data);

    //Add hours/cycles to airframe, engines, propellers and components
    $aircraft_id = $flight_data['aircraft_id'];

    // add to Airframe
    $sql_get_aircraft = 'SELECT aircraft_id, cum_hours, cum_cycles FROM aircrafts WHERE aircraft_id = ?';
    $aircraft_data = $this->db->query($sql_get_aircraft, array($aircraft_id))->row_array();
    $new_aircraft_data  = array(
      'cum_cycles' => $aircraft_data['cum_cycles'] + $flight_data['cycles'],
      'cum_hours' => $aircraft_data['cum_hours'] + $flight_data['hours']
    );
    $this->db->update('aircrafts', $new_aircraft_data, array('aircraft_id'=>$aircraft_id));


    // add to engines
    $sql_get_engine = 'SELECT b.aircraft_id, a.engine_id, a.engine_cycles, a.engine_hours
      FROM engines a
      INNER JOIN aircrafts b
      ON a.aircraft_id = b.aircraft_id
      WHERE b.aircraft_id = ?';
    $engine_data = $this->db->query($sql_get_engine, array($aircraft_id))->result_array();

    foreach ($engine_data as $engine) {
      $engine_id = $engine['engine_id'];
      $data = array(
        'engine_cycles' => ($engine['engine_cycles'] + $flight_data['cycles']),
        'engine_hours' => ($engine['engine_hours'] + $flight_data['hours'])
      );
      $this->db->update('engines', $data, array('engine_id'=>$engine_id));
    }

    // add to propellers
    $sql_get_prop = 'SELECT b.aircraft_id, a.propeller_id, a.propeller_cycles, a.propeller_hours
      FROM propellers a
      INNER JOIN aircrafts b
      ON a.aircraft_id = b.aircraft_id
      WHERE a.aircraft_id = ?';
    $prop_data = $this->db->query($sql_get_prop, array($aircraft_id))->result_array();

    foreach ($prop_data as $prop) {
      $prop_id = $prop['propeller_id'];
      $data = array(
        'propeller_cycles' => ($prop['propeller_cycles'] + $flight_data['cycles']),
        'propeller_hours' => ($prop['propeller_hours'] + $flight_data['hours'])
      );
      $this->db->update('propellers', $data, array('propeller_id' => $prop_id));
    }

    return $this->db->insert_id();
  }

  public function add_logs($logs){
    $this->db->insert('logs', $logs);
    return $this->db->insert_id();
  }

  public function add_schedule_task($schedule_data){
    $this->db->insert($schedule_data);
    return $this->db->inser_id();
  }

  public function add_schedule_details($schedule_details_data){
    return $this->db->insert($schedule_details_data);
  }

  public function add_schedule_workpack($schedule_workpack_data){
    return $this->db->insert($schedule_workpack_data);
  }



  // Update functions
  public function update_task($data){

  }

  // Delete Functions
  public function delete_task($data){

  }

  public function delete_multiple_tasks($data){

  }





}
 ?>
