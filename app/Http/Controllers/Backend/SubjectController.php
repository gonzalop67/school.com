<?php

namespace App\Http\Controllers\Backend;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use App\Models\SubjectClassModel;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function subject_list()
    {
        $data['getRecord'] = SubjectModel::getRecord(Auth::user()->id, Auth::user()->is_admin);
        $data['meta_title'] = "Subject";
        return view('backend.subject.list', $data);
    }

    public function create_subject()
    {
        $data['meta_title'] = "Create subject";
        return view('backend.subject.create', $data);
    }

    public function insert_subject(Request $request)
    {
        $save           = new SubjectModel;
        $save->name     = trim($request->name);
        $save->type     = trim($request->type);
        $save->status   = trim($request->status);
        $save->created_by_id = Auth::user()->id;
        $save->save();

        return redirect('panel/subject')->with('success', "Subject successfully created");
    }

    public function edit_subject(string $id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        $data['meta_title'] = "Edit Subject";
        return view('backend.subject.edit', $data);
    }

    public function update_subject($id, Request $request)
    {
        $save           = SubjectModel::getSingle($id);
        $save->name     = trim($request->name);
        $save->type     = trim($request->type);
        $save->status   = trim($request->status);
        $save->save();

        return redirect('panel/subject')->with('success', "Subject successfully updated");
    }

    public function delete_subject($id)
    {
        $save = SubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect('panel/subject')->with('success', "Subject successfully deleted");
    }

    public function assign_subject_list(Request $request)
    {
        $data['getRecord'] = SubjectClassModel::getRecord(Auth::user()->id, Auth::user()->is_admin);
        $data['meta_title'] = "Assign Subject Class";
        return view('backend.assign_subject.list', $data);
    }

    public function create_assign_subject()
    {
        $data['getClass'] = ClassModel::getRecordActive(Auth::user()->id);
        $data['getSubject'] = SubjectModel::getRecordActive(Auth::user()->id);

        $data['meta_title'] = "Create Assign Subject";
        return view('backend.assign_subject.create', $data);
    }

    public function insert_assign_subject(Request $request)
    {
        if (!empty($request->class_id) && !empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                if (!empty($subject_id)) {
                    $check = SubjectClassModel::checkClassSubject(Auth::user()->id, $request->class_id, $subject_id);
                    if (empty($check)) {
                        $save             = new SubjectClassModel;
                        $save->class_id   = trim($request->class_id);
                        $save->subject_id = trim($subject_id);
                        $save->status     = trim($request->status);
                        $save->created_by_id = Auth::user()->id;
                        $save->save();
                    }
                }
            }
        }

        return redirect('panel/assign-subject')->with('success', "Assign Subject Class Successfully Created");
    }
}
