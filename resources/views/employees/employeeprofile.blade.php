@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
              
            <!-- /Page Header -->
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="user-profile" alt="" src="{{ URL::to('/assets/images/'. $users->avatar) }}" alt="{{ $users->name }}"></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{ $users->name }}</h3>
                                                <h6 class="text-muted"> {{ $users->department }}</h6>
                                                <small class="text-muted">{{ $users->position }}</small>
                                                <div class="staff-id">Employee ID : {{ $users->user_id }}</div>
                                                <div class="small doj text-muted">Date of Join : {{ $users->join_date }}</div>
                                                <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text">
                                                        @if(!empty($users->phone_number))
                                                            <a>{{ $users->phone_number }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text">
                                                        @if(!empty($users->email))
                                                        <a>{{ $users->email }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Birthday:</div>
                                                    <div class="text">
                                                        @if(!empty($users->birth_date))
                                                        <a>{{ $users->birth_date }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Address:</div>
                                                    <div class="text">
                                                        @if(!empty($users->address))
                                                        <a>{{ $users->address }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Gender:</div>
                                                    <div class="text">
                                                        @if(!empty($users->gender))
                                                        <a>{{ $users->gender }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Reports to:</div>
                                                    <div class="text">
                                                        <div class="avatar-box">
                                                            <div class="avatar avatar-xs">
                                                                <img src="{{ URL::to('/assets/images/'. $users->avatar) }}" alt="">
                                                            </div>
                                                        </div>
                                                        <a>{{ $users->line_manager }}</a>
                                                    </div>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
					
            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
                            <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li>
                            <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory <small class="text-danger">(Admin Only)</small></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="tab-content">
                <!-- Profile Info Tab -->
                <div id="emp_profile" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Passport No.</div>
                                            @if (!empty($users->passport_no))
                                                <div class="text">{{ $users->passport_no }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Passport Exp Date.</div>
                                            @if (!empty($users->passport_expiry_date))
                                                <div class="text">{{ $users->passport_expiry_date }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Tel</div>
                                            @if (!empty($users->tel))
                                                <div class="text">{{ $users->tel }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Nationality</div>
                                            @if (!empty($users->nationality))
                                                <div class="text">{{ $users->nationality }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Religion</div>
                                            @if (!empty($users->religion))
                                                <div class="text">{{ $users->religion }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Marital status</div>
                                            @if (!empty($users->marital_status))
                                                <div class="text">{{ $users->marital_status }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Employment of spouse</div>
                                            @if (!empty($users->employment_of_spouse))
                                                <div class="text">{{ $users->employment_of_spouse }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">No. of children</div>
                                            @if ($users->children != null)
                                                <div class="text">{{ $users->children }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                                    <h5 class="section-title">Primary</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Name</div>
                                            @if (!empty($users->name_primary))
                                            <div class="text">{{ $users->name_primary }}</div>
                                            @else
                                            <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Relationship</div>
                                            @if (!empty($users->relationship_primary))
                                            <div class="text">{{ $users->relationship_primary }}</div>
                                            @else
                                            <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Phone </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                            <div class="text">{{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                            <div class="text">N/A</div>
                                            @endif
                                        </li>
                                    </ul>
                                    <hr>
                                    <h5 class="section-title">Secondary</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Name</div>
                                            @if (!empty($users->name_secondary))
                                            <div class="text">{{ $users->name_secondary }}</div>
                                            @else
                                            <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Relationship</div>
                                            @if (!empty($users->relationship_secondary))
                                            <div class="text">{{ $users->relationship_secondary }}</div>
                                            @else
                                            <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Phone </div>
                                            @if (!empty($users->phone_secondary) && !empty($users->phone_2_secondary))
                                            <div class="text">{{ $users->phone_secondary }},{{ $users->phone_2_secondary }}</div>
                                            @else
                                            <div class="text">N/A</div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Bank information
                                        <a href="#" class="edit-icon" data-toggle="modal" data-target="#bank_information_modal">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Bank name</div>
                                            @if(!empty($bankInformation->bank_name))
                                                <div class="text">{{ $bankInformation->bank_name }}</div>
                                            @else  
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Bank account No.</div>
                                            @if(!empty($bankInformation->bank_account_no))
                                                <div class="text">{{ $bankInformation->bank_account_no }}</div>
                                            @else  
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">IFSC Code</div>
                                            @if(!empty($bankInformation->ifsc_code))
                                                <div class="text">{{ $bankInformation->ifsc_code }}</div>
                                            @else  
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">PAN No</div>
                                            @if(!empty($bankInformation->pan_no))
                                                <div class="text">{{ $bankInformation->pan_no }}</div>
                                            @else  
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Family Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Relationship</th>
                                                    <th>Date of Birth</th>
                                                    <th>Phone</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userfamilyinfo as $family)
                                                    <tr>
                                                        <td>{{ $family->name }}</td>
                                                        <td>{{ $family->relationship }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($family->dob)->format('M d, Y') }}</td>
                                                        <td>{{ $family->phone }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#">
                                                                    <i class="material-icons">more_vert</i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" 
                                                                        class="dropdown-item editFamilyBtn" 
                                                                        data-id="{{ $family->id }}" 
                                                                        data-name="{{ $family->name }}" 
                                                                        data-relationship="{{ $family->relationship }}" 
                                                                        data-dob="{{ $family->dob }}" 
                                                                        data-phone="{{ $family->phone }}">
                                                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                                                    </a>
                                                                    <a href="#" 
                                                                        class="dropdown-item deleteFamilyBtn" 
                                                                        data-id="{{ $family->id }}">
                                                                        <i class="fa fa-trash-o m-r-5"></i> Delete
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#education_info"><i class="fa fa-pencil"></i></a></h3>
                                    <div class="experience-box">
                                            <ul class="experience-list">
                                                @forelse ($userEducation as $education)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="javascript:void(0);" 
                                                                        class="name text-capitalize editEducationBtn" 
                                                                        data-id="{{ $education->id }}"
                                                                        data-institution="{{ $education->institution }}"
                                                                        data-subject="{{ $education->subject }}"
                                                                        data-degree="{{ $education->degree }}"
                                                                        data-grade="{{ $education->grade }}"
                                                                        data-start="{{ $education->start_date }}"
                                                                        data-end="{{ $education->end_date }}">
                                                                    {{ $education->institution ?? 'Unknown Institution' }}
                                                                    @if(!empty($education->subject))
                                                                        <small class="text-muted">({{ $education->subject }})</small>
                                                                    @endif
                                                                </a>

                                                                @if(!empty($education->degree))
                                                                    <div><strong>Degree:</strong> {{ $education->degree }}</div>
                                                                @endif

                                                                @if(!empty($education->grade))
                                                                    <div><strong>Grade:</strong> {{ $education->grade }}</div>
                                                                @endif

                                                                <span class="time">
                                                                    @php
                                                                        $start = $education->start_date ? \Carbon\Carbon::parse($education->start_date)->format('Y') : 'N/A';
                                                                        $end   = $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('Y') : 'N/A';
                                                                    @endphp
                                                                    {{ $start }} - {{ $end }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li>
                                                        <div class="timeline-content text-muted">
                                                            No education records found.
                                                        </div>
                                                    </li>
                                                @endforelse
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Experience <a href="#" class="edit-icon" data-toggle="modal" data-target="#experience_info"><i class="fa fa-pencil"></i></a></h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            @forelse ($userExperiences as $experience)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="javascript:void(0);" 
                                                                class="name text-capitalize editExperienceBtn"
                                                                data-id="{{ $experience->id }}"
                                                                data-company="{{ $experience->company_name }}"
                                                                data-position="{{ $experience->job_position }}"
                                                                data-location="{{ $experience->location }}"
                                                                data-from="{{ $experience->period_from }}"
                                                                data-to="{{ $experience->period_to }}">
                                                                {{ $experience->job_position ?? 'Unknown Position' }}
                                                                @if(!empty($experience->company_name))
                                                                    <small class="text-muted">at {{ $experience->company_name }}</small>
                                                                @endif
                                                            </a>

                                                            @if(!empty($experience->location))
                                                                <div><strong>Location:</strong> {{ $experience->location }}</div>
                                                            @endif

                                                            <span class="time">
                                                                @php
                                                                    $from = $experience->period_from 
                                                                        ? \Carbon\Carbon::parse($experience->period_from)->format('M Y') 
                                                                        : 'N/A';
                                                                    $to = $experience->period_to 
                                                                        ? \Carbon\Carbon::parse($experience->period_to)->format('M Y') 
                                                                        : 'Present';
                                                                @endphp
                                                                {{ $from }} - {{ $to }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li>
                                                    <div class="timeline-content text-muted">
                                                        No experience records found.
                                                    </div>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Profile Info Tab -->
                
                <!-- Projects Tab -->
                <div class="tab-pane fade" id="emp_projects">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Office Management</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Projects Tab -->
                
                <!-- Bank Statutory Tab -->
                <div class="tab-pane fade" id="bank_statutory">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"> Basic Salary Information</h3>
                            <form>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select salary basis type</option>
                                                <option>Hourly</option>
                                                <option>Daily</option>
                                                <option>Weekly</option>
                                                <option>Monthly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Salary amount <small class="text-muted">per month</small></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Type your salary amount" value="0.00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Payment type</label>
                                            <select class="select">
                                                <option>Select payment type</option>
                                                <option>Bank transfer</option>
                                                <option>Check</option>
                                                <option>Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="card-title"> PF Information</h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">PF contribution</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">PF No. <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee PF rate</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee PF rate</label>
                                            <select class="select">
                                                <option>Select PF contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>
                                
                                <hr>
                                <h3 class="card-title"> ESI Information</h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">ESI contribution</label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee ESI rate</label>
                                            <select class="select">
                                                <option>Select ESI contribution</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select additional rate</option>
                                                <option>0%</option>
                                                <option>1%</option>
                                                <option>2%</option>
                                                <option>3%</option>
                                                <option>4%</option>
                                                <option>5%</option>
                                                <option>6%</option>
                                                <option>7%</option>
                                                <option>8%</option>
                                                <option>9%</option>
                                                <option>10%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Total rate</label>
                                            <input type="text" class="form-control" placeholder="N/A" value="11%">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Bank Statutory Tab -->
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Profile Modal -->
        <div id="profile_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('profile/information/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        <img class="inline-block" src="{{ URL::to('/assets/images/'. $users->avatar) }}" alt="{{ $users->name }}">
                                        <div class="fileupload btn">
                                            <span class="btn-text">edit</span>
                                            <input class="upload" type="file" id="image" name="images">
                                            @if(!empty($users))
                                            <input type="hidden" name="hidden_image" id="e_image" value="{{ $users->avatar }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
                                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $users->user_id }}">
                                                <input type="hidden" class="form-control" id="email" name="email" value="{{ $users->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <div class="cal-icon">
                                                    @if(!empty($users))
                                                        <input class="form-control datetimepicker" type="text" id="birth_date" name="birth_date" value="{{ $users->birth_date }}">
                                                    @else
                                                        <input class="form-control datetimepicker" type="text" id="birth_date" name="birth_date">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="select form-control" id="gender" name="gender">
                                                    @if(!empty($users))
                                                        <option value="{{ $users->gender }}" {{ ( $users->gender == $users->gender) ? 'selected' : '' }}>{{ $users->gender }} </option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    @else
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        @if(!empty($users))
                                            <input type="text" class="form-control" id="address" name="address" value="{{ $users->address }}">
                                        @else
                                            <input type="text" class="form-control" id="address" name="address">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        @if(!empty($users))
                                            <input type="text" class="form-control" id="state" name="state" value="{{ $users->state }}">
                                        @else
                                            <input type="text" class="form-control" id="state" name="state">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        @if(!empty($users))
                                            <input type="text" class="form-control" id="" name="country" value="{{ $users->country }}">
                                        @else
                                            <input type="text" class="form-control" id="" name="country">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pin Code</label>
                                        @if(!empty($users))
                                            <input type="text" class="form-control" id="pin_code" name="pin_code" value="{{ $users->pin_code }}">
                                        @else
                                            <input type="text" class="form-control" id="pin_code" name="pin_code">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        @if(!empty($users))
                                            <input type="text" class="form-control" id="phoneNumber" name="phone_number" value="{{ $users->phone_number }}">
                                        @else
                                            <input type="text" class="form-control" id="phoneNumber" name="phone_number">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department <span class="text-danger">*</span></label>
                                        <select class="select" id="department" name="department">
                                            @if(!empty($users))
                                                <option value="{{ $users->department }}" {{ ( $users->department == $users->department) ? 'selected' : '' }}>{{ $users->department }} </option>
                                                <option value="Web Development">Web Development</option>
                                                <option value="IT Management">IT Management</option>
                                                <option value="Marketing">Marketing</option>
                                            @else
                                                <option value="Web Development">Web Development</option>
                                                <option value="IT Management">IT Management</option>
                                                <option value="Marketing">Marketing</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation <span class="text-danger">*</span></label>
                                        <select class="select" id="designation" name="designation">
                                            @if(!empty($users))
                                                <option value="{{ $users->designation }}" {{ ( $users->designation == $users->designation) ? 'selected' : '' }}>{{ $users->designation }} </option>
                                                <option value="Web Designer">Web Designer</option>
                                                <option value="Web Developer">Web Developer</option>
                                                <option value="Android Developer">Android Developer</option>
                                            @else
                                                <option value="Web Designer">Web Designer</option>
                                                <option value="Web Developer">Web Developer</option>
                                                <option value="Android Developer">Android Developer</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reports To <span class="text-danger">*</span></label>
                                        <select class="select" id="" name="reports_to">
                                            @if(!empty($users))
                                                <option value="{{ $users->reports_to }}" {{ ( $users->reports_to == $users->reports_to) ? 'selected' : '' }}>{{ $users->reports_to }} </option>
                                                    @foreach ($user as $users )
                                                    <option value="{{ $users->name }}">{{ $users->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($user as $users )
                                                    <option value="{{ $users->name }}">{{ $users->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Profile Modal -->
    
        <!-- Personal Info Modal -->
        <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Personal Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user/information/save') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{ $users->user_id }}" readonly>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passport No</label>
                                        <input type="text" class="form-control @error('passport_no') is-invalid @enderror" name="passport_no" value="{{ $users->passport_no }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passport Expiry Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker @error('passport_expiry_date') is-invalid @enderror" type="text" name="passport_expiry_date" value="{{ $users->passport_expiry_date }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tel</label>
                                        <input class="form-control @error('tel') is-invalid @enderror" type="text" name="tel" value="{{ $users->tel }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nationality <span class="text-danger">*</span></label>
                                        <input class="form-control @error('nationality') is-invalid @enderror" type="text" name="nationality" value="{{ $users->nationality }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Religion</label>
                                        <div class="form-group">
                                            <input class="form-control @error('religion') is-invalid @enderror" type="text" name="religion" value="{{ $users->religion }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Marital status <span class="text-danger">*</span></label>
                                        <select class="select form-control @error('marital_status') is-invalid @enderror" name="marital_status">
                                            <option value="{{ $users->marital_status }}" {{ ( $users->marital_status == $users->marital_status) ? 'selected' : '' }}> {{ $users->marital_status }} </option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Employment of spouse</label>
                                        <input class="form-control @error('employment_of_spouse') is-invalid @enderror" type="text" name="employment_of_spouse" value="{{ $users->employment_of_spouse }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. of children </label>
                                        <input class="form-control @error('children') is-invalid @enderror" type="text" name="children" value="{{ $users->children }}">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Personal Info Modal -->

        <!-- Bank information Modal -->
        <div id="bank_information_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bank Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('bank/information/save') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{ $user_id }}" readonly>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank name</label>
                                        @if(!empty($bankInformation->bank_name))
                                            <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ $bankInformation->bank_name }}">
                                        @else 
                                            <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name') }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank account No</label>
                                        @if(!empty($bankInformation->bank_account_no))
                                            <input type="text" class="form-control @error('bank_account_no') is-invalid @enderror" name="bank_account_no" value="{{ $bankInformation->bank_account_no }}">
                                        @else 
                                            <input type="text" class="form-control @error('bank_account_no') is-invalid @enderror" name="bank_account_no" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" value="{{ old('bank_account_no') }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>IFSC Code</label>
                                        @if(!empty($bankInformation->ifsc_code))
                                            <input type="text" class="form-control @error('ifsc_code') is-invalid @enderror" name="ifsc_code" value="{{ $bankInformation->ifsc_code }}">
                                        @else 
                                            <input type="text" class="form-control @error('pan_no') is-invalid @enderror" name="ifsc_code" value="{{ old('ifsc_code') }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PAN No</label>
                                        @if(!empty($bankInformation->pan_no))
                                            <input type="text" class="form-control @error('pan_no') is-invalid @enderror" name="pan_no" value="{{ $bankInformation->pan_no }}">
                                        @else 
                                            <input type="text" class="form-control @error('pan_no') is-invalid @enderror" name="pan_no" value="{{ old('pan_no') }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Bank information Modal -->
        
        <!-- Family Info Modal -->
        <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Family Informations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="familyinfo" action="{{ route('user-family/information/save') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{ $user_id }}" readonly>

                            <div class="form-scroll" id="contact-container">
                                    <!-- Primary Contact -->
                                    <div class="card contact-card">
                                        <div class="card-body">
                                            <h3 class="card-title">
                                                Primary Contact 
                                                <a href="javascript:void(0);" class="delete-icon d-none"><i class="fa fa-trash-o"></i></a>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="name[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="relationship[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control datetimepicker" type="text" name="dob[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="phone[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Secondary Contact (template for cloning) -->
                                    <div class="card contact-card">
                                        <div class="card-body">
                                            <h3 class="card-title">
                                                Secondary Contact 
                                                <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="name[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="relationship[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control datetimepicker" type="text" name="dob[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="phone[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Add More Button -->
                                <div class="add-more text-end mt-3">
                                    <a href="javascript:void(0);" id="addMore"><i class="fa fa-plus-circle"></i> Add More</a>
                                </div>

                                <div class="submit-section mt-4">
                                    <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                </div>
                </div>
            </div>
        </div>
        <!-- /Family Info Modal -->
        
        <!-- Edit Family -->

        <div id="family_edit_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Family Informations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <form id="familyEditForm" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                <input type="hidden" id="family_id" name="id">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="edit_name" name="name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Relationship <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="edit_relationship" name="relationship">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="text" id="edit_dob" name="dob">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="edit_phone" name="phone">
                                    </div>
                                </div>

                                <div class="submit-section mt-4">
                                    <button class="btn btn-primary submit-btn" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>

        <!--End Edit Family -->

        <!-- Emergency Contact Modal -->
        <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Personal Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="validation" action="{{ route('user/profile/emergency/contact/save') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{ $users->user_id }}">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Primary Contact</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                <input type="text" class="form-control" name="name_primary" value="{{ $users->name_primary }}">
                                                @else
                                                <input type="text" class="form-control" name="name_primary">
                                                @endif
                                            </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship <span class="text-danger">*</span></label>
                                                @if (!empty($users->relationship_primary))
                                                <input type="text" class="form-control" name="relationship_primary" value="{{ $users->relationship_primary }}">
                                                @else
                                                <input type="text" class="form-control" name="relationship_primary">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                @if (!empty($users->phone_primary))
                                                <input type="text" class="form-control" name="phone_primary" value="{{ $users->phone_primary }}">
                                                @else
                                                <input type="text" class="form-control" name="phone_primary">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone 2</label>
                                                @if (!empty($users->phone_2_primary))
                                                <input type="text" class="form-control" name="phone_2_primary" value="{{ $users->phone_2_primary }}">
                                                @else
                                                <input type="text" class="form-control" name="phone_2_primary">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Secondary Contact</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_secondary))
                                                <input type="text" class="form-control" name="name_secondary" value="{{ $users->name_secondary }}">
                                                @else
                                                <input type="text" class="form-control" name="name_secondary">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship <span class="text-danger">*</span></label>
                                                @if (!empty($users->relationship_secondary))
                                                <input type="text" class="form-control" name="relationship_secondary" value="{{ $users->relationship_secondary }}">
                                                @else
                                                <input type="text" class="form-control" name="relationship_secondary">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                @if (!empty($users->phone_secondary))
                                                <input type="text" class="form-control" name="phone_secondary" value="{{ $users->phone_secondary }}">
                                                @else
                                                <input type="text" class="form-control" name="phone_secondary">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone 2</label>
                                                @if (!empty($users->phone_2_secondary))
                                                <input type="text" class="form-control" name="phone_2_secondary" value="{{ $users->phone_2_secondary }}">
                                                @else
                                                <input type="text" class="form-control" name="phone_2_secondary">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Emergency Contact Modal -->
        
        <!-- Education Modal -->
        <div id="education_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Education Informations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="educationForm" action="{{ route('saveEducation') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{ $user_id }}">
                            <div class="form-scroll" id="educationContainer">

                                <div class="card education-card">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            Education Information <span class="edu-count">1</span>
                                        </h3>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Institution <span class="text-danger">*</span></label>
                                                    <input type="text" name="institution[]" class="form-control floating" placeholder="Enter Institution Name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Subject <span class="text-danger">*</span></label>
                                                    <input type="text" name="subject[]" class="form-control floating" placeholder="Enter Subject">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Start Date</label>
                                                    <div class="cal-icon">
                                                        <input type="text" name="start_date[]" class="form-control floating datetimepicker" placeholder="Select Start Date">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Completion Date</label>
                                                    <div class="cal-icon">
                                                        <input type="text" name="end_date[]" class="form-control floating datetimepicker" placeholder="Select Completion Date">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Degree</label>
                                                    <input type="text" name="degree[]" class="form-control floating" placeholder="Enter Degree">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Grade</label>
                                                    <input type="text" name="grade[]" class="form-control floating" placeholder="Enter Grade">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card education-card">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            Education Information <span class="edu-count">2</span>
                                            <a href="javascript:void(0);" class="delete-icon text-danger float-right">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </h3>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Institution <span class="text-danger">*</span></label>
                                                    <input type="text" name="institution[]" class="form-control floating" placeholder="Enter Institution Name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Subject <span class="text-danger">*</span></label>
                                                    <input type="text" name="subject[]" class="form-control floating" placeholder="Enter Subject">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Start Date</label>
                                                    <div class="cal-icon">
                                                        <input type="text" name="start_date[]" class="form-control floating datetimepicker" placeholder="Select Start Date">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Completion Date</label>
                                                    <div class="cal-icon">
                                                        <input type="text" name="end_date[]" class="form-control floating datetimepicker" placeholder="Select Completion Date">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Degree</label>
                                                    <input type="text" name="degree[]" class="form-control floating" placeholder="Enter Degree">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Grade</label>
                                                    <input type="text" name="grade[]" class="form-control floating" placeholder="Enter Grade">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="add-more text-left my-3">
                                <a href="javascript:void(0);" id="addMoreEdu">
                                    <i class="fa fa-plus-circle"></i> Add More
                                </a>
                            </div>

                            <div class="submit-section text-right">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- /Education Modal -->
        
        <div id="editEducationModal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Education Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    
                        <div class="modal-body">
                            <form id="editEducationForm" method="POST" action="{{ route('editEducation') }}">
                                @csrf
                                <input type="hidden" name="education_id" id="education_id">
                                <input type="hidden" name="user_id" value="{{ $user_id }}">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-focus my-3">
                                            <label>Institution <span class="text-danger">*</span></label>
                                            <input type="text" name="institution" id="institution" class="form-control floating">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-focus my-3">
                                            <label>Subject</label>
                                            <input type="text" name="subject" id="subject" class="form-control floating">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-focus my-3">
                                            <label>Start Date</label>
                                            <div class="cal-icon">
                                                <input type="text" name="start_date" id="start_date" class="form-control floating datetimepicker">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-focus my-3">
                                            <label>Completion Date</label>
                                            <div class="cal-icon">
                                                <input type="text" name="end_date" id="end_date" class="form-control floating datetimepicker">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-focus my-3">
                                            <label>Degree</label>
                                            <input type="text" name="degree" id="degree" class="form-control floating">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-focus my-3">
                                            <label>Grade</label>
                                            <input type="text" name="grade" id="grade" class="form-control floating">
                                        </div>
                                    </div>
                                </div>

                                <div class="submit-section text-right">
                                    <button type="submit" class="btn btn-primary submit-btn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Experience Modal -->
        <div id="experience_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Experience Informations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                        <form id="experienceForm" action="{{ route('saveExprience') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user_id }}">

                            <div class="form-scroll" id="experienceContainer">

                                <div class="card experience-card d-none" id="experienceTemplate">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            Experience Information <span class="exp-count"></span>
                                            <a href="javascript:void(0);" class="delete-icon text-danger float-right remove-experience">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </h3>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Company Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control floating" name="company_name[]" placeholder="Enter Company Name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Location <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control floating" name="location[]" placeholder="Enter Location">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Job Position <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control floating" name="job_position[]" placeholder="Enter Job Position">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Period From</label>
                                                    <div class="cal-icon">
                                                        <input type="text" name="period_from[]" class="form-control floating datetimepicker" placeholder="Select Start Date">
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="col-md-6">
                                                <div class="form-group form-focus my-3">
                                                    <label>Period To</label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control floating datetimepicker" name="period_to[]" placeholder="Select End Date">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Template -->

                            </div>

                            <div class="add-more text-left my-3">
                                <a href="javascript:void(0);" id="addMoreExperience">
                                    <i class="fa fa-plus-circle"></i> Add More
                                </a>
                            </div>

                            <div class="submit-section text-right">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Experience Modal -->

         <!-- Edit Experience Modal -->
            <div id="edit_experience_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Experience</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form id="editExperienceForm" action="{{ route('updateExperience') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" id="edit_id">
                                <input type="hidden" name="user_id" value="{{ $user_id }}">

                                <div class="form-scroll">
                                    <div class="card experience-card">
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group form-focus my-3">
                                                        <label>Company Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control floating" id="edit_company_name" name="company_name" placeholder="Enter Company Name">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group form-focus my-3">
                                                        <label>Location <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control floating" id="edit_location" name="location" placeholder="Enter Location">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group form-focus my-3">
                                                        <label>Job Position <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control floating" id="edit_job_position" name="job_position" placeholder="Enter Job Position">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group form-focus my-3">
                                                        <label>Period From</label>
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker" id="edit_period_from" name="period_from" placeholder="Select Start Date">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group form-focus my-3">
                                                        <label>Period To</label>
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker" id="edit_period_to" name="period_to" placeholder="Select End Date">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="submit-section text-right">
                                    <button type="submit" class="btn btn-primary submit-btn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <!-- /Page Content -->
    </div>
    @section('script')
    <script>
        $('#validation').validate({  
            rules: {  
                name_primary: 'required',  
                relationship_primary: 'required',  
                phone_primary: 'required',  
                phone_2_primary: 'required',  
                name_secondary: 'required',  
                relationship_secondary: 'required',  
                phone_secondary: 'required',  
                phone_2_secondary: 'required',  
            },  
            messages: {
                name_primary: 'Please input name primary',  
                relationship_primary: 'Please input relationship primary',  
                phone_primary: 'Please input phone primary',  
                phone_2_primary: 'Please input phone 2 primary',  
                name_secondary: 'Please input name secondary',  
                relationship_secondary: 'Please input relationship secondary',  
                phone_secondaryr: 'Please input phone secondary',  
                phone_2_secondary: 'Please input phone 2 secondary',  
            },  
            submitHandler: function(form) {  
                form.submit();
            }  
        });  
    </script>


    <script>
        $(document).ready(function() {
            let contactCount = 2; 

            $('#addMore').click(function() {
                contactCount++;

                let newCard = $('.contact-card').last().clone();

                newCard.find('input').val('');

                newCard.find('.card-title').html(
                    'Contact ' + contactCount + 
                    ' <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a>'
                );

                $('#contact-container').append(newCard);
            });

            $(document).on('click', '.delete-icon', function() {
                if ($('.contact-card').length > 1) {
                    $(this).closest('.contact-card').remove();

                    $('.contact-card').each(function(index) {
                        let title = index === 0 ? 'Primary Contact' : 'Contact ' + (index + 1);
                        $(this).find('.card-title').html(
                            title + (index === 0 
                                ? ' <a href="javascript:void(0);" class="delete-icon d-none"><i class="fa fa-trash-o"></i></a>' 
                                : ' <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a>')
                        );
                    });
                }
            });
        });
    </script>


    <script>
        $(document).on('click', '.editFamilyBtn', function (e) {
            e.preventDefault();

            let id = $(this).data('id');
            let name = $(this).data('name');
            let relationship = $(this).data('relationship');
            let dob = $(this).data('dob');
            let phone = $(this).data('phone');

            $('#family_id').val(id);
            $('#edit_name').val(name);
            $('#edit_relationship').val(relationship);
            $('#edit_dob').val(dob);
            $('#edit_phone').val(phone);

            let actionUrl = "{{ url('user-edit-family/information/save') }}/" + id;
            $('#familyEditForm').attr('action', actionUrl);

            $('#family_edit_modal').modal('show');
        });
    </script>


    <script>
        $(document).on('click', '.deleteFamilyBtn', function (e) {
            e.preventDefault();
            if (!confirm('Are you sure you want to delete this family record?')) return;

            let id = $(this).data('id');

            $.ajax({
                url: "{{ url('user-family/information/delete') }}/" + id,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: "DELETE"
                },
                success: function (response) {
                    alert(response.message);
                    location.reload();
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    alert('Error deleting record.');
                }
            });
        });
    </script>

    <script>
    $(document).ready(function() {

        function updateEducationCount() {
            $('#educationContainer .education-card').each(function(index) {
                $(this).find('.edu-count').text(index + 1);
            });
        }

        $('#addMoreEdu').on('click', function() {
            let newEdu = $('#educationContainer .education-card:first').clone();
            newEdu.find('input').val(''); 
            newEdu.find('.card-title').append('<a href="javascript:void(0);" class="delete-icon text-danger float-right"><i class="fa fa-trash-o"></i></a>');
            $('#educationContainer').append(newEdu);
            updateEducationCount();
        });

        $(document).on('click', '.delete-icon', function() {
            $(this).closest('.education-card').remove();
            updateEducationCount();
        });

        $(document).on('click', '.editEducationBtn', function () {
            const modal = $('#editEducationModal');

            $('#education_id').val($(this).data('id'));
            $('#institution').val($(this).data('institution'));
            $('#subject').val($(this).data('subject'));
            $('#degree').val($(this).data('degree'));
            $('#grade').val($(this).data('grade'));
            $('#start_date').val($(this).data('start'));
            $('#end_date').val($(this).data('end'));

            modal.modal('show');
        });

        updateEducationCount();
    });
 </script>

 <script>
    $(document).ready(function() {

        function updateEducationCount() {
            $('#educationContainer .education-card').each(function(index) {
                $(this).find('.edu-count').text(index + 1);
            });
        }

        $('#addMoreEdu').on('click', function() {
            let newEdu = $('#educationContainer .education-card:first').clone();
            newEdu.find('input').val(''); 
            newEdu.find('.card-title').append('<a href="javascript:void(0);" class="delete-icon text-danger float-right"><i class="fa fa-trash-o"></i></a>');
            $('#educationContainer').append(newEdu);
            updateEducationCount();
        });

        $(document).on('click', '.delete-icon', function() {
            $(this).closest('.education-card').remove();
            updateEducationCount();
        });

        $(document).on('click', '.editEducationBtn', function () {
            const modal = $('#editEducationModal');

            $('#education_id').val($(this).data('id'));
            $('#institution').val($(this).data('institution'));
            $('#subject').val($(this).data('subject'));
            $('#degree').val($(this).data('degree'));
            $('#grade').val($(this).data('grade'));
            $('#start_date').val($(this).data('start'));
            $('#end_date').val($(this).data('end'));

            modal.modal('show');
        });

        updateEducationCount();
    });
 </script>

 <script>
    $(document).ready(function () {
        const container = $("#experienceContainer");
        const template = $("#experienceTemplate");
        template.find("input, select, textarea").prop("disabled", true);

        function initDatePickers(context) {
            context.find('.datetimepicker').datetimepicker({
                format: 'DD-MM-YYYY',
                icons: {
                    up: "fa fa-angle-up",
                    down: "fa fa-angle-down",
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                }
            });
        }

        function addExperience(removable = true) {
            const newBlock = template.clone().removeClass('d-none').removeAttr('id');
            newBlock.find("input, select, textarea").prop("disabled", false);

            if (!removable) {
                newBlock.find('.remove-experience').remove();
            }

            container.append(newBlock);
            initDatePickers(newBlock);
            updateExperienceNumbers();
        }

        function updateExperienceNumbers() {
            container.find('.experience-card:not(#experienceTemplate)').each(function (index) {
                $(this).find('.exp-count').text(index + 1);
            });
        }

        addExperience(false);

        $("#addMoreExperience").click(function () {
            addExperience(true);
        });

        $(document).on('click', '.remove-experience', function () {
            $(this).closest('.experience-card').remove();
            updateExperienceNumbers();
        });

        initDatePickers($(document));
    });
</script>


<script>
    $(document).on('click', '.editExperienceBtn', function() {
        var id = $(this).data('id');
        var company = $(this).data('company');
        var position = $(this).data('position');
        var location = $(this).data('location');
        var from = $(this).data('from');
        var to = $(this).data('to');

        $('#edit_id').val(id);
        $('#edit_company_name').val(company);
        $('#edit_job_position').val(position);
        $('#edit_location').val(location);
        $('#edit_period_from').val(from);
        $('#edit_period_to').val(to);

        $('#edit_experience_modal').modal('show');
    });
</script>
    @endsection
@endsection