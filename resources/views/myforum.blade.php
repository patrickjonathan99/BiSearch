@extends('layouts.main')

@section('container')
    @if(session()->has('postCreated'))
        <div class="alert alert-success alert-dismissible fade show judulSection" role="alert">
            {{ session('postCreated') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('updateSuccess'))
        <div class="alert alert-success alert-dismissible fade show judulSection" role="alert">
            {{ session('updateSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="judulSection">
        <button class="button is-warning">Ongoing Recruitment</button>
    </div>

    @if($posts->isEmpty())
        <div class="alert alert-light alert-dismissible fade show judulSection" role="alert">
            There’s no ongoing recruitment
        </div>
    @endif

    <div class="forumContent">
        @foreach($posts as $p)
        <div class="card smallC">
            <a href="/forum/{{ $p->id }}">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                        <figure class="image is-96x96">
                            @if ($p->lecturer->pic)
                                <img src="{{ asset('storage/' . $p->lecturer->pic) }}" alt="Placeholder image">
                            @else
                                <img src="/images/user.jpg" alt="Placeholder image">
                            @endif
                        </figure>
                        </div>
                        <div class="media-content">
                        <p class="title is-4 lecturerName">{{ $p->lecturer->name }}</p>
                        <p class="subtitle is-6">{{ $p->required_student }} People Required</p>
                        <p class="subtitle is-6">By {{ date('l, j F Y', strtotime($p->due_date)) }}</p>
                        </div>
                    </div>

                    <div class="content">
                        <hr>
                        <p class="judul">{{ $p->title }}</p>
                        <p>Topik : {{ $p->topic }}</p>
                        <p>{{ Str::limit($p->description, 80, ' ... read more') }}</p>

                        <div class="applied">
                            @php
                                $counter = 0;
                            @endphp
                            @foreach ($p->comment as $com)
                                @if ($counter < 3)
                                    @if ($com->student->pic)
                                        <figure class="image is-32x32 mhsPictContain">
                                            <img class="is-rounded mhsPict" src="{{ asset('storage/' . $com->student->pic) }}">
                                        </figure>
                                    @else
                                        <figure class="image is-32x32 mhsPictContain">
                                            <img class="is-rounded mhsPict" src="/images/user.jpg">
                                        </figure>
                                    @endif

                                    @php
                                        $counter++;
                                    @endphp
                                @else
                                    @break
                                @endif
                            @endforeach
                            <p> ... {{ count($p->comment) }} people applied</p>
                        </div>

                        <div class="buttons mt-4 mb-2">
                            <button class="button is-rounded is-small categoryBtn">{{ $p->department->department_name }}</button>
                            <button class="button is-rounded is-small categoryBtn">{{ $p->type->type_name }}</button>
                        </div>
                        <p>{{ date('h:i A - j F Y', strtotime($p->post_date)) }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="judulSection">
        <button class="button is-warning">Past Recruitment</button>
    </div>

    @if($pastposts->isEmpty())
        <div class="alert alert-light alert-dismissible fade show judulSection" role="alert">
            You haven’t done any recruitment yet
        </div>
    @endif

    <div class="forumContent">
        @foreach($pastposts as $p)
        <div class="card smallC">
            <a href="/forum/{{ $p->id }}">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                        <figure class="image is-96x96">
                            @if ($p->lecturer->pic)
                                <img src="{{ asset('storage/' . $p->lecturer->pic) }}" alt="Placeholder image">
                            @else
                                <img src="/images/user.jpg" alt="Placeholder image">
                            @endif
                        </figure>
                        </div>
                        <div class="media-content">
                        <p class="title is-4 lecturerName">{{ $p->lecturer->name }}</p>
                        <p class="subtitle is-6">{{ $p->required_student }} People Required</p>
                        <p class="subtitle is-6">By {{ date('l, j F Y', strtotime($p->due_date)) }}</p>
                        </div>
                    </div>

                    <div class="content">
                        <hr>
                        <p class="judul">{{ $p->title }}</p>
                        <p>Topik : {{ $p->topic }}</p>
                        <p>{{ Str::limit($p->description, 80, ' ... read more') }}</p>

                        <div class="applied">
                            @php
                                $counter = 0;
                            @endphp
                            @foreach ($p->comment as $com)
                                @if ($counter < 3)
                                    @if ($com->student->pic)
                                        <figure class="image is-32x32 mhsPictContain">
                                            <img class="is-rounded mhsPict" src="{{ asset('storage/' . $com->student->pic) }}">
                                        </figure>
                                    @else
                                        <figure class="image is-32x32 mhsPictContain">
                                            <img class="is-rounded mhsPict" src="/images/user.jpg">
                                        </figure>
                                    @endif

                                    @php
                                        $counter++;
                                    @endphp
                                @else
                                    @break
                                @endif
                            @endforeach
                            <p> ... {{ count($p->comment) }} people applied</p>
                        </div>

                        <div class="buttons mt-4 mb-2">
                            <button class="button is-rounded is-small categoryBtn">{{ $p->department->department_name }}</button>
                            <button class="button is-rounded is-small categoryBtn">{{ $p->type->type_name }}</button>
                        </div>
                        <p>{{ date('h:i A - j F Y', strtotime($p->post_date)) }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="pageContainer">
        {{ $pastposts->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>

    <a href="/newform">
        <div class="newRecruitBtn">
            <button id="floatingButton" class="button is-medium newRecBtn">New Recruitment</button>
        </div>
    </a>

@endsection
