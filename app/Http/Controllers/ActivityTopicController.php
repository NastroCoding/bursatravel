<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityTopic;
use Illuminate\Http\Request;

class ActivityTopicController extends Controller
{
    public function index(Activity $activity)
    {
        return view('admin.activity_topics', [
            'activity' => $activity,
            'page' => 'Kelola Topik Aktivitas',
        ]);
    }

    public function store(Request $request, Activity $activity)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        $activity->activityTopics()->create($data);
        return redirect()
            ->route('activities.activity-topics.index', $activity->id)
            ->with('success', 'Topik berhasil ditambahkan');
    }

    public function show(Activity $activity, ActivityTopic $activityTopic)
    {
        return response()->json($activityTopic);
    }

    public function update(Request $request, Activity $activity, ActivityTopic $activityTopic)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        $activityTopic->update($data);
        return redirect()
            ->route('activities.activity-topics.index', $activity->id)
            ->with('success', 'Topik berhasil diupdate');
    }

    public function destroy(Activity $activity, ActivityTopic $activityTopic)
    {
        $activityTopic->delete();
        return redirect()
            ->route('activities.activity-topics.index', $activity->id)
            ->with('success', 'Topik berhasil dihapus');
    }
}
