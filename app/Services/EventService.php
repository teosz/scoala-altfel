<?php

namespace App\Services;

use App\Event;


class EventService extends BaseService
{
    protected function parseDate($data)
    {
      $data['start'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $data['start'])));
      $data['end'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $data['end'])));
      return $data;
    }
    public static function create($input) {
      $event = null;
      try{
        $input = $this::parseDate($input);
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
          'status' => 200,
          'event' => $event
        );

      }
    }
    public static function get() {
      return array(
        'status' => 200,
        'events' => Event::all()
      );
    }
    public function update() {

    }
    public function delete() {

    }
}
