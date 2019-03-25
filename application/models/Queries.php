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

  public function login_user($login_data){
    return $this->db->get_where('users', $login_data)->row_array();
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
    $sql_get_aircrafts = 'SELECT a.aircraft_id, a.aircraft_reg, c.model, a.series, a.serial_number, a.manufacturer_id, b.manufacturer, a.manufacturer_date, a.model_id, a.engines, a.engine_type_id, a.propellers, a.cum_hours, a.cum_cycles, a.nextCofA
      FROM aircrafts a
      INNER JOIN aircraft_models c ON a.model_id = c.model_id
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

  public function get_flight($flight_id){
    $sql_get_flight = 'SELECT b.aircraft_id, b.aircraft_reg, a.flight_id, a.techlog, a.techlog_type, a.aircraft_id, a.hours, a.cycles, a.flight_date, a.posted_by, a.date_posted
      FROM flights a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      WHERE a.flight_id = '.$flight_id;
    return $this->db->query($sql_get_flight, array($flight_id))->row_array();
  }

  public function get_logs($flight_id){
    $sql_get_log = 'SELECT * FROM logs WHERE flight_id = '.$flight_id;
    return $this->db->query($sql_get_log, array($flight_id))->result_array();
  }

  public function get_flight_by_aircraft($aircraft_id){
    $sql_get_flights = 'SELECT a.flight_id, a.techlog, a.aircraft_id, b.aircraft_reg, a.hours, a.cycles, a.date_posted
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

  public function get_trends(){
    return $this->db->get('engine_trend_types')->result_array();
  }

  public function get_trends_by_flight($flight_id){
    $sql_get_trends = 'SELECT a.id, a.trend_id, b.trend, a.flight_id, a.engine_1, a.engine_2
      FROM  engine_trend_monitor a
      INNER JOIN engine_trend_types b ON a.trend_id = b.trend_id
      WHERE a.flight_id = '.$flight_id;
    return $this->db->query($sql_get_trends, array('flight_id' => $flight_id))->result_array();
  }

  public function get_scheduled_tasks(){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      ORDER BY h.ata_chapter DESC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function scheduled_tasks_row_count(){
    return $this->db->count_all('schedules');
  }

  public function get_task($schedule_id){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, c.type_id, d.task_category, d.task_category_id, e.schedule_category, e.schedule_cat_id, f.comp_cat, f.comp_cat_id, g.inspection, g.inspection_id,
      h.ata_chapter, h.ata_chapter_id, h.ata_name, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      WHERE a.schedule_id = '$schedule_id'
      ORDER BY h.ata_chapter DESC";

    return $this->db->query($sql_get_tasks)->row_array();
  }

  public function get_task_details($schedule_id){
    return $this->db->get_where('schedule_details', array('schedule_id' => $schedule_id))->result_array();
  }

  public function get_component_tasks(){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE c.type_id = 2
      ORDER BY a.schedule_id ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function get_inspection_tasks(){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE c.type_id = 3
      ORDER BY h.ata_chapter ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function get_oop_tasks(){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE e.schedule_cat_id = 6
      ORDER BY h.ata_chapter ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function get_expired_tasks(){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE a.cum_cycles >= a.next_due_cycles OR a.cum_hours >= a.next_due_hours OR (SELECT NOW()) >= a.next_due_date
      ORDER BY h.ata_chapter ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function tasks_search_by_aircraft($aircraft_id){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE b.aircraft_id = '$aircraft_id'
      ORDER BY h.ata_chapter ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function cs_search_by_aircraft($aircraft_id){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE c.type_id = 2 AND b.aircraft_id = '$aircraft_i'
      ORDER BY h.ata_chapter ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function cs_search_by_ata($ata_id){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE c.type_id = 2 AND h.ata_chapter_id = '$ata_id'
      ORDER BY h.ata_chapter ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function cs_search_by_comp_cat($comp_cat_id){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE c.type_id = 2 AND f.comp_cat_id = '$comp_cat_id'
      ORDER BY h.ata_chapter ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function cs_search_by_inspection_type($insp_id){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE c.type_id = 2 AND g.inspection_id = '$insp_id'
      ORDER BY h.ata_chapter ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function cs_search_by_schedule_cat($schedule_cat_id){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE c.type_id = 2 AND e.schedule_cat_id = '$schedule_cat_id'
      ORDER BY h.ata_chapter ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function cs_search_by_schedule_type($schedule_type_id){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE c.type_id = 2 AND c.type_id = '$schedule_type_id'
      ORDER BY h.ata_chapter ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function cs_search_by_task_cat($task_cat_id){
    $sql_get_tasks = "SELECT a.schedule_id, b.aircraft_reg, a.task_card, a.task, a.description, a.part_name,
      a.part_number, a.serial_number, c.schedule_type, d.task_category, e.schedule_category, f.comp_cat, g.inspection,
      h.ata_chapter, a.zone, a.location, a.reference, a.cum_cycles, a.cum_hours, a.last_done_cycles, a.last_done_hours,
      a.date_checked, a.next_due_cycles, a.next_due_hours, a.next_due_date, a.life_limit_cycles, a.life_limit_hours,
      a.life_limit_calendar, a.life_limit_period, a.alarm_cycles, a.alarm_hours, a.alarm_calendar, a.alarm_period,
      a.date_posted, a.notes, a.posted_by, i.cycles, i.hours, i.calendar, i.period
      FROM schedules a
      INNER JOIN aircrafts b ON a.aircraft_id = b.aircraft_id
      INNER JOIN schedule_types c ON a.schedule_type_id = c.type_id
      INNER JOIN task_category d ON d.task_category_id = a.task_category_id
      INNER JOIN schedule_category e ON a.schedule_cat_id = e.schedule_cat_id
      INNER JOIN comp_cat f ON a.comp_cat_id = f.comp_cat_id
      INNER JOIN inspection_types g ON a.inspection_id = g.inspection_id
      INNER JOIN ata_chapters h ON a.ata_chapter_id = h.ata_chapter_id
      INNER JOIN schedule_details i ON a.schedule_id = i.schedule_id
      WHERE c.type_id = 2 AND d.task_category_id = '$task_cat_id'
      ORDER BY h.ata_chapter ASC";

    return $this->db->query($sql_get_tasks)->result_array();
  }

  public function get_defects(){
    $sql_get_defects = "SELECT c.aircraft_reg, a.pirep_id, b.flight_id, b.techlog, a.defect, d.ata_chapter, a.deferred, a.limitations, a.mel_reference, a.dfr_reason, a.dfr_category, a.dfr_date, a.exp_date
    FROM pireps a
    INNER JOIN flights b ON a.flight_id = b.flight_id
    INNER JOIN aircrafts c ON b.aircraft_id = c.aircraft_id
    INNER JOIN ata_chapters d ON a.ata_chapter_id = d.ata_chapter_id
    ORDER BY b.flight_date ASC";
    return $this->db->query($sql_get_defects)->result_array();
  }

  public function get_defects_by_flight($flight_id){
    $sql_get_defects = 'SELECT a.pirep_id, a.flight_id, a.defect, a.ata_chapter_id, b.ata_chapter, a.deferred, a.limitations, a.mel_reference, a.dfr_reason, a.dfr_category, a.dfr_date, a.exp_date, a.rectification, a.techlog_number, a.cleared_date, a.wo_number, a.remarks
      FROM pireps a
      INNER JOIN ata_chapters b ON a.ata_chapter_id = b.ata_chapter_id
      WHERE flight_id = '.$flight_id;
    return $this->db->query($sql_get_defects)->result_array();
  }

  public function get_deferred_defects(){
    $sql_get_defects = "SELECT c.aircraft_reg, a.pirep_id, b.flight_id, b.techlog, a.defect, d.ata_chapter, a.deferred, a.limitations, a.mel_reference, a.dfr_reason, a.dfr_category, a.dfr_date, a.exp_date
    FROM pireps a
    INNER JOIN flights b ON a.flight_id = b.flight_id
    INNER JOIN aircrafts c ON b.aircraft_id = c.aircraft_id
    INNER JOIN ata_chapters d ON a.ata_chapter_id = d.ata_chapter_id
    WHERE a.deferred = 'Yes'
    ORDER BY b.flight_date ASC";
    return $this->db->query($sql_get_defects)->result_array();
  }

  public function get_defects_by_ata($ata_chapter_id){
    $sql_get_defects = "SELECT c.aircraft_reg, a.pirep_id, b.flight_id, b.techlog, a.defect, d.ata_chapter, a.deferred, a.limitations, a.mel_reference, a.dfr_reason, a.dfr_category, a.dfr_date, a.exp_date
    FROM pireps a
    INNER JOIN flights b ON a.flight_id = b.flight_id
    INNER JOIN aircrafts c ON b.aircraft_id = c.aircraft_id
    INNER JOIN ata_chapters d ON a.ata_chapter_id = d.ata_chapter_id
    WHERE a.ata_chapter_id = ?'
    ORDER BY b.flight_date ASC";
    return $this->db->query($sql_get_defects, array($ata_chapter_id))->result_array();
  }

  public function get_defects_by_aircraft($aircraft_id){
    $sql_get_defects = "SELECT c.aircraft_reg, a.pirep_id, b.flight_id, b.techlog, a.defect, d.ata_chapter, a.deferred, a.limitations, a.mel_reference, a.dfr_reason, a.dfr_category, a.dfr_date, a.exp_date
    FROM pireps a
    INNER JOIN flights b ON a.flight_id = b.flight_id
    INNER JOIN aircrafts c ON b.aircraft_id = c.aircraft_id
    INNER JOIN ata_chapters d ON a.ata_chapter_id = d.ata_chapter_id
    WHERE c.aircraft_id = ?'
    ORDER BY b.flight_date ASC";
    return $this->db->query($sql_get_defects, array($aircraft_id))->result_array();
  }

  public function get_defects_by_defer_category($dfr_category){
    $sql_get_defects = "SELECT c.aircraft_reg, a.pirep_id, b.flight_id, b.techlog, a.defect, d.ata_chapter, a.deferred, a.limitations, a.mel_reference, a.dfr_reason, a.dfr_category, a.dfr_date, a.exp_date
    FROM pireps a
    INNER JOIN flights b ON a.flight_id = b.flight_id
    INNER JOIN aircrafts c ON b.aircraft_id = c.aircraft_id
    INNER JOIN ata_chapters d ON a.ata_chapter_id = d.ata_chapter_id
    WHERE a.dfr_category = ?'
    ORDER BY b.flight_date ASC";
    return $this->db->query($sql_get_defects, array($dfr_category))->result_array();
  }

  public function get_defects_by_status($dfr_status){
    $sql_get_defects = "SELECT c.aircraft_reg, a.pirep_id, b.flight_id, b.techlog, a.defect, d.ata_chapter, a.deferred, a.limitations, a.mel_reference, a.dfr_reason, a.dfr_category, a.dfr_date, a.exp_date
    FROM pireps a
    INNER JOIN flights b ON a.flight_id = b.flight_id
    INNER JOIN aircrafts c ON b.aircraft_id = c.aircraft_id
    INNER JOIN ata_chapters d ON a.ata_chapter_id = d.ata_chapter_id
    WHERE a.deferred = ?'
    ORDER BY b.flight_date ASC";
    return $this->db->query($sql_get_defects, array($dfr_status))->result_array();
  }

  public function get_defects_by_date($dates){
    $from = $dates['from'];
    $to = $dates['to'];
    $sql_get_defects = "SELECT c.aircraft_reg, a.pirep_id, b.flight_id, b.techlog, a.defect, d.ata_chapter, a.deferred, a.limitations, a.mel_reference, a.dfr_reason, a.dfr_category, a.dfr_date, a.exp_date
    FROM pireps a
    INNER JOIN flights b ON a.flight_id = b.flight_id
    INNER JOIN aircrafts c ON b.aircraft_id = c.aircraft_id
    INNER JOIN ata_chapters d ON a.ata_chapter_id = d.ata_chapter_id
    WHERE a.dfr_date BETWEEN '$from' AND '$to'
    ORDER BY b.flight_date ASC";

    return $this->db->query($sql_get_defects)->result_array();
  }

  public function get_schedule_detail_task($schedule_detail_id){
    return $this->db->get_where('schedule_details', array('schedule_details_id' => $schedule_details_id))->result_array();
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
    $aircraft_id = $flight_data['aircraft_id'];

    // add to Airframe
    $sql_get_aircraft = 'SELECT aircraft_id, cum_hours, cum_cycles FROM aircrafts WHERE aircraft_id = ?';
    $aircraft_data = $this->db->query($sql_get_aircraft, array($aircraft_id))->row_array();
    $new_aircraft_data  = array(
      'cum_cycles' => $aircraft_data['cum_cycles'] + $flight_data['cycles'],
      'cum_hours' => $aircraft_data['cum_hours'] + $flight_data['hours']
    );
    if ($this->db->update('aircrafts', $new_aircraft_data, array('aircraft_id'=>$aircraft_id)) == FALSE) {
      return 0;
    }

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
      if ($this->db->update('engines', $data, array('engine_id'=>$engine_id)) == FALSE) {
        return 0;
      }
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
      if ($this->db->update('propellers', $data, array('propeller_id' => $prop_id)) == FALSE) {
        return 0;
      }
    }

    // add to components/tasks
    $sql_get_tasks = 'SELECT schedule_id, cum_cycles, cum_hours FROM schedules WHERE aircraft_id = ?';
    $task_data = $this->db->query($sql_get_tasks, array($aircraft_id))->result_array();
    foreach ($task_data as $task) {
      $task_id = $task['schedule_id'];
      $data = array(
        'cum_cycles' => ($task['cum_cycles'] + $flight_data['cycles']),
        'cum_hours' => ($task['cum_hours'] + $flight_data['hours'])
      );
      if ($this->db->update('schedules', $data, array('schedule_id' => $task_id)) == FALSE) {
        return 0;
      }
    }

    if ($this->db->insert('flights', $flight_data) == FALSE) {
      return 0;
    } else {
      return $this->db->insert_id();
    }
  }

  public function add_logs($logs){
    return $this->db->insert('logs', $logs);
  }

  public function add_pireps($defect){
    return $this->db->insert('pireps', $defect);
  }

  public function add_trend_monitor($trend_data){
    return $this->db->insert('engine_trend_monitor', $trend_data);
  }

  public function add_schedule_task($schedule_data){
    $this->db->insert('schedules', $schedule_data);
    return $this->db->insert_id();
  }

  public function add_schedule_details($schedule_details_data){
    return $this->db->insert('schedule_details', $schedule_details_data);
  }

  public function add_schedule_workpack($schedule_workpack_data){
    return $this->db->insert('schedule_workpacks', $schedule_workpack_data);
  }



  // Update functions
  public function update_schedule($schedule_data, $schedule_id){
    return $this->db->update('schedules', $schedule_data, array('schedule_id' => $schedule_id));
  }

  public function update_schedule_details($schedule_details_data, $schedule_details_id){
    $schedule_id = $schedule_details_data['schedule_id'];
    $check_sd = $this->db->get_where('schedule_details', array('schedule_details_id' => $schedule_details_id))->row_array();
    if(!empty($check_sd)){
      $this->db->update('schedule_details', $schedule_details_data, array('schedule_details_id' => $schedule_details_id));
      return $this->db->get_where('schedule_details', array('schedule_id' => $schedule_id))->result_array();
    } else {
      $this->db->insert('schedule_details', $schedule_details_data);
      return $this->db->get_where('schedule_details', array('schedule_id' => $schedule_id))->result_array();
    }
  }

  public function update_logs($log_data, $log_id){
    $flight_id = $log_data['flight_id'];
    $flight = $this->db->get_where('flights', array('flight_id' => $flight_id))->row_array();
    $aircraft = $this->db->get_where('aircrafts', array('aircraft_id' => $flight['aircraft_id']))->row_array();
    $engines = $this->db->get_where('engines', array('aircraft_id' => $flight['aircraft_id']))->result_array();
    $propellers = $this->db->get_where('propellers', array('aircraft_id' => $flight['aircraft_id']))->result_array();
    $schedules = $this->db->get_where('schedules', array('aircraft_id' => $flight['aircraft_id']))->result_array();

    $check_ld = $this->db->get_where('logs', array('log_id' => $log_id))->row_array();
    if(!empty($check_ld)){
      return $this->db->get_where('logs', array('flight_id' => $flight_id))->result_array();
    } else {
      $this->db->insert('logs', $log_data);

      // Add cycles and hours from flight
      $new_flight_data = array(
        'cycles' => $flight['cycles'] + $log_data['cycles'],
        'hours' => $flight['hours'] + $log_data['hours'] ,
      );
      $this->db->update('flights', $new_flight_data, array('flight_id' => $flight_id));

      // Add cycles and hours from airframe
      $new_aiframe_data = array(
        'cum_cycles' => $aircraft['cum_cycles'] + $log_data['cycles'],
        'cum_hours' => $aircraft['cum_hours'] + $log_data['hours']
      );
      $this->db->update('aircrafts', $new_aiframe_data, array('aircraft_id' => $flight['aircraft_id']));

      // Add cycles and hours from specific aircraft Engines
      foreach ($engines as $engine) {
        $new_engines_data = array(
          'engine_cycles' => $engine['engine_cycles'] + $log_data['cycles'],
          'engine_hours' => $engine['engine_hours'] + $log_data['hours']
        );
        $this->db->update('engines', $new_engines_data, array('engine_id' => $engine['engine_id']));
      }

      // Add cycles and hours from specific aircraft propellers
      foreach ($propellers as $propeller) {
        $new_propellers_data = array(
          'propeller_cycles' => $propeller['propeller_cycles'] + $log_data['cycles'],
          'propeller_hours' => $propeller['propeller_hours'] + $log_data['hours'],
        );
        $this->db->update('propellers', $new_propellers_data, array('propeller_id' => $propeller['propeller_id']));
      }

      // Add cycles and hours from specific aircraft scheduledTasks
      foreach ($schedules as $schedule) {
        $new_schedules_data = array(
          'cum_cycles' => $schedule['cum_cycles'] + $log_data['cycles'],
          'cum_hours' => $schedule['cum_hours'] + $log_data['hours']
        );
        $this->db->update('schedules', $new_schedules_data, array('schedule_id' => $schedule['schedule_id']));
      }

      return $this->db->get_where('logs', array('flight_id' => $flight_id))->result_array();
    }
  }

  public function update_defects($pirep_data, $flight_id){
    $check_pirep = $this->db->get_where('pireps', array('pirep_id' => $pirep_data['pirep_id']))->row_array();
    if (!empty($check_pirep)) {
      return $this->db->get_where('pireps', array('flight_id' => $pirep_data['flight_id']))->result_array();
    } else {
      $this->db->insert('pireps', $pirep_data);
      return $this->db->get_where('pireps', array('flight_id' => $pirep_data['flight_id']))->result_array();
    }

  }

  public function update_trends($trend_data, $flight_id){
    $check_trend = $this->db->get_where('engine_trend_monitor', array('id' => $trend_data['id']))->row_array();
    $sql_get_trends = 'SELECT a.id, a.trend_id, b.trend, a.flight_id, a.engine_1, a.engine_2
      FROM  engine_trend_monitor a
      INNER JOIN engine_trend_types b ON a.trend_id = b.trend_id
      WHERE a.flight_id = '.$flight_id;
    if (!empty($check_trend)) {
      return $this->db->query($sql_get_trends, array('flight_id' => $flight_id))->result_array();
    } else {
      $this->db->insert('engine_trend_monitor', $trend_data);
      return $this->db->query($sql_get_trends, array('flight_id' => $flight_id))->result_array();
    }

  }

  // Delete Functions
  public function delete_task($data){

  }

  public function delete_frequency($schedule_details_id){
    return $this->db->delete('schedule_details', array('schedule_details_id' => $schedule_details_id));
  }

  public function delete_multiple_tasks($data){

  }

  public function delete_log($log_id){
    $log = $this->db->get_where('logs',array('log_id'=>$log_id))->row_array();
    $flight_id = $log['flight_id'];
    $flight = $this->db->get_where('flights', array('flight_id' => $flight_id))->row_array();
    $aircraft = $this->db->get_where('aircrafts', array('aircraft_id' => $flight['aircraft_id']))->row_array();
    $engines = $this->db->get_where('engines', array('aircraft_id' => $flight['aircraft_id']))->result_array();
    $propellers = $this->db->get_where('propellers', array('aircraft_id' => $flight['aircraft_id']))->result_array();
    $schedules = $this->db->get_where('schedules', array('aircraft_id' => $flight['aircraft_id']))->result_array();

    // Deduct cycles and hours from flight
    $new_flight_data = array(
      'cycles' => $flight['cycles'] - $log['cycles'],
      'hours' => $flight['hours'] - $log['hours'] ,
    );
    $this->db->update('flights', $new_flight_data, array('flight_id' => $flight_id));

    // Deduct cycles and hours from airframe
    $new_aiframe_data = array(
      'cum_cycles' => $aircraft['cum_cycles'] - $log['cycles'],
      'cum_hours' => $aircraft['cum_hours'] - $log['hours']
    );
    $this->db->update('aircrafts', $new_aiframe_data, array('aircraft_id' => $flight['aircraft_id']));

    // Deduct cycles and hours from specific aircraft Engines
    foreach ($engines as $engine) {
      $new_engines_data = array(
        'engine_cycles' => $engine['engine_cycles'] - $log['cycles'],
        'engine_hours' => $engine['engine_hours'] - $log['hours']
      );
      $this->db->update('engines', $new_engines_data, array('engine_id' => $engine['engine_id']));
    }

    // Deduct cycles and hours from specific aircraft propellers
    foreach ($propellers as $propeller) {
      $new_propellers_data = array(
        'propeller_cycles' => $propeller['propeller_cycles'] - $log['cycles'],
        'propeller_hours' => $propeller['propeller_hours'] - $log['hours'],
      );
      $this->db->update('propellers', $new_propellers_data, array('propeller_id' => $propeller['propeller_id']));
    }

    // Deduct cycles and hours from specific aircraft scheduledTasks
    foreach ($schedules as $schedule) {
      $new_schedules_data = array(
        'cum_cycles' => $schedule['cum_cycles'] - $log['cycles'],
        'cum_hours' => $schedule['cum_hours'] - $log['hours']
      );
      $this->db->update('schedules', $new_schedules_data, array('schedule_id' => $schedule['schedule_id']));
    }


    $this->db->delete('logs', array('log_id' => $log_id ));
    return $this->db->get_where('logs', array('flight_id' => $flight_id))->result_array();
  }

  public function delete_defect($pirep_id){
    $pirep = $this->db->get_where('pireps', array('pirep_id' => $pirep_id))->row_array();
    $this->db->delete('pireps', array('pirep_id' => $pirep_id));
    return $this->db->get_where('pireps', array('flight_id' => $pirep['flight_id']))->result_array();
  }

  public function delete_trend($trend_id){
    $trend = $this->db->get_where('engine_trend_monitor', array('id' => $trend_id))->row_array();
    $this->db->delete('engine_trend_monitor', array('id' => $trend_id));
    $sql_get_trends = 'SELECT a.id, a.trend_id, b.trend, a.flight_id, a.engine_1, a.engine_2
      FROM  engine_trend_monitor a
      INNER JOIN engine_trend_types b ON a.trend_id = b.trend_id
      WHERE a.flight_id = '.$trend['flight_id'];
    return $this->db->query($sql_get_trends, array('flight_id' => $trend['flight_id']))->result_array();
  }

  public function delete_flight($flight_id){
    return 0;
    exit();
    $this->db->delete('trends', array('flight_id'=>$flight_id));
    $this->db->delete('pireps', array('flight_id'=>$flight_id));

    $flight = $this->db->get_where('flights', array('flight_id' => $flight_id))->row_array();
    $aircraft = $this->db->get_where('aircrafts', array('aircraft_id' => $flight['aircraft_id']))->row_array();
    $engines = $this->db->get_where('engines', array('aircraft_id' => $flight['aircraft_id']))->result_array();
    $propellers = $this->db->get_where('propellers', array('aircraft_id' => $flight['aircraft_id']))->result_array();
    $schedules = $this->db->get_where('schedules', array('aircraft_id' => $flight['aircraft_id']))->result_array();

    // Deduct cycles and hours from flight
    $new_flight_data = array(
      'cycles' => $flight['cycles'] - $log['cycles'],
      'hours' => $flight['hours'] - $log['hours'] ,
    );
    $this->db->update('flights', $new_flight_data, array('flight_id' => $flight_id));

    // Deduct cycles and hours from airframe
    $new_aiframe_data = array(
      'cum_cycles' => $aircraft['cum_cycles'] - $log['cycles'],
      'cum_hours' => $aircraft['cum_hours'] - $log['hours']
    );
    $this->db->update('aircrafts', $new_aiframe_data, array('aircraft_id' => $flight['aircraft_id']));

    // Deduct cycles and hours from specific aircraft Engines
    foreach ($engines as $engine) {
      $new_engines_data = array(
        'engine_cycles' => $engine['engine_cycles'] - $log['cycles'],
        'engine_hours' => $engine['engine_hours'] - $log['hours']
      );
      $this->db->update('engines', $new_engines_data, array('engine_id' => $engine['engine_id']));
    }

    // Deduct cycles and hours from specific aircraft propellers
    foreach ($propellers as $propeller) {
      $new_propellers_data = array(
        'propeller_cycles' => $propeller['propeller_cycles'] - $log['cycles'],
        'propeller_hours' => $propeller['propeller_hours'] - $log['hours'],
      );
      $this->db->update('propellers', $new_propellers_data, array('propeller_id' => $propeller['propeller_id']));
    }

    // Deduct cycles and hours from specific aircraft scheduledTasks
    foreach ($schedules as $schedule) {
      $new_schedules_data = array(
        'cum_cycles' => $schedule['cum_cycles'] - $log['cycles'],
        'cum_hours' => $schedule['cum_hours'] - $log['hours']
      );
      $this->db->update('schedules', $new_schedules_data, array('schedule_id' => $schedule['schedule_id']));
    }

    return $this->db->delete('flight', array('flight_id'=>$flight_id));
  }



}
 ?>
