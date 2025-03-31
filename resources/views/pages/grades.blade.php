@extends("layouts.base")

@section("title", $page_title)

@section("content")
    <h1 class="text-center mx-auto display-1 m-5">{{ $page_title }}</h1>
    <div class="row mb-5">
        @if ($user->role("student"))
            <section id="submitGrades" class="col-md-5 mx-auto">
                <form method="POST" class="card">
                    <div class="card-header">
                        <h2>Submit grades for monthly exam</h2>
                    </div>
                    <div class="card-body">
                        @csrf

                        <div class="mb-3">
                            <label for="monthInput" class="form-label">Enter the month of the exam:</label>
                            <input id="monthInput" class="form-control mb-3" type="month" name="month">

                            @error("month")
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <select class="form-select mb-3" aria-label="Select a grade" name="grade">
                                @if ($grades->isNotEmpty())
                                    <option selected>Select a grade</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->grade }}">
                                            {{ $grade->grade }}
                                        </option>
                                    @endforeach
                                @else
                                    <option selected>No grades available</option>
                                @endif
                            </select>

                            @error("grade")
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success w-100 mb-3" type="submit">
                            Submit Grades
                        </button>

                        @error("database")
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </form>
            </section>

            <section id="seeGrades" class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>See your grades for each month</h2>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            @if ($exams->isEmpty())
                                <caption><div class="alert alert-info" role="alert">
                                    No exam grades have been submitted.
                                </div></caption>
                            @endif
                            <thead>
                                <tr>
                                    <th scope="col" title="Exam Unique ID">#</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Month</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exams as $exam)
                                    <tr>
                                        <td scope="row">{{ $exam->id }}</td>
                                        <td>{{ $exam->grade }}</td>
                                        <td>{{ $exam->month }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        @elseif ($user->role("teacher"))
            <section id="visualiseStudentsGrades" class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Visualise a student's grades over time</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <select class="form-select mb-3" aria-label="Select a student" id="studentInput">
                                @if ($students->isNotEmpty())
                                    <option selected>Select a student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">
                                            {{ $student->getUser()->first_name }} {{ $student->getUser()->last_name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option selected>No students available</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection