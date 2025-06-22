@extends('layouts.base_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/auth/registration.css') }}">
@endpush

@section('title')
    Registration | StudentSphere
@endsection

@section('description')
    Register into the StudentSphere
@endsection

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
            <div class="card card-registration my-4">
                <div class="row g-0">
                    <div class="col-xl-6 d-none d-xl-block">
                        <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                            alt="Students collaborating" class="img-fluid h-100 w-auto"
                            style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"/>
                    </div>
                    <div class="col-xl-6">
                        <div class="card-body p-md-5 text-black">
                            <h3 class="mb-5 text-uppercase">Student Registration Form</h3>

                            <form action="{{ route('register.submit') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="first-name">First Name</label>
                                            <input name="first_name" type="text" id="first-name"
                                                   class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                                   value="{{ old('first_name') }}"/>
                                            @error('first_name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="last-name">Last Name</label>
                                            <input name="last_name" type="text" id="last-name"
                                                   class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                                   value="{{ old('last_name') }}"/>
                                            @error('last_name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="email">Email</label>
                                            <input name="email" type="email" id="email"
                                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                   value="{{ old('email') }}"/>
                                            @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="password">Password</label>
                                            <input name="password" type="password" id="password"
                                                   class="form-control form-control-lg @error('password') is-invalid @enderror"/>
                                            @error('password')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="password-confirmation">Confirm
                                                Password</label>
                                            <input name="password_confirmation" type="password"
                                                   id="password-confirmation"
                                                   class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"/>
                                            @error('password_confirmation')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="dob">Date of Birth</label>
                                            <input name="dob" type="date" id="dob"
                                                   class="form-control @error('dob') is-invalid @enderror"
                                                   value="{{ old('dob') }}"/>
                                            @error('dob')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline" data-mdb-input-init>
                                            <label class="form-label" for="gender">Gender</label>
                                            <select name="gender" id="gender"
                                                    class="form-select @error('gender') is-invalid @enderror">
                                                <option value="" disabled selected>Select your gender</option>
                                                <option
                                                    value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                                    Male
                                                </option>
                                                <option
                                                    value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                    Female
                                                </option>
                                                <option
                                                    value="rather_not_say" {{ old('gender') == 'rather_not_say' ? 'selected' : '' }}>
                                                    Rather not say
                                                </option>
                                            </select>
                                            @error('gender')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Repeat similar block for the remaining fields -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="linkedin">LinkedIn</label>
                                    <input type="url" id="linkedin" name="linkedin"
                                           class="form-control form-control-lg @error('linkedin') is-invalid @enderror"
                                           value="{{ old('linkedin') }}"
                                           placeholder="https://linkedin.com/in/your-profile"/>
                                    @error('linkedin')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="github">GitHub</label>
                                    <input type="url" id="github" name="github"
                                           class="form-control form-control-lg @error('github') is-invalid @enderror"
                                           value="{{ old('github') }}"
                                           placeholder="https://github.com/your-username"/>
                                    @error('github')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="personal-site">Personal Site</label>
                                    <input type="url" id="personal-site" name="personal_site"
                                           class="form-control form-control-lg @error('personal_site') is-invalid @enderror"
                                           value="{{ old('personal_site') }}"
                                           placeholder="https://your-website.com"/>
                                    @error('personal_site')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="educational_background.institution">Institution/University Name</label>
                                    <input list="institutions"
                                           type="text"
                                           id="educational_background.institution"
                                           name="educational_background[institution]"
                                           class="form-control form-control-lg @error('educational_background.institution') is-invalid @enderror"
                                           value="{{ old('educational_background.institution') }}"
                                           placeholder="e.g., University of XYZ" />
                                    <datalist id="institutions">
                                        <option value="University of the Punjab">
                                        <option value="Lahore University of Management Sciences (LUMS)">
                                        <option value="University of Engineering and Technology, Lahore (UET Lahore)">
                                        <option value="COMSATS University Islamabad, Lahore Campus">
                                        <option value="Government College University, Lahore">
                                        <option value="University of Lahore (UOL)">
                                        <option value="Forman Christian College (A Chartered University)">
                                        <option value="University of Central Punjab (UCP)">
                                        <option value="University of Management and Technology (UMT)">
                                        <option value="King Edward Medical University, Lahore">
                                        <option value="Fatima Jinnah Medical University, Lahore">
                                        <option value="Allama Iqbal Medical College, Lahore">
                                        <option value="National College of Arts (NCA), Lahore">
                                        <option value="University of Sargodha">
                                        <option value="University of Gujrat">
                                        <option value="Bahauddin Zakariya University, Multan">
                                        <option value="Islamia University of Bahawalpur">
                                        <option value="University of Faisalabad">
                                        <option value="National Textile University, Faisalabad">
                                        <option value="Government College Women University, Faisalabad">
                                        <option value="University of Agriculture, Faisalabad">
                                        <option value="Punjab Tianjin University of Technology, Lahore">
                                        <option value="Lahore College for Women University (LCWU)">
                                        <option value="University of Okara">
                                        <option value="University of Narowal">
                                        <option value="University of Chakwal">
                                        <option value="University of Mianwali">
                                        <option value="Ghazi University, Dera Ghazi Khan">
                                        <option value="University of Education, Lahore">
                                        <option value="University of Veterinary and Animal Sciences, Lahore (UVAS)">
                                        <option value="Beaconhouse National University, Lahore">
                                        <option value="Riphah International University, Lahore Campus">
                                        <option value="Superior University, Lahore">
                                        <option value="Institute of Management Sciences, Lahore (Pak-AIMS)">
                                        <option value="University of South Asia, Lahore">
                                        <option value="Hajvery University, Lahore">
                                        <option value="Lahore Garrison University">
                                        <option value="University of Wah">
                                        <option value="University of Jhang">
                                        <option value="University of Swabi">
                                        <option value="International Islamic University, Islamabad">
                                        <option value="Quaid-i-Azam University, Islamabad">
                                        <option value="National University of Sciences and Technology (NUST)">
                                        <option value="Pakistan Institute of Engineering and Applied Sciences (PIEAS)">
                                        <option value="Air University, Islamabad">
                                        <option value="Bahria University, Islamabad">
                                        <option value="Preston University, Islamabad">
                                        <option value="Shaheed Zulfiqar Ali Bhutto Medical University, Islamabad">
                                        <option value="Capital University of Science and Technology (CUST)">
                                        <option value="Virtual University of Pakistan">
                                    </datalist>

                                    @error('educational_background.institution')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="educational_background.degree">Degree
                                        Program</label>
                                    <input
                                        list="degree_programs"
                                        type="text" id="educational_background.degree"
                                           name="educational_background[degree]"
                                           class="form-control form-control-lg @error('educational_background.degree') is-invalid @enderror"
                                           value="{{ old('educational_background.degree') }}"
                                           placeholder="e.g., Bachelor's in Computer Science"/>

                                    <datalist id="degree_programs">
                                        <option value="Computer Science">
                                        <option value="Software Engineering">
                                        <option value="Information Technology">
                                        <option value="Artificial Intelligence">
                                        <option value="Data Science">
                                        <option value="Cyber Security">
                                        <option value="Electrical Engineering">
                                        <option value="Mechanical Engineering">
                                        <option value="Civil Engineering">
                                        <option value="Chemical Engineering">
                                        <option value="Biomedical Engineering">
                                        <option value="Mechatronics Engineering">
                                        <option value="Architecture">
                                        <option value="Mathematics">
                                        <option value="Statistics">
                                        <option value="Physics">
                                        <option value="Chemistry">
                                        <option value="Biotechnology">
                                        <option value="Microbiology">
                                        <option value="Zoology">
                                        <option value="Botany">
                                        <option value="Environmental Science">
                                        <option value="Geology">
                                        <option value="Pharmacy (Pharm-D)">
                                        <option value="Doctor of Medicine (MBBS)">
                                        <option value="Doctor of Dental Surgery (BDS)">
                                        <option value="Nursing">
                                        <option value="Physiotherapy (DPT)">
                                        <option value="Medical Laboratory Technology (MLT)">
                                        <option value="Psychology">
                                        <option value="Sociology">
                                        <option value="Social Work">
                                        <option value="Education (B.Ed/M.Ed)">
                                        <option value="English Literature">
                                        <option value="Urdu">
                                        <option value="Islamic Studies">
                                        <option value="Political Science">
                                        <option value="International Relations">
                                        <option value="Mass Communication">
                                        <option value="Economics">
                                        <option value="Commerce">
                                        <option value="Accounting and Finance">
                                        <option value="Banking and Finance">
                                        <option value="Business Administration (BBA/MBA)">
                                        <option value="Public Administration">
                                        <option value="Supply Chain Management">
                                        <option value="Marketing">
                                        <option value="Human Resource Management">
                                        <option value="Fine Arts">
                                        <option value="Graphic Design">
                                    </datalist>

                                    @error('educational_background.degree')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="educational_background.date_of_completion">Date
                                        of Completion</label>
                                    <input type="date" id="educational_background.date_of_completion"
                                           name="educational_background[date_of_completion]"
                                           class="form-control form-control-lg @error('educational_background.date_of_completion') is-invalid @enderror"
                                           value="{{ old('educational_background.date_of_completion') }}"
                                           placeholder="e.g., 2025-06-30"/>
                                    @error('educational_background.date_of_completion')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="d-flex justify-content-end pt-3">
                                    <button type="reset"
                                            class="btn btn-light btn-lg">Reset
                                    </button>
                                    <button type="submit"
                                            class="btn btn-warning btn-lg ms-2">Register
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush

