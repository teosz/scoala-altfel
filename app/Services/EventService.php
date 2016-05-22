<?php

namespace App\Services;

use App\Event;


class EventService extends BaseService
{
    protected static function parseDate($data)
    {
      $data['start'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $data['start'])));
      $data['end'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $data['end'])));
      return $data;
    }
    public static function create($input) {
      $event = null;
      try{
        $input = EventService::parseDate($input);
        $event = new Event($input);
        $event->user()->associate(Auth::user());
        $event->save();
      }
      catch(Exception $e) {
        return array(
          'status' => 500,
          'error' => $e->getMessage()
        );
      } finally {
        return array(
          'status' => 204,
          'event' => $event
        );

      }
    }
    public static function get() {
      return [
        'status' => 200,
        'events' => Event::all()
      ];
    }
    public static function find_by_name($name) {
      return [
        'status' => 200,
        'event' => Event::where('name', $name)->first()
      ];
    }
    public static function update($event, $input) {
      try{
        $input = EventService::parseDate($input);
        $event->fill($input)->save();
      }
      catch(Exception $e) {

        return [
          'status' => 500,
          'error' => $e->getMessage()
        ];
      } finally {
        return [
          'status' => 204,
          'event' => $event
        ];
      }
    }
    public static function delete($event) {
      error_log($event);
      $event->delete();

    }
}
