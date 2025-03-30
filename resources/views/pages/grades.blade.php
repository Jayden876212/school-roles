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
                            <input id="monthInput" class="form-control" type="month" name="month">
                        </div>

                        <select class="form-select" aria-label="Select a grade" name="grade">
                            <option selected>Select a grade</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->grade }}">
                                    {{ $grade->grade }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success w-100" type="submit">
                            Submit Grades
                        </button>
                    </div>
                </form>
            </section>
        @endif
    </div>
@endsection