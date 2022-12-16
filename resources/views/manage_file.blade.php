@extends('layouts.menu')
@section('content')



<div class="container">
    <div class="row">

        <div class="col-12 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="fm-search">
                        <div class="mb-0">
                            <div class="input-group input-group-lg">	<span class="input-group-text bg-transparent"><i class="fa fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search the files">
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive mt-3">
                    <div class="d-grid"> <a href="javascript:;" class="btn btn-primary">+ Add File</a>

                        <table class="table table-striped table-hover table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>名前</th>
                                    <th>会う座</th>
                                    <th>Last Modified</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($folders as $folder)

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                                                <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                                              </svg>
                                            <div class="ml-2 font-weight-bold text-danger">{{ $folder }}</div>
                                        </div>
                                    </td>
                                    <td>Only you</td>
                                    <td>Sep 3, 2019</td>
                                    <td><i class="fa fa-ellipsis-h font-24"></i>
                                    </td>
                                </tr>
                                @endforeach

                                @foreach ($files as $file)

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                                                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                              </svg>
                                            <div class="ml-2 font-weight-bold text-danger">{{ $file }}</div>
                                        </div>
                                    </td>
                                    <td>私</td>
                                    <td>Sep 3, 2019</td>
                                    <td><i class="fa fa-ellipsis-h font-24"></i>
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



@endsection
