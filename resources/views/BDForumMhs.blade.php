@extends('layouts.main')

@section('container')
    <div class="forumContent">
        <div class="card bigC">
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
                    <p>This is description</p>

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
        </div>

        <div class="card bigC">
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                    <figure class="image is-96x96">
                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                    </figure>
                    </div>
                    <div class="media-content">
                        <form action="" class="reqForm">
                            <textarea name="" id="" placeholder="Express your interest" required></textarea>
                            <div class="ket">
                                <p class="ketVisible">Your post will only be visible to you and the lecturer</p>
                                <button class="reqBtn button is-rounded is-small" type="submit">Request to Join</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
