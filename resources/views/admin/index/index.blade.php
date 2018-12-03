@extends('admin.layouts.master')
@section('content')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">

                <!-- Header -->
                <div class="header mt-md-5">
                    <div class="header-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Pretitle -->
                                <h6 class="header-pretitle">
                                    New team
                                </h6>

                                <!-- Title -->
                                <h1 class="header-title">
                                    Create a new team
                                </h1>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

                <!-- Form -->
                <form class="mb-4">

                    <!-- Team name -->
                    <div class="form-group">
                        <label>
                            Team name
                        </label>
                        <input type="text" class="form-control">
                    </div>

                    <!-- Team description -->
                    <div class="form-group">
                        <label class="mb-1">
                            Team description
                        </label>
                        <small class="form-text text-muted">
                            This is how others will learn about the project, so make it good!
                        </small>
                        <div class="ql-toolbar ql-snow"><span class="ql-formats"><button type="button" class="ql-bold"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path> <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> </svg></button><button type="button" class="ql-italic"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> </svg></button></span><span class="ql-formats"><button type="button" class="ql-link"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line> <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path> <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path> </svg></button><button type="button" class="ql-blockquote"><svg viewBox="0 0 18 18"> <rect class="ql-fill ql-stroke" height="3" width="3" x="4" y="5"></rect> <rect class="ql-fill ql-stroke" height="3" width="3" x="11" y="5"></rect> <path class="ql-even ql-fill ql-stroke" d="M7,8c0,4.031-3,5-3,5"></path> <path class="ql-even ql-fill ql-stroke" d="M14,8c0,4.031-3,5-3,5"></path> </svg></button><button type="button" class="ql-code"><svg viewBox="0 0 18 18"> <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"></polyline> <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"></polyline> <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line> </svg></button><button type="button" class="ql-image"><svg viewBox="0 0 18 18"> <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect> <circle class="ql-fill" cx="6" cy="7" r="1"></circle> <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline> </svg></button></span><span class="ql-formats"><button type="button" class="ql-list" value="ordered"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line> <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line> <path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path> <path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path> <path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path> </svg></button><button type="button" class="ql-list" value="bullet"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line> <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line> <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line> </svg></button></span></div><div data-toggle="quill" class="ql-container ql-snow"><div class="ql-editor ql-blank" data-gramm="false" contenteditable="true"><p><br></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div></div>
                    </div>

                    <!-- Team members -->
                    <div class="form-group">
                        <label>
                            Add team members
                        </label>
                        <select class="form-control select2-hidden-accessible" data-toggle="select" multiple="" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option data-avatar-src="assets/img/avatars/profiles/avatar-1.jpg">
                                Dianna Smiley
                            </option>
                            <option data-avatar-src="assets/img/avatars/profiles/avatar-2.jpg">
                                Ab Hadley
                            </option>
                            <option data-avatar-src="assets/img/avatars/profiles/avatar-3.jpg">
                                Adolfo Hess
                            </option>
                            <option data-avatar-src="assets/img/avatars/profiles/avatar-4.jpg">
                                Daniela Dewitt
                            </option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 726px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </div>

                    <!-- Divider -->
                    <hr class="mt-4 mb-5">

                    <!-- Project cover -->
                    <div class="form-group">
                        <label class="mb-1">
                            Team cover
                        </label>
                        <small class="form-text text-muted">
                            Please use an image no larger than 1200px * 600px.
                        </small>
                        <div class="dropzone dropzone-single mb-3 dz-clickable" data-toggle="dropzone" data-dropzone-url="http://">



                            <div class="dz-preview dz-preview-single"></div>

                            <div class="dz-default dz-message"><span>Drop files here to upload</span></div></div>
                    </div>

                    <!-- Divider -->
                    <hr class="mt-5 mb-5">

                    <div class="row">
                        <div class="col-12 col-md-6">

                            <!-- Private team -->
                            <div class="form-group">
                                <label class="mb-1">
                                    Private team
                                </label>
                                <small class="form-text text-muted">
                                    If you are available for hire outside of the current situation, you can encourage others to hire you.
                                </small>
                                <div class="custom-control custom-checkbox-toggle">
                                    <input type="checkbox" class="custom-control-input" id="exampleToggle" checked="">
                                    <label class="custom-control-label" for="exampleToggle"></label>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-6">

                            <!-- Warning -->
                            <div class="card bg-light border">
                                <div class="card-body">

                                    <h4 class="mb-2">
                                        <i class="fe fe-alert-triangle"></i> Warning
                                    </h4>

                                    <p class="small text-muted mb-0">
                                        Once a team is made private, you cannot revert it to a public team.
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div> <!-- / .row -->

                    <!-- Divider -->
                    <hr class="mt-5 mb-5">

                    <!-- Buttons -->
                    <a href="#" class="btn btn-block btn-primary">
                        Create team
                    </a>
                    <a href="#" class="btn btn-block btn-link text-muted">
                        Cancel this team
                    </a>

                </form>

            </div>
        </div> <!-- / .row -->
    </div>

@endsection
