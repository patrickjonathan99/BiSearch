@extends('layouts.main')

@section('container')
    <div class="forumContent">
        <div class="card smallC">
            <a href="/f">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                        <figure class="image is-96x96">
                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                        </figure>
                        </div>
                        <div class="media-content">
                        <p class="title is-4 lecturerName">John Smith</p>
                        <p class="subtitle is-6">3 People Required</p>
                        <p class="subtitle is-6">By Friday, 13-10-2023</p>
                        </div>
                    </div>

                    <div class="content">
                        {{-- {{ $text = "This is a long text that needs to be cut." }}
                        {{ $maxLength = 15 }}
                        {{ $cutText = Str::limit($text, $maxLength, ' ... read more') }} --}}
                        <hr>
                        <p class="judul">Enkripsi dengan metode X</p>
                        <p>Topik : Kriptografi</p>
                        {{-- <p>{{ $cutText }}</p> --}}
                        <p>This is description ... read more</p>

                        <div class="applied">
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <p> ... 7 people applied</p>
                        </div>

                        <div class="buttons mt-4 mb-2">
                            <button class="button is-rounded is-small categoryBtn">Computer Science</button>
                            <button class="button is-rounded is-small categoryBtn">Statistics</button>
                            <button class="button is-rounded is-small categoryBtn">Research</button>
                        </div>
                        <p>11:09 PM - 1 Jan 2016</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="card smallC">
            <a href="/f">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                        <figure class="image is-96x96">
                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                        </figure>
                        </div>
                        <div class="media-content">
                        <p class="title is-4 lecturerName">John Smith</p>
                        <p class="subtitle is-6">3 People Required</p>
                        <p class="subtitle is-6">By Friday, 13-10-2023</p>
                        </div>
                    </div>

                    <div class="content">
                        {{-- {{ $text = "This is a long text that needs to be cut." }}
                        {{ $maxLength = 15 }}
                        {{ $cutText = Str::limit($text, $maxLength, ' ... read more') }} --}}
                        <hr>
                        <p class="judul">Enkripsi dengan metode X</p>
                        <p>Topik : Kriptografi</p>
                        {{-- <p>{{ $cutText }}</p> --}}
                        <p>This is description ... read more</p>

                        <div class="applied">
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <p> ... 7 people applied</p>
                        </div>

                        <div class="buttons mt-4 mb-2">
                            <button class="button is-rounded is-small categoryBtn">Computer Science</button>
                            <button class="button is-rounded is-small categoryBtn">Statistics</button>
                            <button class="button is-rounded is-small categoryBtn">Research</button>
                        </div>
                        <p>11:09 PM - 1 Jan 2016</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="card smallC">
            <a href="/f">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                        <figure class="image is-96x96">
                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                        </figure>
                        </div>
                        <div class="media-content">
                        <p class="title is-4 lecturerName">John Smith</p>
                        <p class="subtitle is-6">3 People Required</p>
                        <p class="subtitle is-6">By Friday, 13-10-2023</p>
                        </div>
                    </div>

                    <div class="content">
                        {{-- {{ $text = "This is a long text that needs to be cut." }}
                        {{ $maxLength = 15 }}
                        {{ $cutText = Str::limit($text, $maxLength, ' ... read more') }} --}}
                        <hr>
                        <p class="judul">Enkripsi dengan metode X</p>
                        <p>Topik : Kriptografi</p>
                        {{-- <p>{{ $cutText }}</p> --}}
                        <p>This is description ... read more</p>

                        <div class="applied">
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <p> ... 7 people applied</p>
                        </div>

                        <div class="buttons mt-4 mb-2">
                            <button class="button is-rounded is-small categoryBtn">Computer Science</button>
                            <button class="button is-rounded is-small categoryBtn">Statistics</button>
                            <button class="button is-rounded is-small categoryBtn">Research</button>
                        </div>
                        <p>11:09 PM - 1 Jan 2016</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="card smallC">
            <a href="/f">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                        <figure class="image is-96x96">
                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                        </figure>
                        </div>
                        <div class="media-content">
                        <p class="title is-4 lecturerName">John Smith</p>
                        <p class="subtitle is-6">3 People Required</p>
                        <p class="subtitle is-6">By Friday, 13-10-2023</p>
                        </div>
                    </div>

                    <div class="content">
                        {{-- {{ $text = "This is a long text that needs to be cut." }}
                        {{ $maxLength = 15 }}
                        {{ $cutText = Str::limit($text, $maxLength, ' ... read more') }} --}}
                        <hr>
                        <p class="judul">Enkripsi dengan metode X</p>
                        <p>Topik : Kriptografi</p>
                        {{-- <p>{{ $cutText }}</p> --}}
                        <p>This is description ... read more</p>

                        <div class="applied">
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <figure class="image is-32x32 mhsPictContain">
                                <img class="is-rounded mhsPict" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>
                            <p> ... 7 people applied</p>
                        </div>

                        <div class="buttons mt-4 mb-2">
                            <button class="button is-rounded is-small categoryBtn">Computer Science</button>
                            <button class="button is-rounded is-small categoryBtn">Statistics</button>
                            <button class="button is-rounded is-small categoryBtn">Research</button>
                        </div>
                        <p>11:09 PM - 1 Jan 2016</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="mb-5">
        <nav class="pagination is-centered" role="navigation" aria-label="pagination">
            <ul class="pagination-list">
                <li>
                    <a class="pagination-previous"><</a>
                </li>
                <li>
                    <a class="pagination-link is-current" aria-label="Page 1">1</a>
                </li>
                <li>
                    <a class="pagination-link" aria-label="Goto page 2">2</a>
                </li>
                <li>
                    <a class="pagination-link" aria-label="Goto page 3">3</a>
                </li>
                <li>
                    <a class="pagination-next">></a>
                </li>
            </ul>
        </nav>
    </div>

@endsection
