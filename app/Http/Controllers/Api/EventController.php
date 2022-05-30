<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Event;
use App\Models\Image;
use App\Models\File;
use App\Http\Requests\EventStoreRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
  /**
   * Get a list of events
   * 
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(Event::with('image')->published()->orderBy('date', 'DESC')->orderBy('created_at')->get());
    }

    if ($constraint == 'current')
    {
      return new DataCollection(Event::with('image')->upcomingOrStickyOrPlaceholder()->orderBy('date', 'DESC')->orderBy('created_at')->get());
    }

    $events_sticky = Event::orderBy('date', 'DESC')->where('sticky', 1)->get();
    $events_placeholder = Event::orderBy('date', 'DESC')->where('placeholder', 1)->get();

    // Get non sticky events
    $events = Event::orderBy('date', 'DESC')->where('sticky', 0)->where('placeholder', 0)->get();

    // Group events by year
    $events = $events->groupBy('year');
    $events = $events->all();

    // Create output array
    $events_nonSticky = [];
    foreach($events as $key => $event)
    {
      $events_nonSticky[] = [
        'year' => $key,
        'events' => $event
      ];
    }

    return response()->json([
      'sticky' => $events_sticky,
      'placeholder' => $events_placeholder,
      'nonSticky' => $events_nonSticky
    ]);
  }

  /**
   * Get a single event
   * 
   * @param Event $event
   * @return \Illuminate\Http\Response
   */
  public function find(Event $event)
  {
    $event = Event::with('images', 'files')->find($event->id);
    return response()->json($event);
  }

  /**
   * Store a newly created event
   *
   * @param  \Illuminate\Http\EventStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(EventStoreRequest $request)
  {
    $event = Event::create($request->all());
    $event->save();
    $this->handleImages($event, $request->input('images'));
    $this->handleFiles($event, $request->input('files'));
    return response()->json(['eventId' => $event->id]);
  }

  /**
   * Update a event for a given event
   *
   * @param Event $event
   * @param  \Illuminate\Http\EventStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Event $event, EventStoreRequest $request)
  {
    $event = Event::findOrFail($event->id);
    $event->update($request->all());
    $event->save();
    $this->handleImages($event, $request->input('images'));
    $this->handleFiles($event, $request->input('files'));
    return response()->json('successfully updated');
  }


  /**
   * Toggle the status a given event
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
   * Remove a event
   *
   * @param  Event $event
   * @return \Illuminate\Http\Response
   */
  public function destroy(Event $event)
  {
    $event = Event::with('images', 'files', 'gridItem')->find($event->id);
    $event->gridItem()->delete();    
    $event->images()->delete();
    $event->files()->delete();
    $event->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated images
   *
   * @param Event $event
   * @param Array $images
   * @return void
   */  

  protected function handleImages(Event $event, $images = NULL)
  {
    foreach($images as $image)
    {
      $img = Image::findOrFail($image['id']);
      $img->imageable_id = $event->id;
      $img->imageable_type = Event::class;
      $img->save();
    }
  }

  /**
   * Handle associated files
   *
   * @param Event $event
   * @param Array $files
   * @return void
   */  

  protected function handleFiles(Event $event, $files = NULL)
  {
    foreach($files as $file)
    {
      $img = File::findOrFail($file['id']);
      $img->fileable_id = $event->id;
      $img->fileable_type = Event::class;
      $img->save();
    }
  }
}
