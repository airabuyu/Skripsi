@extends('layouts.menu')
@section('content')



<div class="container">
    <div class="row">

        <div class="col-12 col-lg-12">
            <div>
                <div class="card-body">
                    <div class="fm-search">
                        <div class="mb-0">
                            {{-- <div class="input-group input-group-lg">	<span class="input-group-text bg-transparent"><i class="fa fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search the files">
                            </div> --}}
                        </div>
                    </div>


                    <div class="table-responsive mt-3">
                    <div class="d-grid">

                    <form action="/create_folder" method="post" enctype="multipart/form-data" style="width: 100%;">
                        @csrf

                        <input type="hidden" name="path" value="{{$path}}">

                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="">Folder Name</span>
                            </div>
                            <input type="text" name="folder_name" class="form-control">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Add Folder</button>
                              </div>
                          </div>
                    </form>

{{--
                    <form action="/create_file" method="post" enctype="multipart/form-data" style="width: 100%;">
                        @csrf

                        <div class="form-group">
                            <b>File</b><br/>
                            <input type="file" name="file">
                        </div>
                        <button class="btn btn-primary" type="submit">+ Add File</button>

                    </form> --}}

                    <form action="/create_file"  class="mb-3" method="post" enctype="multipart/form-data" style="width: 100%; margin-top:20px;">
                            @csrf
                            <input type="hidden" name="path" value="{{$path}}">

                            <div class="form-group files color">
                                <input type="file" name="file" class="form-control" multiple="">
                            </div>
                        <button class="btn btn-secondary" type="submit">Add File</button>
                    </form>


                        <table class="table table-striped table-hover table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($path != 'D:\myfiles' && $path != 'D:/myfiles')

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                              </svg>
                                              <a href="/folder_back/{{ Crypt::encrypt($path) }}">
                                            <div class="ml-2 font-weight-bold text-danger">...</div>
                                                </a>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>

                                @endif

                                @foreach ($directories as $folder)

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                                                <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                                              </svg>
                                              <a href="/folder_click/{{ $path . "\\" . $folder }}">
                                            <div class="ml-2 font-weight-bold text-danger">{{ $folder }}</div>
                                                </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                        <form action="/delete_folder"  method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="path" value="{{$path. '\\' . $folder}}">

                                                <button type="submit" >
                                                Delete
                                                <button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @foreach ($files as $key => $path)

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                                                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                              </svg>
                                            <div class="ml-2 font-weight-bold text-danger">{{ pathinfo($path)['basename']  }}</div>
                                        </div>
                                    </td>

                                    <td>
                                        <form action="/download_file"  method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="path" value="{{$path}}">
                                                <button type="submit" >
                                                    Download
                                                <button>
                                        </form>
                                        <form action="/delete_file"  method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="path" value="{{$path}}">
                                                <button type="submit" >
                                                    Delete
                                                <button>
                                        </form>
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
    </div>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
