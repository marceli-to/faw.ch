<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Event;
use App\Http\Requests\EventStoreRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
  /**
   * Get a list of events
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(Event::get());
  }

  /**
   * Get a single events for a given events
   * 
   * @param Event $event
   * @return \Illuminate\Http\Response
   */
  public function find(Event $event)
  {
    $event = Event::findOrFail($event->id);
    return response()->json($event);
  }

  /**
   * Store a newly created Event
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(EventStoreRequest $request)
  {
    $event = Event::create($request->all());
    return response()->json(['eventId' => $event->id]);
  }

  /**
   * Update a Event for a given Event or authenticated Event
   *
   * @param Event $event
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(Event $event, EventStoreRequest $request)
  {
    $event = Event::findOrFail($event->id);
    $event->update($request->all());
    $event->save();
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given Event
   *
   * @param  Event $event
   * @return \Illuminate\Http\Response
   */
  public function toggle(Event $event)
  {
    $event->publish = $event->publish == 0 ? 1 : 0;
    $event->save();
    return response()->json($event->publish);
  }

  /**
   * Remove a Event
   *
   * @param  Event $event
   * @return \Illuminate\Http\Response
   */
  public function destroy(Event $event)
  {
    $event->delete();
    return response()->json('successfully deleted');
  }
}
