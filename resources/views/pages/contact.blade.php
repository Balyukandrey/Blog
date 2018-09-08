@extends('main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Contact me</h1>

            <form action="">
                <div class="form-group">
                    <label for="email" name="email">Email:</label>
                    <input id="email" name="email"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="subject" name="subject">Subject:</label>
                    <input id="subject" name="subject"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="message" name="message">Message:</label>
                    <textarea id="message" name="message" id="message" ></textarea>
                </div>
                <input type="submit" value="Send message" class="btn btn-success">
            </form>
        </div>
    </div>

@endsection

