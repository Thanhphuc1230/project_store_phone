<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CalendarRequest;

use Illuminate\Support\Str;

class CalendarController extends BaseController
{
    public function __construct()
    {
        parent::__construct('calendars');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $data['calendars'] = $this->db->get();

        $data['day'] =date('Y-m-d'."T".'h.i.s');
      
        return $this->view_admin('index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
        return $this->view_admin('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalendarRequest $request)
    {
        $data = $request->except('_token');

        $data['uuid'] = Str::uuid();

        $data['created_at'] = new \DateTime(); 

        $this->db->insert($data);

        return $this->route_admin('index' , [] ,  ['success' => 'Thêm lịch làm việc thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->db->where('uuid', $id);
            
        // $id =(string) Str::uuid();

        if ($user->exists()) {
            $data['user'] = $user->first();
            // dd($data['category']);
            return $this->view_admin('edit', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CalendarRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
