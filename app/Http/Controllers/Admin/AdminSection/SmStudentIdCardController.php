<?php

namespace App\Http\Controllers\Admin\AdminSection;

use App\Role;
use App\SmClass;
use App\SmStaff;
use App\SmParent;
use App\SmSection;
use App\SmStudent;
use App\YearCheck;
use App\SmStudentIdCard;
use App\SmGeneralSettings;
use Illuminate\Http\Request;
use App\Helpers\IdCardTemplateHelper;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\RolePermission\Entities\InfixRole;
use App\Http\Requests\Admin\AdminSection\SmStudentIdCardRequest;

class SmStudentIdCardController extends Controller
{
    public function __construct()
	{
        $this->middleware('PM');
	}

    public function index()
    {
        try {
            $id_cards = SmStudentIdCard::where('active_status', 1)->where('school_id', Auth::user()->school_id)->get();
            return view('backEnd.admin.idCard.student_id_card_list',compact('id_cards'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function create_id_card()
    {
        try{
            $id_cards = SmStudentIdCard::where('active_status', 1)->where('school_id', Auth::user()->school_id)->get();
            $roles = InfixRole::select('*')->where('is_saas',0)->where('id', '!=', 1)->where(function ($q) {
                $q->where('school_id', Auth::user()->school_id)->orWhere('type', 'System');
            })->get();
            // Render inside try/catch so Blade/helper fatals are logged (view errors otherwise happen after return).
            $html = view('backEnd.admin.idCard.student_id_card', compact('id_cards','roles'))->render();
            return response($html);
        } catch (\Throwable $e) {
            \Log::error('create-id-card failed: '.$e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
            Toastr::error('Operation Failed: '.$e->getMessage(), 'Failed');
            return redirect()->route('student-id-card');
        }
    }

    public function edit($id)
    {
        try {
            $roles = InfixRole::select('*')->where('is_saas',0)->where(function ($q) {
                $q->where('school_id', Auth::user()->school_id)->orWhere('type', 'System');
            })->get();
            $id_cards = SmStudentIdCard::status()->get();
            $id_card = SmStudentIdCard::status()->find($id);

            if (!$id_card) {
                Toastr::error('ID Card not found', 'Failed');
                return redirect()->route('student-id-card');
            }

            $html = view('backEnd.admin.idCard.student_id_card', compact('id_cards', 'roles', 'id_card'))->render();
            return response($html);
        } catch (\Throwable $e) {
            \Log::error('edit-id-card failed: '.$e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            Toastr::error('Operation Failed: '.$e->getMessage(), 'Failed');
            return redirect()->route('student-id-card');
        }
    }

    public function store(SmStudentIdCardRequest $request)
    {
        try {
            $destination='public/uploads/studentIdCard/';
            $id_card = new SmStudentIdCard();
            $id_card->title = $request->title;
            $id_card->logo = $request->logo ? fileUpload($request->logo, $destination) : generalSetting()->logo;
            $id_card->school_id = Auth::user()->school_id;
            if(moduleStatusCheck('University')){
                $id_card->un_academic_id = getAcademicId();
            }else{
                $id_card->academic_id = getAcademicId();
            }        
            $id_card->signature = fileUpload($request->signature, $destination);          
            $id_card->background_img = fileUpload($request->background_img,$destination); 
            $id_card->background_img_back = fileUpload($request->background_img_back, $destination);
            $id_card->profile_image = fileUpload($request->profile_image,$destination);           
            if(in_array(2, $request->applicable_user) || in_array(3, $request->applicable_user)){
                $id_card->role_id = json_encode($request->applicable_user);
            }else{
                $id_card->role_id = json_encode($request->role);
            }
            
            $id_card->page_layout_style = $request->page_layout_style;
            $id_card->design_mode = $request->design_mode ?? 'classic';
            $id_card->user_photo_style = $request->user_photo_style;
            $id_card->user_photo_width = $request->user_photo_width;
            $id_card->user_photo_height = $request->user_photo_height;
            $id_card->pl_width = $request->pl_width;
            $id_card->pl_height = $request->pl_height;
            $id_card->t_space = $request->t_space;
            $id_card->b_space = $request->b_space;
            $id_card->l_space = $request->l_space;
            $id_card->r_space = $request->r_space;
            $id_card->admission_no = $request->admission_no;
            $id_card->student_name = $request->student_name;
            $id_card->class = $request->class ?? 0;
            if (moduleStatusCheck('University')) {
                $id_card->un_session = $request->un_session_id;
                $id_card->un_faculty = $request->un_faculty_id;
                $id_card->un_department = $request->un_department_id;
                $id_card->un_academic = $request->un_academic_id;
                $id_card->un_semester = $request->un_semester_id;
                $id_card->un_semester_label = $request->un_semester_label_id;
            }
            $id_card->father_name = $request->father_name;
            $id_card->mother_name = $request->mother_name;
            $id_card->student_address = $request->student_address;
            $id_card->dob = $request->dob;
            $id_card->blood = $request->blood;
            $id_card->gender = $request->gender ?? 0;
            $id_card->admission_date = $request->admission_date ?? 0;
            $id_card->guardian_name = $request->guardian_name ?? 0;
            $id_card->guardian_phone = $request->guardian_phone ?? 0;
            $id_card->show_qr = $request->show_qr ?? 0;
            $id_card->font_family = $request->font_family;
            $id_card->font_color = $request->font_color;
            $id_card->field_positions = json_decode(\App\Helpers\IdCardTemplateHelper::mergePositionsFromRequest($request->field_positions ?? []), true);
            if (in_array(3, $request->applicable_user)) {
                $id_card->phone_number = $request->phone_number;
            }
            
            $id_card->save();
          
            Toastr::success('Operation successful', 'Success');
            return redirect('student-id-card');
           
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function update(SmStudentIdCardRequest $request, $id)
    {
        try {
            $destination='public/uploads/studentIdCard/';  
            $id_card = SmStudentIdCard::find($request->id);
            $id_card->title = $request->title;
            $id_card->logo = fileUpdate($id_card->logo,$request->logo,$destination);
            $id_card->background_img = IdCardTemplateHelper::replaceUploadedAsset(
                $id_card->background_img,
                $request->file('background_img'),
                $destination
            );
            $id_card->background_img_back = IdCardTemplateHelper::replaceUploadedAsset(
                $id_card->background_img_back,
                $request->file('background_img_back'),
                $destination
            );
            $id_card->profile_image = fileUpdate($id_card->profile_image,$request->profile_image,$destination);
            if(in_array(2, $request->applicable_user) || in_array(3, $request->applicable_user)){
                $id_card->role_id = json_encode($request->applicable_user);
            }else{
                $id_card->role_id = json_encode($request->role);
            }
            $id_card->signature = fileUpdate($id_card->signature,$request->signature,$destination);
            $id_card->page_layout_style = $request->page_layout_style;
            $id_card->design_mode = $request->design_mode ?? $id_card->design_mode ?? 'classic';
            $id_card->user_photo_style = $request->user_photo_style;
            $id_card->user_photo_width = $request->user_photo_width;
            $id_card->user_photo_height = $request->user_photo_height;
            $id_card->pl_width = $request->pl_width;
            $id_card->pl_height = $request->pl_height;
            $id_card->t_space = $request->t_space;
            $id_card->b_space = $request->b_space;
            $id_card->l_space = $request->l_space;
            $id_card->r_space = $request->r_space;
            $id_card->admission_no = $request->admission_no;
            $id_card->student_name = $request->student_name;
            $id_card->class = $request->class;
            $id_card->father_name = $request->father_name;
            $id_card->mother_name = $request->mother_name;
            $id_card->student_address = $request->student_address;
            $id_card->dob = $request->dob;
            $id_card->blood = $request->blood;
            $id_card->gender = $request->gender ?? 0;
            $id_card->admission_date = $request->admission_date ?? 0;
            $id_card->guardian_name = $request->guardian_name ?? 0;
            $id_card->guardian_phone = $request->guardian_phone ?? 0;
            $id_card->show_qr = $request->show_qr ?? 0;
            $id_card->font_family = $request->font_family;
            $id_card->font_color = $request->font_color;
            $id_card->field_positions = json_decode(\App\Helpers\IdCardTemplateHelper::mergePositionsFromRequest($request->field_positions ?? []), true);
            if (moduleStatusCheck('University')) {
                $id_card->un_session = $request->un_session_id;
                $id_card->un_faculty = $request->un_faculty_id;
                $id_card->un_department = $request->un_department_id;
                $id_card->un_academic = $request->un_academic_id;
                $id_card->un_semester = $request->un_semester_id;
                $id_card->un_semester_label = $request->un_semester_label_id;
            }
            if(in_array(3, $request->applicable_user)){
                $id_card->phone_number = $request->phone_number;
            }
            $id_card->save();
            Toastr::success('Operation successful', 'Success');
            return redirect('student-id-card');
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id_card = SmStudentIdCard::find($request->id);
            
            if ($id_card->logo != "" && file_exists($id_card->logo)) {
                unlink($id_card->logo);
            }

            if ($id_card->signature != "" && file_exists($id_card->signature)) {
                unlink($id_card->signature);
            }

            if ($id_card->profile_image != "" && file_exists($id_card->profile_image)) {
                unlink($id_card->profile_image);
            }

            IdCardTemplateHelper::deleteAssetFile($id_card->background_img);
            IdCardTemplateHelper::deleteAssetFile($id_card->background_img_back);

            $id_card->delete();
            Toastr::success('Operation successful', 'Success');
            return redirect('student-id-card');
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function generateIdCard()
    {
        try {
            $id_cards = SmStudentIdCard::get();
            $roles = Role::get();
            $classes = SmClass::get();
            return view('backEnd.admin.idCard.generate_id_card', compact('id_cards','roles','classes'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function generateIdCardBulk(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'id_card' => 'required',
            'grid_gap' => 'required',
            'output' => 'nullable|in:print,pdf',
        ]);
        if ($request->role==2) {
            $s_students = SmStudent::when($request->class, function($q) use($request){
                    $q->whereHas('studentRecord', function($query) use($request){
                        $query->where('class_id', $request->class);
                    });
                })
                ->when($request->section, function($q) use($request){
                    $q->whereHas('studentRecord', function($query) use($request){
                        $query->where('section_id', $request->section);
                    });
                })
                ->with('parents', 'bloodGroup', 'gender', 'getClassRecord.class', 'getClassRecord.section')
                ->get();
        } elseif ($request->role==3) {
            $studentGuardian = SmStudent::get('parent_id');
            $s_students = SmParent::whereIn('id', $studentGuardian)->get();
        } else {
            $s_students = SmStaff::whereRole($request->role)->status()->get();
        }
        $id_card = SmStudentIdCard::status()->find($request->id_card);

        $role_id = $request->role;
        $gridGap = $request->grid_gap;
        $output = $request->input('output', 'print');

        if ($output === 'pdf') {
            return $this->streamIdCardsPdf($id_card, $s_students, $role_id, $gridGap);
        }

        return view('backEnd.admin.idCard.student_id_card_print_bulk', [
            'id_card' => $id_card,
            's_students' => $s_students,
            'role_id' => $role_id,
            'gridGap' => $gridGap,
        ]);
    }

    public function studentIdCardView(Request $request, $id)
    {
        try {
            $student = SmStudent::with('parents', 'bloodGroup', 'gender', 'category', 'getClassRecord.class', 'getClassRecord.section')
                ->findOrFail($id);
            $id_cards = IdCardTemplateHelper::cardsForRole(2);
            if ($id_cards->isEmpty()) {
                Toastr::error('No active student ID card template found', 'Failed');
                return redirect()->route('student_view', $id);
            }

            $cardId = $request->get('id_card');
            $id_card = $cardId
                ? SmStudentIdCard::status()->find($cardId)
                : IdCardTemplateHelper::defaultCardForStudent(2);

            if (!$id_card) {
                Toastr::error('Selected ID card template not found', 'Failed');
                return redirect()->route('student_view', $id);
            }

            $autoPrint = (bool) $request->boolean('print');

            return view('backEnd.admin.idCard.student_id_card_single', compact('student', 'id_card', 'id_cards', 'autoPrint'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function studentIdCardDownload(Request $request, $id)
    {
        try {
            $student = SmStudent::with('parents', 'bloodGroup', 'gender', 'category', 'getClassRecord.class', 'getClassRecord.section')
                ->findOrFail($id);

            $cardId = $request->get('id_card');
            $id_card = $cardId
                ? SmStudentIdCard::status()->find($cardId)
                : IdCardTemplateHelper::defaultCardForStudent(2);

            if (!$id_card) {
                Toastr::error('No active student ID card template found', 'Failed');
                return redirect()->route('student_view', $id);
            }

            $side = strtolower((string) $request->get('side', 'both'));
            if (!in_array($side, ['front', 'back', 'both'], true)) {
                $side = 'both';
            }

            return $this->streamIdCardsPdf($id_card, collect([$student]), 2, 10, $side);
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function studentIdCardPrint(Request $request, $id)
    {
        $request->merge(['print' => 1]);
        return $this->studentIdCardView($request, $id);
    }

    protected function streamIdCardsPdf($id_card, $s_students, $role_id, $gridGap = 10, $side = 'both')
    {
        set_time_limit(2700);
        $side = strtolower((string) $side);
        if (!in_array($side, ['front', 'back', 'both'], true)) {
            $side = 'both';
        }

        $pdf = Pdf::loadView('backEnd.admin.idCard.student_id_card_pdf', [
            'id_card' => $id_card,
            's_students' => $s_students,
            'role_id' => $role_id,
            'gridGap' => $gridGap,
            'side' => $side,
        ]);

        if (in_array($side, ['front', 'back'], true) && ($id_card->design_mode ?? 'classic') === 'template') {
            $widthMm = !empty($id_card->pl_width) ? (float) $id_card->pl_width : 86.0;
            $heightMm = !empty($id_card->pl_height) ? (float) $id_card->pl_height : 49.0;
            $mmToPt = 2.834645669;
            $pdf->setPaper([0, 0, $widthMm * $mmToPt, $heightMm * $mmToPt]);
        } else {
            $pdf->setPaper('A4', 'portrait');
        }

        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isRemoteEnabled', true);

        $suffix = $side === 'both' ? '' : '-' . $side;
        $filename = Str::slug(($id_card->title ?: 'student-id-card') . $suffix) . '.pdf';

        return $pdf->download($filename);
    }

    public function ajaxIdCard(Request $request){
        try {

            $role_id=$request->role_id;
            $id_cards = SmStudentIdCard::status()->get();
            $idCards=[];
            foreach($id_cards as $id_card){
                $role_ids= json_decode($id_card->role_id);
                if(in_array($role_id,$role_ids)){
                    $d['id']=$id_card->id;
                    $d['title']=$id_card->title;
                    $idCards[]=$d;
                }
            }
        
            return response()->json([$idCards]);

        } catch (\Throwable $th) {
           
        }
    }

    public function generateIdCardSearch(Request $request)
    {
        return $request->all();

        $request->validate([
            'class' => 'required',
            'id_card' => 'required',
        ]);

        try {
            $card_id = $request->id_card;
            $class_id = $request->class; 
            $students = SmStudent::with('class','parents','section','gender')->get();
            $classes = SmClass::get();
            $id_cards = SmStudentIdCard::get();
            return view('backEnd.admin.idCard.generate_id_card_old', compact('id_cards', 'class_id', 'classes', 'students', 'card_id','section'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function ajaxStudentIdCardPrint()
    {
        try {
            $pdf = Pdf::loadView('backEnd.admin.idCard.student_id_card_print');
            return response()->$pdf->stream('certificate.pdf');
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function generateIdCardPrint(Request $request, $s_id, $c_id)
    {
        set_time_limit(2700);
        try {

            $s_ids = explode('-', $s_id);
            $students = [];
            foreach ($s_ids as $sId) {
                $students[] = SmStudent::with('parents', 'bloodGroup', 'gender', 'category', 'getClassRecord.class', 'getClassRecord.section')->find($sId);
            }

            $id_card = SmStudentIdCard::find($c_id);
            $students = collect($students)->filter();

            if ($request->get('format') === 'pdf') {
                return $this->streamIdCardsPdf($id_card, $students, 2, 10);
            }

            return view('backEnd.admin.idCard.student_id_card_print_2', ['id_card' => $id_card, 'students' => $students]);
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
}
