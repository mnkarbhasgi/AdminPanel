$priorityJobs = Contactus::where('created_at', '<=', Carbon::now())
->where('priority', 'low')
->where('status', 'new')
->get();
dd($priorityJobs);

foreach ($priorityJobs as $priorityJob):

DB::transaction(function () use ($priorityJob) {
    DB::table('contactus')
        ->update(['priority' => 'medium']);
});

event(new DeadlineExpired($priorityJob));

endforeach;